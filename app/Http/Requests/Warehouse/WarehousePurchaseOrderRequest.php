<?php

namespace App\Http\Requests\Warehouse;

use Illuminate\Foundation\Http\FormRequest;

class WarehousePurchaseOrderRequest extends FormRequest
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
                    'vendor_company_name' => 'string|required',
                    'vendor_company_email' => 'string|required',
                    'vendor_address' => 'string|required',
                    'vendor_landline_no' => 'string|nullable',
                    'vendor_phone_no' => 'string|nullable',
                    'vendor_fax_no' => 'string|nullable',
                    'ship_to_name' => 'string|required',
                    'ship_to_address' => 'string|required',
                    'ship_to_landline_no' => 'string|nullable',
                    'ship_to_phone_no' => 'string|nullable',
                    'ship_to_fax_no' => 'string|nullable',
                    'items' => 'array|required',
                    'items.*' => 'required',
                    'delivery_date' => 'date|required'
                ];
            default:
                return [];
        }
    }
}
