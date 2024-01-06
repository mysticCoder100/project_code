<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Accomodation;
use App\Custom;

class AccomodationsController extends Controller
{
    public function manageAccomodations()
    {
        $fields = (new Custom\Form())->accomodations();
        return view('admin.accomodations_admin', ["fields" => $fields]);
    }

    public function addAccomodations(Requests\AccomodationRequest $request)
    {
        $validatedData = $request->validated();

        $image = $request->file('accomodation_image');
        $filename = "ac-" . time() . '.' . $image->getClientOriginalExtension();
        $upload = $image->move(public_path('assets/images/accomodations'), $filename);
        if ($upload) {
            $validatedData["accomodation_image"] = $filename;
            Accomodation::create($validatedData);

            return response()->json([
                "message" => "Details Sucessfully Uploaded",
            ], 200);
        } else {
            return response()->json([
                "message" => "Invalid Details",
                "errors" => [
                    "email" => "Invalid Login Credentials"
                ]
            ], 422);
        }
    }

    public function editAccomodationsContent(Request $request)
    {
        $data = $data = Accomodation::find($request->input("id"));
        return $data;
    }
}
