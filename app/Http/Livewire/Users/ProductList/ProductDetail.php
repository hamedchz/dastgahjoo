<?php

namespace App\Http\Livewire\Users\ProductList;

use App\Models\Setting;
use App\Models\Vendors;
use SoapClient;
use App\Models\Inquiries;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Facades\Auth;


class ProductDetail extends Component
{
    use SEOToolsTrait;

    public $product,$state=[];

    public function mount($id){
        $product = Product::with('images')->where('id',$id)->first();
        $product->increment('view',1);
      
        $this->product = $product;

    }
     public function sendSmsCode($mobile,$subject,$name)
    {
        $client = new SoapClient("http://188.0.240.110/class/sms/wsdlservice/server.php?wsdl");
        $user = Setting::where('name','user_panel_for_sms')->pluck('value')->first();
        $pass = Setting::where('name','password_panel_for_sms')->pluck('value')->first();
        $fromNum = Setting::where('name','lineNumber_panel_for_sms')->pluck('value')->first();
        $toNum = $mobile;
        $pattern_code = "79of8tn7frntprn";
        $input_data = array(
            "name" => $name,
            "subject" => $subject,
        );
        return $client ->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
    }
    public function sendSmsToUser($mobile,$code,$name,$vendorMobile)
    {
        
        $client = new SoapClient("http://188.0.240.110/class/sms/wsdlservice/server.php?wsdl");
        $user = Setting::where('name','user_panel_for_sms')->pluck('value')->first();
        $pass = Setting::where('name','password_panel_for_sms')->pluck('value')->first();
        $fromNum = Setting::where('name','lineNumber_panel_for_sms')->pluck('value')->first();
        $toNum = $vendorMobile;
        $pattern_code = "4xfv3ub1k7tqbms";
        $input_data = array(
            "name" => $name,
            "mobile" => $mobile,
            "code" => $code,
        );
        return $client ->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
    }
    public function store(){
        $validatedData = Validator::make($this->state,[
            'title' => 'required',
            'address' => 'sometimes',
            'postal' => 'sometimes',
            'email' => 'sometimes',
            'phone' => 'required|min:11',
            'isPrice' => 'sometimes',
            'moreInformation' => 'sometimes',
            'offer' => 'sometimes',
            'morePhotos' => 'sometimes',
            'comment' => 'sometimes'
        ],[
            'title.required' => 'این فیلد نمیتواند خالی باشد',
            'phone.required' => 'این فیلد نمیتواند خالی باشد',
            'phone.numeric' => 'لطفا تلفن صحیح وارد کنید',
            'phone.min' => ' تلفن باید 11 عدد باشد  ',
        ])->validate();
        if (Auth::check()) {
            $validatedData['sender_id'] = auth()->user()->id;
        }
        $validatedData['product_id'] = $this->product->id;
        $validatedData['vendor_id'] = $this->product->vendor_id;
        $validatedData['status'] = 'PENDING';
          
        $store  = Inquiries::create($validatedData);
        if($store){
            $vendor = Vendors::where('id',$this->product->vendor_id)->first();
            $this->sendSmsCode($vendor->mobile, $this->product->name,$vendor->user->name);
            $this->state = "";
            $this->addError('storeMessage', 'پیام شما ارسال گردید فروشنده  با شما تماس خواهد گرفت','action');

        }
    }
    public function render()
    {
        $this->seo()
        ->setTitle($this->product->name,false)
        ->setDescription($this->product->description);
        return view('livewire.users.product-list.product-detail')->layout('layouts.users.app');
    }
}
