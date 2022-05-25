<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
                'name'     =>  'required',
                'mobile'   => 'required|min:11|max:11',
                'password' => ['required', 'required_with:password_confirmation','same:password_confirmation','min:8'],
            ];
    }

    public function messages()
    {
        return [
            'required' => 'این فیلد نمیتواند خالی باشد',
            'iran_mobile' => 'شماره موبایل ایران الزامی است',
            'min' => 'حداقل کاراکتر برای کلمه عبور 5 و موبایل 11 کاراکتر',
            'max' => 'حداکثر کاراکتر برای موبایل 11 کاراکتر',
            'string' => 'کلمه عبور باید رشته باشد' ,
            'same' => 'کلمه عبور یکسان نیست',
            'required_with' => 'تایید کلمه عبور الزامیست'
        ];
    }
}
