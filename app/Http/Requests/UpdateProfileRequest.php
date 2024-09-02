<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "remember_token" => "required|string|size:64",
            "name" => "sometimes|string|max:255",
            "icon" => "sometimes|image|mimes:jpeg,png,jpg,gif|max:2048",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                [
                    "message" => "Validation errors",
                    "errors" => $validator->errors(),
                ],
                422
            )
        );
    }
}
