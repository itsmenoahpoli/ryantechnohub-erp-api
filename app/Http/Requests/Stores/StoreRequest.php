<?php

namespace App\Http\Requests\Stores;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
                    'name' => 'string|required|min:3|max:255',
                    'address' => 'string|required',
                    'google_map_embed_url' => 'string|required',
                    'is_portal_access_enabled' => 'boolean|required',
                    'is_enabled' => 'boolean|required'
                ];
            default:
                return [];
        }
    }
}
