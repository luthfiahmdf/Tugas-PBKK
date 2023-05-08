<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentsRequest extends FormRequest
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
             'name' => 'required',
             'gender'=>'required',
             'email' => [
                 'required',
                 Rule::unique('students','email')->ignore($this->idstudents,'idstudents'),
                 'email'
             ],
             'phone'=> 'required|numeric',
             'address'=> 'required'            
         ];
     }

    public function messages(): array
{
    return [
      
        
        'name.required' => ':attribute Tidak Boleh Kosong',

    ];
}

public function attributes(): array
{
    return [
      
        'name' => 'Nama'
    ];
}
}
