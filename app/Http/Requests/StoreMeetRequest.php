<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMeetRequest extends FormRequest
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
            'txtmid' => 'required|unique:meets,meet_id|min:3|max:7',
            'txtmname' => 'required',
            'txtmdate' => 'required',
            'txtmtime' => 'required',
            'txtmprepared' => 'required',
            'txtmloc' => 'required',
            'txtmatt' => 'required' 
            


        ];
    }
}
