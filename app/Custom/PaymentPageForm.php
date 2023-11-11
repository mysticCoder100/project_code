<?php

namespace App\Custom;


class PaymentPageForm
{

    public function bookVisitation()
    {
        return [
            [
                "name" => "fullname",
                "placeholder" => "Full Name",
                "type" => "text",
            ],
            [
                "name" => "email",
                "placeholder" => "Email",
                "type" => "email",
            ],
            [
                "name" => "phonenumber",
                "placeholder" => "Phone Number",
                "type" => "tel",
            ],
            [
                "name" => "visitor_number",
                "placeholder" => "Number of visitor(s)",
                "type" => "text",
            ],
            [
                "name" => "visitation_date",
                "placeholder" => "Visitation Date",
                "type" => "date",
            ],
        ];
    }

    public function bookAccomodation()
    {
        return [
            [
                "name" => "visit_id",
                "placeholder" => "Visitation Id",
                "type" => "text",
            ],
            [
                "name" => "accomodation",
                "placeholder" => "Select an Accomodation",
                "type" => "select",
                "option" => [
                    "Option One",
                    "Option Two",
                    "Option Three",
                    "Option Four",
                ],
                "select" => true
            ]
        ];
    }
}
