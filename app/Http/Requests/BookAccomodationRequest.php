<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookAccomodationRequest extends FormRequest
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
            "visitation_id" => "required|numeric",
            "accomodation_count" => "required",
            "accomodation" => "required",
        ];
    }
}
