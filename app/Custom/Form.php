<?php

namespace App\Custom;


class Form
{

    public function attractions()
    {
        return [
            [
                "name" => "attraction_name",
                "placeholder" => "Attraction Name",
                "type" => "text",
            ],
            [
                "name" => "attraction_image",
                "placeholder" => "Attraction Image",
                "type" => "file",
            ],
            [
                "name" => "attraction_description",
                "placeholder" => "Attraction Description",
                "textarea" => true
            ],
        ];
    }
    public function accomodations()
    {
        return [
            [
                "name" => "accomodation_name",
                "placeholder" => "Accomodation Name",
                "type" => "text",
            ],
            [
                "name" => "accomodation_image",
                "placeholder" => "Accomodation Image",
                "type" => "file",
            ],
            [
                "name" => "accomodation_price",
                "placeholder" => "Accomodation Price",
                "type" => "text"
            ],
            [
                "name" => "accomodation_description",
                "placeholder" => "Accomodation Description",
                "textarea" => true
            ],
        ];
    }

    public function administratorsFields()
    {
        return [
            [
                "name" => "firstname",
                "placeholder" => "First Name",
                "type" => "text",
            ],
            [
                "name" => "lastname",
                "placeholder" => "Last Name",
                "type" => "text",
            ],
            [
                "name" => "email",
                "placeholder" => "Email",
                "type" => "email",
            ],
            [
                "name" => "role",
                "placeholder" => "Role",
                "type" => "select",
                "option" => [
                    [
                        "placeholder" => "Admin",
                        "value" => "Admin",
                    ],
                    [
                        "placeholder" => "Tour Guide",
                        "value" => "Tour Guide",
                    ],
                ],
                "select" => true
            ],
        ];
    }

    public function passwordReset()
    {
        return [
            [
                "name" => "current_password",
                "placeholder" => "Current Password",
                "type" => "password",
            ],
            [
                "name" => "password",
                "placeholder" => "Password",
                "type" => "password",
            ],
            [
                "name" => "confirm_password",
                "placeholder" => "Confirm Password",
                "type" => "password",
            ],
        ];
    }
}
