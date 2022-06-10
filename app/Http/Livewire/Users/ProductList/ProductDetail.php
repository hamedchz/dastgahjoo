<?php

namespace App\Http\Livewire\Users\ProductList;

use App\Models\Inquiries;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class ProductDetail extends Component
{
    use SEOToolsTrait;

    public $product,$state=[];

    public function mount($id){
        $product = Product::with('images')->where('id',$id)->first();
        $product->update([
            'view' => ($product->view)+1,
       ]);
        $this->product = $product;

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
        $validatedData['product_id'] = $this->product->id;
        $validatedData['vendor_id'] = $this->product->vendor_id;
        $validatedData['status'] = 'PENDING';
          
        $store  = Inquiries::create($validatedData);
        if($store){
            $this->state = "";
            $this->addError('storeMessage', 'پیام شما فرستاده شد با شما تماس میگیریم','action');

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
