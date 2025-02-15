<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStaffRequest extends FormRequest
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
            'nama_staff' => 'required|string',
            'nama_panggilan_staff' => 'required|string',
            'email_staff' => 'required|email|unique:staff,email_staff',  // Make sure to validate on the correct column
            'password_staff' => 'required|string|min:8',  // Adding a min length validation for password
            'jenis_kelamin_staff' => 'required|in:L,P',  // Validate gender to be either 'L' or 'P'
            'alamat_staff' => 'nullable|string',  // Optional field
            'no_telepon_staff' => 'nullable|string',  // Optional field
            'tanggal_lahir_staff' => 'required|date',  // Validate if the birth date is a valid date
            'pendidikan_terakhir_staff' => 'nullable|string',  // Optional field
            'status_kepegawaian_staff' => 'nullable|in:PNS,Honorer,Lainnya',  // Optional field with specific options
            'status_kepegawaian_lainnya' => [
                'nullable',
                'required_if:status_kepegawaian_staff,Lainnya',
                'string',
            ],  // Optional field for other employment status
        ];
    }
}
