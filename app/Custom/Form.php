<?php

namespace App\Custom;


class Form
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
}