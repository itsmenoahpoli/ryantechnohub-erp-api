<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
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
                    'name' => 'string|required|min:3|max:100|unique:product_categories,name'. $this->id,
                    'description' => 'string|nullable|max:255'
                ];
            default:
                return [];
        }
    }
}
