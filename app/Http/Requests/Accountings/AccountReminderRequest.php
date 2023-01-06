<?php

namespace App\Http\Requests\Accountings;

use Illuminate\Foundation\Http\FormRequest;

class AccountReminderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        switch ($this->method())
        {
            case 'POST':
            case 'PATCH':
                return [
                    'type' => 'string|required',
                    'title' => 'string|required|min:10|max:100',
                    'amount' => 'numeric|required',
                    'remarks' => 'nullable|max:255',
                    'reminder_type' => 'array|required',
                    'reminder_date' => 'date|required'
                ];
            default:
                return [];
        }
    }
}
