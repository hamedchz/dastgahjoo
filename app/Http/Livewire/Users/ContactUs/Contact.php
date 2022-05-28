<?php

namespace App\Http\Livewire\Users\ContactUs;

use App\Models\Category;
use App\Models\Contactus;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Contact extends Component
{

     public $state = [];

    public function store(){
        
        $validatedData = Validator::make($this->state,[
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|min:11',
            'subject' => 'required',
            'description' => 'required',
            'address' => 'required',
            'postal' => 'required',
            'address' => 'required',

            
         
        ],[
            'name.required' => 'این فیلد نمیتواند خالی باشد',
            'postal.required' => 'این فیلد نمیتواند خالی باشد',
            'address.required' => 'این فیلد نمیتواند خالی باشد',
            'email.required' => 'این فیلد نمیتواند خالی باشد',
            'email.email' => 'لطفا ایمیل صحیح وارد کنید',
            'mobile.required' => 'این فیلد نمیتواند خالی باشد',
            'mobile.numeric' => 'لطفا تلفن صحیح وارد کنید',
            'mobile.min' => ' تلفن باید 11 عدد باشد  ',
            'subject.required' => 'این فیلد نمیتواند خالی باشد',
            'description.required' => 'این فیلد نمیتواند خالی باشد',

        ])->validate();
          
        $store  = Contactus::create($validatedData);
        if($store){
            $this->state = "";
            $this->addError('storeMessage', 'پیام شما فرستاده شد با شما تماس میگیریم','action');

        }
    }
    public function render()
    {
        // $categories = Category::where('parent',0)->where('isActive',1)->get();
        return view('livewire.users.contact-us.contact')->layout('layouts.users.app');
    }
}
