<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'idstudents' => 'required|unique:students,idstudents|min:7|max:7',
            'name' => 'required',
            'gender'=>'required',
            'email' => 'required|unique:students,email',
            'phone'=> 'required|numeric',
            'address'=> 'required'
            
        ];
    }

    public function messages(): array
{
    return [
        'idstudents.required' => ':attribute Tidak Boleh Kosong',
        'idstudents.min' => ':attribute Harus Lebih dari 7 Angka',
        'idstudents.unique' => ':attribute Yang Anda Isi Sudah Ada',
        'name.required' => ':attribute Tidak Boleh Kosong',

    ];
}

public function attributes(): array
{
    return [
        'idstudents' => 'Id Student',
        'name' => 'Nama'
    ];
}
}
