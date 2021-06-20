<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'brand_name' => 'required',
            'mrp_price' => 'required',
            'selling_price' => 'required',
            'piece' => 'required',
            'specification' => 'required',
            'product_image' => 'required|mimes:jpeg,jpg,png',
        ];
    }
}
