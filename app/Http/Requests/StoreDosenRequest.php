<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDosenRequest extends FormRequest
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
            'nama_dosen' => 'required|string|max:100',
            'nama_panggilan_dosen' => 'required|string|max:100',
            'nidn_dosen' => 'nullable|string|max:100|unique:dosens,nidn_dosen',
            'nip_dosen' => 'nullable|string|max:100|unique:dosens,nip_dosen',
            'email_dosen' => 'required|email|unique:dosens,email_dosen',
            'password_dosen' => 'required',
            'alamat_dosen' => 'required|string',
            'no_telepon_dosen' => 'nullable|string',
            'jenis_kelamin_dosen' => 'required|in:L,P',
            'tanggal_lahir_dosen' => 'required|date',
            'pendidikan_terakhir_dosen' => 'required|string',
            'status_kepegawaian_dosen' => 'required|in:PNS,Honorer,Lainnya',
            'status_kepegawaian_lainnya' => [
                'nullable',
                'required_if:status_kepegawaian_dosen,Lainnya',
                'string',
            ],
        ];
    }
}
