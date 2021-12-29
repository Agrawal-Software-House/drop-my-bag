<?php

namespace App\Http\Requests\merchant;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMerchantRequest extends FormRequest
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
            'firm_name' => 'required|max:255',
            'name' => 'required|max:255',
            'gst' => 'required',
            'address' => 'required',
            'pincode' => 'required',
            'business_type' => 'required',
            'avtar' => 'required|mimes:jpeg,jpg,png',
        ];
    }
}
