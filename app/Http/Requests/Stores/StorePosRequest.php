<?php

namespace App\Http\Requests\Stores;

use Illuminate\Foundation\Http\FormRequest;

class StorePosRequest extends FormRequest
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
                    'store_id' => 'integer|required',
                    'username' => 'string|required|unique:store_pos',
                    'password' => 'string|required|min:8|max:32'
                ];
            default:
                return [];
        }
    }
}
