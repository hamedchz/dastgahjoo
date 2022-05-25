<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'mobile' => 'required|min:11|max:11',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'این فیلد نمیتواند خالی باشد',
            'iran_mobile' => 'شماره موبایل ایران الزامی است',
            'min' => 'حداقل کاراکتر برای کلمه عبور 5 و موبایل 11 کاراکتر',
            'min' => 'حداکثر کاراکتر برای موبایل 11 کاراکتر',
            'string' => 'کلمه عبور باید رشته باشد' ,
            'same' => 'کلمه عبور یکسان نیست',
        ];
    }
}
