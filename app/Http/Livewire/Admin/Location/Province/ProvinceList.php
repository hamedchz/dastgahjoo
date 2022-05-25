<?php

namespace App\Http\Livewire\Admin\Location\Province;

use App\Models\Province;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ProvinceList extends Component
{
    use AuthorizesRequests;
    public $stateProvince=[];
    public $editStatus = false;
    public $province;
    public $removeId = null;

    protected function resetInputForm(){
        $this->stateProvince['title'] = "";
    }
    public function addNew(){
        $this->reset();
        $this->editStatus = false;
        $this->dispatchBrowserEvent('show-addProvince');
    }

    public function storeProvince(){
        $validatedData = Validator::make($this->stateProvince,[
            'title' => 'required'
        ],[
            'title.required' => 'این فیلد نمیتواند خالی باشد'
        ])->validate();
       $save =  Province::create($validatedData);
       if($save){
        $this->resetInputForm();
        $this->resetValidation();
        $this->dispatchBrowserEvent('hide-addProvince', ['message' => 'استان جدید با موفقیت اضافه شد','action'=>'success']);
        (new \App\Models\Log)->storeLog($this->stateProvince['title'],'اضافه کردن استان','ایجاد');
       }else{
        $this->resetInputForm();
        $this->resetValidation();
        $this->dispatchBrowserEvent('hide-addProvince', ['message' => 'مشکلی وجود دارد','action'=>'error']);
        (new \App\Models\Log)->storeLog($this->stateProvince['title'],'خطا در اضافه کردن استان','ایجاد');
       }
    }
    public function editProvince(Province $province){
        $this->editStatus = true;
        $this->province = $province;
        $this->stateProvince = $province->toArray();
        $this->dispatchBrowserEvent('show-addProvince');
    }
    public function updateProvince(){
        $validatedData = Validator::make($this->stateProvince,[
            'title' => 'required'
        ],[
            'title.required' => 'این فیلد نمیتواند خالی باشد'
        ])->validate();
        $update = $this->province->update([ 
            'title' => $validatedData['title'],
        ]);
        if($update){
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-addProvince', ['message' => 'استان  با موفقیت ویرایش شد','action'=>'success']);
            (new \App\Models\Log)->storeLog($this->stateProvince['title'],'ویرایش کردن استان','ویرایش');
           }else{
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-addProvince', ['message' => 'مشکلی وجود دارد','action'=>'error']);
            (new \App\Models\Log)->storeLog($this->stateProvince['title'],'خطا در ویرایش کردن استان','ویرایش');
           }
    }
    public function addCity(){
        $this->dispatchBrowserEvent('show-addCity');
    }
    public function removeConfirmation($id){
        $this->removeId = $id;
        $this->dispatchBrowserEvent('show-provinceDelete');
    }
    public function removeProvince(){
        $prov = Province::findOrFail($this->removeId);
        $delete = $prov->update([
            'isActive' => 0,
        ]);
        if($delete){
            $this->dispatchBrowserEvent('hide-deleteProvince', ['message' => 'استان  با موفقیت حذف شد','action'=>'success']);
            (new \App\Models\Log)->storeLog( $prov->title,'حذف کردن استان','حذف');
           }else{
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-addCity', ['message' => 'مشکلی وجود دارد','action'=>'error']);
            (new \App\Models\Log)->storeLog( $prov->title,'خطا در حذف کردن استان','حذف');
           }

    }
    public function render()
    {
        $this->authorize('location',Province::class);
        $provinces =Province::with('cities')->where('isActive',1)->orderBy('id','desc')->get();
        return view('livewire.admin.location.province.province-list',['provinces'=> $provinces])->layout('layouts.admin.app');
    }
}
