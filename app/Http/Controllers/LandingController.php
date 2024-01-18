<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Custom;
use App\Models\Visitation;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index()
    {
        return view("home");
    }
    public function about()
    {
        return view("about");
    }
    public function contact()
    {
        $fields = (new Custom\ContactForm())->fields();
        $textareas = (new Custom\ContactForm())->textarea();
        return view("contact", [
            "fields" => $fields,
            "textareas" => $textareas,
        ]);
    }

    public function payment()
    {
        $visitationForm = (new Custom\PaymentPageForm())->bookVisitation();
        $paymentForm = (new Custom\PaymentPageForm())->makePayment();
        $accomodationForm = (new Custom\PaymentPageForm())->bookAccomodation();
        return view("payment", [
            "visitationForm" => $visitationForm,
            "accomodationForm" => $accomodationForm,
            "paymentForm" => $paymentForm
        ]);
    }

    public function attractions()
    {
        return view("attractions");
    }
    public function accomodations()
    {
        return view("accomodations");
    }
    public function history()
    {
        $currentUser = Auth::guard('tourist')->user()->tourist_id;
        $records =   Visitation::select(
            'visitations.*',
            'visitations.created_at AS visitation_created_at',
            'visitations.updated_at AS visitation_updated_at',
            't.*',
            'a.*'
        )
            ->join('tourists AS t', 't.tourist_id', '=', 'visitations.tourist_id')
            ->leftJoin('accomodations AS a', 'a.accomodation_id', '=', 'visitations.accomodation')
            ->where('visitations.tourist_id', $currentUser)
            ->get();
        return view("history", ["records" => $records]);
    }
}