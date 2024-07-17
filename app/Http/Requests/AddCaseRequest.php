<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCaseRequest extends FormRequest
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
            "desc" => "required|string",
            "doctor_id" => "required|integer|exists:doctors,id",
            "patient_id" => "required|integer|exists:patients,id",
            "doctor" => "required|string|exists:doctors,name",
            "patient" => "required|string|exists:patients,name",
            "amount" => "required|integer|min:1",
        ];
    }
}
