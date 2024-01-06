<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Custom;

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
}
