<?php

namespace App\Http\Livewire\Admin\Seller\Product\Edit;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Illuminate\Support\Str;
class ProductEdit extends Component
{
    public $state = [];
    public $categories;
    public $subcategories;
    public $product;


    public function mount($id){
        $product = Product::where('id',$id)->first();
        $this->product = $product;
        $this->state = $product->toArray();
        $categories = Category::where('isActive',1)->where('parent',0)->get(); 
        $this->categories = $categories;
        if ($product->subcategory_id <> null) {
            $subcategories = Category::where('isActive',1)->where('parent',$product->category_id)->get(); 
            $this->subcategories = $subcategories;
            }
    }
    public function changeCategory($id){
        $subcategory = Category::where('parent',$id)->where('isActive',1)->get();
        $this->subcategories = $subcategory;
    }
    public function update(){
        
        $ValidateData = Validator::make($this->state,[
            'quantity' => 'required',
            'year_of_manufacture' => 'required',
            'price' => 'required',
            'manufacturer' => 'required',
            'model' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'type_of_machine' => 'required',
            'isStock' => 'required|in:1,2',
            'isInstallments' => 'required|in:0,1',
            'isSold' => 'required|in:0,1',
            'location' => 'required',
            'description' => 'sometimes',
            'site_url' => 'sometimes'
        ],[
           'quantity.required' => 'این فیلد نمیتواند خالی باشد',
           'year_of_manufacture.required' => 'این فیلد نمیتواند خالی باشد',
           'price.required' => 'این فیلد نمیتواند خالی باشد',
           'manufacturer.required' => 'این فیلد نمیتواند خالی باشد',
           'model.required' => 'این فیلد نمیتواند خالی باشد',
           'category_id.required' => 'این فیلد نمیتواند خالی باشد',
           'name.required' => 'این فیلد نمیتواند خالی باشد',
           'type_of_machine.required' => 'این فیلد نمیتواند خالی باشد',
           'isStock.required' => 'این فیلد نمیتواند خالی باشد',
           'isInstallments.required' => 'این فیلد نمیتواند خالی باشد',
           'isSold.required' => 'این فیلد نمیتواند خالی باشد',
           'location.required' => 'این فیلد نمیتواند خالی باشد',
           'isStock.in' => 'اطلاعات این فیلد اشتباه است',
           'isInstallments.in' => 'اطلاعات این فیلد اشتباه است',
           'isSold.in' => 'اطلاعات این فیلد اشتباه است',

        ])->validate();  
        

        $ValidateData['category_id'] = $this->state['category_id'];
        $cat = Category::where('id',$this->state['category_id'])->first();

        if($this->state['subcategory_id'] <> 0){ 
            $subcat = Category::where('id',$this->state['subcategory_id'])->first();
            $ValidateData['subcategory_id'] = $this->state['subcategory_id'];
            $ValidateData['slug'] = $cat->slug.'/'.$subcat->slug.'/'. Str::slug($ValidateData['name']);
        }else{
            $ValidateData['subcategory_id'] = null;
            $ValidateData['slug'] = $cat->slug.'/'. Str::slug($ValidateData['name']);

        }
        //$ValidateData['vandor_id'] = $this->vendor->id;
        if(empty($ValidateData['site_url'])){
            $ValidateData['site_url'] = null;
        }
        if(empty($ValidateData['description'])){
            $ValidateData['description'] = null;
        }
        $store = $this->product->update($ValidateData);
        if ($store) {
            
            $this->resetValidation();
            $this->dispatchBrowserEvent('addProduct',['message' => 'محصول با موفقیت ویرایش  شد ', 'action' => 'success']);
            (new \App\Models\Log)->storeLog($ValidateData['name'],'ویرایش محصول ','ویرایش');
            // return redirect(route('user.addProduct'));

        }else{
            
            $this->resetValidation();
            $this->dispatchBrowserEvent('addProduct',['message' => 'مشکلی وجود دارد', 'action' => 'error']);
            (new \App\Models\Log)->storeLog($ValidateData['name'],' خطا در  ویرایش محصول  ','ویرایش');
            // return redirect(route('user.addProduct'));

        }
    }
    public function render()
    {
        return view('livewire.admin.seller.product.edit.product-edit')->layout('layouts.admin.app');
    }
}
