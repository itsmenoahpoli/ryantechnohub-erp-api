<?php

namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeTimeEntryRequest extends FormRequest
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
                return [
                    'store_id' => 'numeric|required',
                    'store_pos_id' => 'numeric|required',
                    'employee_id' => 'numeric|required',
                    'sign_in_datetime' => 'datetime|required',
                ];
            default:
                return [];
        }
    }
}
