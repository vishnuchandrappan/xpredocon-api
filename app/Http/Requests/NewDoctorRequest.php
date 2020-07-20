<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewDoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|min:10|max:10|string',
            'address' => 'string|required',
            'qualification' => 'string|required',
            'specialization' => 'string'
        ];
    }
}
