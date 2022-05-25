<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;


class ForgetPasswordRequest extends FormRequest
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
            'password' => ['required', 'required_with:password_confirmation','same:password_confirmation','min:8'],

        ];
    }

    public function messages()
    {
        return [
            'required' => ' فیلد پسورد نمیتواند خالی باشد',
            'min' => 'حداقل کاراکتر برای کلمه عبور 8 کاراکتر',
            'same' => 'کلمه عبور یکسان نیست',
            'required_with' => 'تایید کلمه عبور الزامیست'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo('/reset-password');
    }
}
