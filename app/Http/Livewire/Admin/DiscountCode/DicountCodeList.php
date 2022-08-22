<?php

namespace App\Http\Livewire\Admin\DiscountCode;

use App\Models\DiscountCode;
use App\Models\Discounts;
use App\Models\Packages;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class DicountCodeList extends Component
{
    use WithPagination,AuthorizesRequests;

    public $state = [];
    public $editStatus = false;
    public $removeId  = null;
    public $discount;

    public function resetFields(){
      
        $this->state['code'] = "";
        $this->state['percentage'] = "";
    }

    public function store(){
       
        $validateData = Validator::make($this->state,
        [
            
            'code' => 'required|unique:discount_code,code',
            'percentage' => 'required|integer|between:1,100',
            
        ],
        [
            
            'code.required' =>  'این فیلد نمیتواند خالی باشد',
            'code.unique' =>  'این کد  تکراری است',
            'percentage.required' =>  'این فیلد نمیتواند خالی باشد',
            'percentage.between' =>  'این فیلد میتواند بین 1 تا 100 باشد',

      
        ])->validate();
        // $validateData['slug'] = $this->slugify($validateData['slug']);
        $save = DiscountCode::create($validateData);
        if($save){
            $this->resetFields();
            $this->resetValidation();
            (new \App\Models\Log)->storeLog($this->state['code'],' ایجاد تخفیف پکیج','ایجاد');
            $this->dispatchBrowserEvent('showNew',['message'=>'تخفیف پکیج با موفقیت ایجاد شد', 'action'=>'success']);
        }else{
            $this->resetFields();
            $this->resetValidation();
            (new \App\Models\Log)->storeLog($this->state['code'],'خطا ایجاد تخفیف پکیج','ایجاد ');
            $this->dispatchBrowserEvent('showNew',['message'=>'مشکلی وجود دارد', 'action'=>'error']);

        }
    }
    public function changeStatus(){
        $this->reset();
        $this->editStatus = false;
        $this->resetFields();
        $this->resetValidation();
        
    }
    public function changeActivate(DiscountCode $discount,$status){
        
        // $statusDiscount = Discounts::findOrFail($id);
        $update = $discount->update([
            'isActive' => $status
        ]);
        if($update){
            (new \App\Models\Log)->storeLog($discount->code,'ویرایش تخفیف پکیج','ویرایش');
            $this->dispatchBrowserEvent('showNew',['message'=>'تخفیف پکیج با موفقیت ویرایش شد', 'action'=>'success']);
        }else{
            (new \App\Models\Log)->storeLog($discount->code,'خطا ویرایش تخفیف پکیج','ویرایش');
            $this->dispatchBrowserEvent('showNew',['message'=>'مشکلی وجود دارد', 'action'=>'error']);

        }
    }
    public function edit(DiscountCode $discount){
        $this->editStatus = true;
        $this->discount = $discount;
        $this->state = $discount->toArray();
    }
    public function update(){
        $validateData = Validator::make($this->state,
        [
            'code' => 'required|unique:discount_code,code,'.$this->discount->id,
            'percentage' => 'required|integer|between:1,100',
            
        ],
        [
            'code.required' =>  'این فیلد نمیتواند خالی باشد',
             'code.unique' =>  'این کد  تکراری است',
            'percentage.required' =>  'این فیلد نمیتواند خالی باشد',
            'percentage.between' =>  'این فیلد میتواند بین 1 تا 100 باشد',

      
        ])->validate();
        // $validateData['slug'] = $this->slugify($validateData['slug']);
        $update = $this->discount->update($validateData);
        if($update){
            $this->resetFields();
            $this->resetValidation();
            $this->changeStatus();
            (new \App\Models\Log)->storeLog($this->state['code'],' ویرایش تخفیف پکیج','ویرایش');
            $this->dispatchBrowserEvent('showNew',['message'=>'تخفیف پکیج با موفقیت ویرایش شد', 'action'=>'success']);
        }else{
            $this->resetFields(); 
            $this->resetValidation();
            $this->changeStatus();
            (new \App\Models\Log)->storeLog($this->state['code'],'خطا ویرایش تخفیف پکیج','ویرایش ');
            $this->dispatchBrowserEvent('showNew',['message'=>'مشکلی وجود دارد', 'action'=>'error']);

        }
    }
    public function removeConfirmation($id){
        $this->removeId = $id;
        $this->dispatchBrowserEvent('show-deleteCategory');
    }

    public function removeCategory(){
       
        $cat = DiscountCode::findOrFail($this->removeId);
       
        $sub = $cat->parents()->delete();
        // $products = $cat->products()->
        $delete = $cat->delete();
        if($delete){
            (new \App\Models\Log)->storeLog($cat->title,'حذف تخفیف پکیج','حذف');
            $this->dispatchBrowserEvent('hide-deleteCategory',['message'=>'تخفیف پکیج با موفقیت حذف شد', 'action'=>'success']);
        }else{
            (new \App\Models\Log)->storeLog($cat->title,'خطا حذف تخفیف پکیج','حذف');
            $this->dispatchBrowserEvent('hide-deleteCategory',['message'=>'مشکلی وجود دارد', 'action'=>'error']);

        }
    }
    public function render()
    {
        $this->authorize('dicountCode');
        $discounts = DiscountCode::orderBy('id','desc')->get();
        $packages = Packages::where('isActive',1)->get();
        return view('livewire.admin.discount-code.dicount-code-list',['discounts'=>$discounts,'packages'=>$packages])->layout('layouts.admin.app');
    }
}
