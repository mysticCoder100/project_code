<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccomodationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "accomodation_name" => "required|min:3",
            "accomodation_description" => "required|min:3",
            "accomodation_price" => "required|numeric",
            "accomodation_image" => "required|image|mimes:jpeg,png,jpg|max:2048",
        ];
    }
}