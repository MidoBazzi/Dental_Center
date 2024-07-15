<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDoctorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string",
            "address" => "required|string",
            "phone_num" => "required|min:10|unique:doctors",
            "age" => "required|integer|min:1",
            "speciality" => "required|string",
            "schedule" => "required|string",
            "shift_start" => "required",
            "shift_end" => "required",
            "cut" => "required",
        ];
    }
}
