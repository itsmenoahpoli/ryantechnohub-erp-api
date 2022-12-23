<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductBatchOutstockRequest extends FormRequest
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
        return [
            'store_id' => 'numeric|required',
            'remarks' => 'string|nullable',
            'products' => 'array|required',
            'products.*.product_id' => 'numeric|required',
            'products.*.stocks' => 'numeric|required',
        ];
    }
}
