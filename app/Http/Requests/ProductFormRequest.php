<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            // 'name' => 'required',
            // 'id_type' => 'required',
            // 'unit' => 'required',
            // 'new' => 'required',
            // 'unit_price' => 'required|numeric|min:0',
            // 'promotion_price ' => 'required|numeric|min:0',
            // 'description' => 'required',
            // 'image' => 'required',
        ];
    }
}
