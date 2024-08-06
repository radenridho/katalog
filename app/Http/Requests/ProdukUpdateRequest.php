<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukUpdateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'categories_id' => 'required|exists:category,id',
            'harga' => 'required|integer',
            'photo' =>  'required|image|',
            'deskripsi' => 'required|max:255',
            'kontak' => 'required|max:50',

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Wajib Diisi',
            'categories_id.required' => 'Wajib Diisi',
            'categories_id.required' => 'Tidak Valid',
            'harga.required' => 'Wajib Diisi',
            'photo.required' => 'Wajib Diisi',
            'deskripsi.required' => 'Wajib Diisi',
            'kontak.required' => 'Wajib Diisi',
        ];
    }
}
