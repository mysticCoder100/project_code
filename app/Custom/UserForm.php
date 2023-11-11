<?php

namespace App\Custom;


class UserForm
{

    public function loginFields()
    {
        return [
            [
                "name" => "email",
                "placeholder" => "Email",
                "type" => "email",
            ],
            [
                "name" => "password",
                "placeholder" => "Password",
                "type" => "password",
            ]
        ];
    }
    public function registerFields()
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
