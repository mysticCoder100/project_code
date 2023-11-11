<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $accomodationForm = (new Custom\PaymentPageForm())->bookAccomodation();
        return view("payment", [
            "visitationForm" => $visitationForm,
            "accomodationForm" => $accomodationForm
        ]);
    }
}