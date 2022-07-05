<?php

namespace App\Http\Livewire\Users\ContactUs;

use App\Models\Category;
use App\Models\Contactus;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use SoapClient;

class Contact extends Component
{

    use SEOToolsTrait;

     public $state = [];

    public function store(){
        
        $validatedData = Validator::make($this->state,[
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|min:11',
            'subject' => 'required',
            'description' => 'required',
            'postal' => 'sometimes',
            'address' => 'sometimes',

            
         
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
            $this->sendSmsCode($this->state['mobile']);
            $this->state = "";
            $this->addError('storeMessage', 'پیام شما فرستاده شد با شما تماس میگیریم','action');

        }
    }
    public function sendSmsCode($mobile)
    {
        $client = new SoapClient("http://188.0.240.110/class/sms/wsdlservice/server.php?wsdl");
        $user = Setting::where('name','user_panel_for_sms')->pluck('value')->first();
        $pass = Setting::where('name','password_panel_for_sms')->pluck('value')->first();
        $fromNum = Setting::where('name','lineNumber_panel_for_sms')->pluck('value')->first();
        $toNum = Setting::where('name','owner_phone')->pluck('value')->first();
        // $toNum = $mobile;
        $pattern_code = "ilkwjwdcmhfn91o";
        $input_data = array(
            "mobile" => $mobile,
            
        );
        return $client ->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
    }
    public function render()
    {
        $this->seo()
        ->setTitle('تماس با ما ',false)
        ->setDescription('تماس با ما');
        // $categories = Category::where('parent',0)->where('isActive',1)->get();
        return view('livewire.users.contact-us.contact')->layout('layouts.users.app');
    }
}
