<?php

namespace App\Http\Livewire\Admin\Location\City;

use App\Models\City;
use App\Models\Province;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\This;

class CityList extends Component
{
    use WithPagination,AuthorizesRequests;
    
    public $state = [];
    public $cities;
    public $editStatus=false;
    public $provinceId = null;
    public $cityId = null;
    public $city;
    public $cityProvinceId = null;
    public $removeId = null;
    Protected $paginationTheme = 'bootstrap';

    protected function resetInputForm(){
        $this->state['title'] = "";
    }

    public function mount($id){
        $cities = City::with('province')->where('province_id',$id)->where('isActive',1)->latest()->get();
        $this->cities = $cities;
        $this->cityProvinceId = $id;
        
    }
    public function addNew($id){
        $this->reset();
        $this->mount($id);
        $this->provinceId = $id;
        $this->editStatus = false;
        $this->dispatchBrowserEvent('show-addCity');

    }
    public function storeCity(){
        
        $validatedData = Validator::make($this->state,[
            'title' => 'required'
        ],[
            'title.required' => 'این فیلد نمیتواند خالی باشد'
        ])->validate();
        $save = DB::table('cities')->insert([
            'title' => $validatedData['title'],
            'province_id' => $this->provinceId,
        ]);
        if($save){
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-addCity', ['message' => 'شهر جدید با موفقیت اضافه شد','action'=>'success']);
            (new \App\Models\Log)->storeLog( $validatedData['title'],'اضافه کردن شهر','ایجاد');
            return redirect()->to('dashboard/cities/'.$this->provinceId);
           }else{
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-addCity', ['message' => 'مشکلی وجود دارد','action'=>'error']);
            (new \App\Models\Log)->storeLog( $validatedData['title'],'خطا در اضافه کردن شهر','ایجاد');
           }
       
    }
    public function edit(City $city){
       $this->city = $city;
       $this->state = $city->toArray();
       $this->editStatus = true;
       $this->dispatchBrowserEvent('show-addCity');
    }
    public function updateCity(){
        $validatedData = Validator::make($this->state,[
            'title' => 'required'
        ],[
            'title.required' => 'این فیلد نمیتواند خالی باشد'
        ])->validate();
        $update = City::where('id',$this->city->id)->update([
            'title' => $validatedData['title'],
        ]);
        if($update){
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-addCity', ['message' => 'شهر  با موفقیت ویرایش شد','action'=>'success']);
            (new \App\Models\Log)->storeLog( $validatedData['title'],'ویرایش کردن شهر','ویرایش');
            return redirect()->to('dashboard/cities/'.$this->city->province_id);
           }else{
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-addCity', ['message' => 'مشکلی وجود دارد','action'=>'error']);
            (new \App\Models\Log)->storeLog( $validatedData['title'],'خطا در ویرایش کردن شهر','ایجاد');
           }
    }
    public function removeConfirmation($id){
        $this->removeId = $id;
        $this->dispatchBrowserEvent('show-deleteCity');
    }
    public function removeCity(){
         $city = City::FindOrFail($this->removeId);
        //  dd($city);
         $delete = $city->update([
             'isActive' => 0,
         ]);
        if($delete){
            $this->dispatchBrowserEvent('hide-cityDelete', ['message' => 'شهر  با موفقیت حذف شد','action'=>'success']);
            (new \App\Models\Log)->storeLog( $city->title,'حذف کردن شهر','حذف');
            return redirect()->to('dashboard/cities/'.$city->province_id);
           }else{
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-addCity', ['message' => 'مشکلی وجود دارد','action'=>'error']);
            (new \App\Models\Log)->storeLog( $city->title,'خطا در حذف کردن شهر','حذف');
           }

    }
    public function render()
    {
        $this->authorize('location',City::class);
        return view('livewire.admin.location.city.city-list')->layout('layouts.admin.app');
    }
}
