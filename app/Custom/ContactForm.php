<?php

namespace App\Custom;


class ContactForm
{

    public function fields()
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
                "placeholder" => "Phone",
                "type" => "tel",
            ],
            [
                "name" => "subject",
                "placeholder" => "Subject",
                "type" => "text",
            ]
        ];
    }

    public function textarea()
    {
        $fields = [
            [
                "name" => "message",
                "placeholder" => "Write a Message",
            ],
        ];

        $fields = array_map(fn ($field) => [...$field, "textarea" => true], $fields);
        return $fields;
    }
}
