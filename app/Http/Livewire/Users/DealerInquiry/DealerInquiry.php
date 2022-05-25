<?php

namespace App\Http\Livewire\Users\DealerInquiry;

use App\Models\Inquiries;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class DealerInquiry extends Component
{

    public $productInfo,$state=[];

    public function mount($id){
        $productInfo = Product::where('itemNo',$id)->first();
        $this->productInfo = $productInfo;

    }
    public function store(){
        $validatedData = Validator::make($this->state,[
            'title' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:11',
            'isPrice' => 'sometimes',
            'moreInformation' => 'sometimes',
            'offer' => 'sometimes',
            'morePhotos' => 'sometimes',
            'comment' => 'sometimes'
        ],[
            'title.required' => 'این فیلد نمیتواند خالی باشد',
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
            $this->state = "";
            $this->addError('storeMessage', 'پیام شما فرستاده شد با شما تماس میگیریم','action');

        }
    }
    public function render()
    {
        return view('livewire.users.dealer-inquiry.dealer-inquiry')->layout('layouts.users.app');
    }
}
