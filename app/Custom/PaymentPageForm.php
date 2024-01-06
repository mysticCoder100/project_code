<?php

namespace App\Custom;

use App\Models\Accomodation;


class PaymentPageForm
{

    public function bookVisitation()
    {
        return [
            [
                "name" => "name",
                "placeholder" => "Name",
                "type" => "text",
            ],
            [
                "name" => "email",
                "placeholder" => "Email",
                "type" => "email",
            ],
            [
                "name" => "visitor_number",
                "placeholder" => "Number of visitor(s)",
                "type" => "text",
            ],
            [
                "name" => "want_accomodation",
                "placeholder" => "Want an Accomodation",
                "type" => "select",
                "option" => [
                    [
                        "value" => "true",
                        "placeholder" => "Yes",
                    ],
                    [
                        "value" => "false",
                        "placeholder" => "No",
                    ],
                ],
                "select" => true
            ],
            [
                "name" => "visitation_date",
                "placeholder" => "Visitation Date",
                "type" => "date",
            ],
        ];
    }

    public function makePayment()
    {
        return [
            [
                "name" => "visitation_id",
                "placeholder" => "Visitation Id",
                "type" => "text",
            ],
            [
                "name" => "email",
                "placeholder" => "Email",
                "type" => "text",
            ],
        ];
    }

    public function bookAccomodation()
    {
        $accomodations = Accomodation::all();
        $option = [];
        foreach ($accomodations as $accomodation) {
            array_push($option, [
                "placeholder" => $accomodation->accomodation_name,
                "value" => $accomodation->accomodation_id,
            ]);
        }
        return [
            [
                "name" => "visitation_id",
                "placeholder" => "Visitation Id",
                "type" => "text",
            ],
            [
                "name" => "accomodation",
                "placeholder" => "Select an Accomodation",
                "type" => "select",
                "option" => $option,
                "select" => true
            ],
            [
                "name" => "accomodation_count",
                "placeholder" => "Accomodation Count (Number(s) of Room)",
                "type" => "text",
            ],
        ];
    }
}
