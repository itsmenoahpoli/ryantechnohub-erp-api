<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                    'model' => 'string|required',
                    'name' => 'string|required|unique:products',
                    'price' => 'numeric|required',
                    'sale_price' => 'numeric|required_if:is_onsale,true',
                    'description' => 'string|required',
                    'stocks' => 'numeric|required_if:is_tracked_stocks,true',
                    'is_tracked_stocks' => 'boolean|required',
                    'is_onsale' => 'boolean|required',
                    'is_featured' => 'boolean|required',
                    'is_posted' => 'boolean|required',
                ];
            default:
                return [];
        }
    }
}
