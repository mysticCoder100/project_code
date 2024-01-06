<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Accomodation;
use App\Models\Tourist;
use App\Models\Visitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitationController extends Controller
{
    public function bookVisitation(Requests\BookVisitationRequest $request)
    {
        $validatedData = $request->validated();
        $unitCost = 200;
        $validatedData["amount"] = $validatedData["visitor_number"] * $unitCost;

        if (Auth::guard('tourist')->check()) {
            $removed = ["name", "email"];
            $userId = Auth::guard("tourist")->user()->tourist_id;
            $validatedData["tourist_id"] = $userId;
            $validatedData = array_filter(
                $validatedData,
                fn ($data) => !in_array($data, $removed),
                ARRAY_FILTER_USE_KEY
            );
            Visitation::create($validatedData);

            return response()->json([
                "message" => "Records Successfully Stored",
            ], 200);
        } else {
            Visitation::create($validatedData);

            return response()->json([
                "message" => "Records Successfully Stored",
            ], 200);
        }
    }

    public function bookAccomodation(Requests\BookAccomodationRequest $request)
    {
        $validatedData = $request->validated();
        $visitationId = $validatedData["visitation_id"];
        $visitationDetail = Visitation::find($visitationId);

        $wantAccomodation = $visitationDetail->want_accomodation;

        if ($wantAccomodation  === "false") {
            return response()->json([
                "message" => "you didn't apply for accomodation when booking visitation",
            ], 403);
        }

        $accomodationPrice = Accomodation::find($validatedData["accomodation"])->accomodation_price;
        $accomodationAmount = $accomodationPrice * $validatedData["accomodation_count"];
        $newAmount = $accomodationAmount + $visitationDetail->amount;
        $validatedData["amount"] = $newAmount;
        $validatedData = array_filter(
            $validatedData,
            fn ($data) => $data !== "visitation_id",
            ARRAY_FILTER_USE_KEY
        );
        Visitation::where("visitation_id", $visitationId)->update($validatedData);

        return response()->json([
            "message" => "Records Successfully Stored",
        ], 200);
    }

    public function sucessfulPayment(Request $request)
    {
        if (!isset($request->reference)) {
            return redirect("/");
        }
        $reference = $request->reference;
        $verifyPayment = $this->verifyPayment($reference);
        $status = $verifyPayment->status;
        if ($status) {
            $data = [
                "payment_status" => 1,
                "reference" => $reference
            ];
            $visitationId = $verifyPayment->data->metadata->visitation_id;
            Visitation::where("visitation_id", $visitationId)->update($data);
            return view("success")->with([
                "heading" => "Success",
                "status" => "success",
                "text" => "Congratulations, Your visitation payment has been successfully processed."
            ]);
        } else {
            return view("success")->with([
                "heading" => "Error",
                "status" => "error",
                "text" => "We encountered an error processing your payment. Please try again later, or contact
                support for assistance."
            ]);
        }
    }

    private function verifyPayment($reference)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . env("PAYSTACK_SECRET_KEY"),
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return json_decode($response);
    }

    public function makePayment(Request $request)
    {
        $validatedData = $request->validate([
            "visitation_id" => "required|numeric",
            "email" => "required|email",
        ]);

        $visitationId = $validatedData["visitation_id"];
        $visitationDetail = Visitation::find($visitationId);

        if (!$visitationDetail) {
            return response()->json([
                "message" => "Invalid Details",
            ], 403);
        }

        $tourist_id = $visitationDetail->tourist_id;
        $email = $visitationDetail->email;
        (int) $amount = $visitationDetail->amount * 100;
        if ($tourist_id) {

            if (
                !Auth::guard("tourist")->check()
            ) {
                return response()->json([
                    "message" => "login your account to complete your payment, as this visitation was booked with a registered account",
                ], 403);
            }

            $user = Tourist::find($tourist_id);
            $email = $user->email;
        }

        if ($email !== request("email")) {
            return response()->json([
                "message" => "No Record Found !!!",
            ], 403);
        }

        if ($visitationDetail->payment_status == 1) {
            return response()->json([
                "message" => "Payment has been made for this visitation",
            ], 403);
        }

        $records = [
            "email" => $email,
            "amount" => $amount,
            "callback_url" => route("successful-payment"),
            "metadata" => json_encode([
                "visitation_id" => $visitationId
            ])
        ];

        $pay = json_decode($this->initiatePayment($records));
        if ($pay && $pay->status) {
            $redirectUrl = $pay->data->authorization_url;
            $reference = $pay->data->reference;
            return response()->json([
                "message" => "Authorization Sucessful",
                "data" => [
                    "authorization_url" => $redirectUrl
                ]
            ], 200);
        } else {
            return response()->json([
                "message" => "an error occured",
            ], 403);
        }
    }

    private function initiatePayment($records)
    {
        $url = "https://api.paystack.co/transaction/initialize";

        $fields_string = http_build_query($records);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . env("PAYSTACK_SECRET_KEY"),
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);
        return $result;
    }
}
