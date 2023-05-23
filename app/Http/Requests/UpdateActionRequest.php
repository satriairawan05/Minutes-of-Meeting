<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'act_id' => 'required',
            'act_subject' => 'required',
            'act_problem' => 'required',
            'act_corrective' => 'required',
            'act_user' => 'required',
            'act_assignby' => 'required',
            'act_acc1' => 'required',
            'act_acc2' => 'required',
            'act_duedate' => 'required',
            'act_counter' => 'required'
        ];
    }
}
