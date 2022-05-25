<?php

namespace App\Http\Requests\Admin;

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
     * @return array
     */
    public function rules()
    {
        return [
            'quantity' => 'required',
            'year_of_manufacture' => 'required',
            'price' => 'required',
            'manufacturer' => 'required',
            'model' => 'required',
            'category' => 'required',
            'slug' => 'required',
            'type_of_machine' => 'required',
            'isStock' => 'required|in:1,2',
            'isInstallments' => 'required|in:0,1',
            'isSold' => 'required|in:0,1',
            'location' => 'required',


        ];
    }

    public function messages()
    {
        return [
            'required' => 'این فیلد نمیتواند خالی باشد',
            'in' => 'اطلاعات این فیلد اشتباه است',
          
        ];
    }
}
