<?php

namespace App\Http\Livewire\Users\DealerInquiry;

use App\Models\Inquiries;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Vendors;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use SoapClient;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class DealerInquiry extends Component
{
    use SEOToolsTrait;

    public $productInfo,$state=[];

    public function mount($id){
        $productInfo = Product::where('itemNo',$id)->first();
        $this->productInfo = $productInfo;

    }
    public function store(){
        $validatedData = Validator::make($this->state,[
            'title' => 'required',
            'address' => 'required',
            'postal' => 'required',
            'title' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:11',
            'isPrice' => 'sometimes',
            'moreInformation' => 'sometimes',
            'offer' => 'sometimes',
            'morePhotos' => 'sometimes',
            'comment' => 'sometimes'
        ],[
            'title.required' => 'این فیلد نمیتواند خالی باشد',
            'address.required' => 'این فیلد نمیتواند خالی باشد',
            'postal.required' => 'این فیلد نمیتواند خالی باشد',
            'email.required' => 'این فیلد نمیتواند خالی باشد',
            'email.email' => 'لطفا ایمیل صحیح وارد کنید',
            'phone.required' => 'این فیلد نمیتواند خالی باشد',
            'phone.numeric' => 'لطفا تلفن صحیح وارد کنید',
            'phone.min' => ' تلفن باید 11 عدد باشد  ',
        ])->validate();
        $validatedData['product_id'] = $this->productInfo->id;
        $validatedData['vendor_id'] = $this->productInfo->vendor_id;
        $validatedData['status'] = 'PENDING';
        $store  = Inquiries::create($validatedData);
        if($store){
            $vendor = Vendors::where('id',$this->productInfo->vendor_id)->first();
            // $this->sendSmsCode($vendor->mobile, $this->productInfo->name);

            $this->state = "";
            $this->addError('storeMessage', 'پیام شما فرستاده شد با شما تماس میگیریم','action');

        }
    }
    public function sendSmsCode($mobile,$code)
    {
        $client = new SoapClient("http://188.0.240.110/class/sms/wsdlservice/server.php?wsdl");
        $user = Setting::where('name','user_panel_for_sms')->pluck('value')->first();
        $pass = Setting::where('name','password_panel_for_sms')->pluck('value')->first();
        $fromNum = Setting::where('name','lineNumber_panel_for_sms')->pluck('value')->first();
        $toNum = $mobile;
        $pattern_code = "4itbwfw7pt";
        $input_data = array(
            "code" => $code,
        );
        return $client ->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
    }
    public function render()
    {
        $this->seo()
        ->setTitle('پرسش محصولات',false)
        ->setDescription('پرسش محصولات');
        return view('livewire.users.dealer-inquiry.dealer-inquiry')->layout('layouts.users.app');
    }
}
