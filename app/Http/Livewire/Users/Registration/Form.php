<?php

namespace App\Http\Livewire\Users\Registration;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class Form extends Component
{
    use SEOToolsTrait;
    public $state = [];

    public function addNewUser(){
        $validateData = Validator::make($this->state,[ 
        'name' => 'required',
        'mobile' => ['required', 'numeric', 'unique:users'],
        'password' => ['required', 'required_with:password_confirmation','same:password_confirmation','min:8'],
        ],[
            'name.required' => 'این فیلد نمیتواند خالی باشد',
            'mobile.required' => 'این فیلد نمیتواند خالی باشد',
             'mobile.unique'  => 'این شماره قبلا استفاده شده',
            'password.required' => 'این فیلد نمیتواند خالی باشد',
            'password.min'      => 'حداقل کلمه عبور 8 کاراکتر است',
            'password.same' => 'کلمه عبور تطابق ندارد',
            'password.required_with' => 'این فیلد نمیتواند خالی باشد',


        ])->validate();
        $validateData['password']  = bcrypt($validateData['password']);
        $add = User::create($validateData);
    }
    public function render()
    {
        $this->seo()
        ->setTitle('ثبت نام',false)
        ->setDescription('ثبت نام');
        return view('livewire.users.registration.form')->layout('layouts.users.app');
    }
}
