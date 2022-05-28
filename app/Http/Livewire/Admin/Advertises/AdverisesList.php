<?php

namespace App\Http\Livewire\Admin\Advertises;

use App\Models\Advertises;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;


class AdverisesList extends Component
{
    use WithPagination,WithFileUploads;

    public $paginationTheme = 'bootstrap';
    public  $editStatus = false;
    public $state = [],$photo=null,$advertise,$removeId;

    public function resetInputForm(){
        $this->state['description'] = "";
        $this->state['expire_at'] = "";
        $this->photo = null;

    }
    public function add(){
        $this->reset();
        $this->editStatus = false;
        $this->dispatchBrowserEvent('showNew');
    }
    public function store(){
        
        $validatedData = Validator::make($this->state,[
            'duration' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ],[
            'duration.required' => 'این فیلد نمیتواند خالی باشد',
            'description.required' => 'این فیلد نمیتواند خالی باشد',
            'category_id.required' => 'این فیلد نمیتواند خالی باشد',
        ])->validate();
       $validatedData['expire_at'] = Carbon::now()->addDay($validatedData['duration']);
       $save =  Advertises::create($validatedData);
       if (!is_null($this->photo)) {
       $fileName = $this->uploadImage($this->photo);
        $save->update([
            'banner'=> $fileName
        ]);
        }
       if($save){
        $this->resetInputForm();
        $this->resetValidation();
        $this->dispatchBrowserEvent('addBanner', ['message' => 'بنر جدید با موفقیت اضافه شد','action'=>'success']);
        (new \App\Models\Log)->storeLog($validatedData['description'],'اضافه کردن بنر','ایجاد');
       }else{
        $this->resetInputForm();
        $this->resetValidation();
        $this->dispatchBrowserEvent('addBanner', ['message' => 'مشکلی وجود دارد','action'=>'error']);
        (new \App\Models\Log)->storeLog($validatedData['description'],'خطا در اضافه کردن بنر','ایجاد');
       }
    }
    public function uploadImage($image)
    {
        $year = now()->year;
        $month = now()->month;
      //   $directory = "/storage/images/products/$year/$month";
        $directory = "/images/banner/$year/$month";
        $name = time() . '-' . Str::random(15).$image->getClientOriginalName();
        $name = str_replace(' ', '-', $name);
        $image->storeAs($directory, $name);
        return "/storage$directory/$name";
    }
    public function edit(Advertises $advertise){
        $this->editStatus = true;
        $this->advertise = $advertise;
        $this->state = $advertise->toArray();
        $this->dispatchBrowserEvent('showNew');
    }
    public function update(){
        $validatedData = Validator::make($this->state,[
            'duration' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ],[
            'duration.required' => 'این فیلد نمیتواند خالی باشد',
            'description.required' => 'این فیلد نمیتواند خالی باشد',
            'category_id.required' => 'این فیلد نمیتواند خالی باشد',
        ])->validate();
    $validatedData['expire_at'] = Carbon::now()->addDay($validatedData['duration']);
       $save = $this->advertise->update($validatedData);
    //    $save =  Advertises::create($validatedData);
       if (!is_null($this->photo)) {
       $fileName = $this->uploadImage($this->photo);
       $this->advertise->update([
            'banner'=> $fileName
        ]);
        }
       if($save){
        $this->resetInputForm();
        $this->resetValidation();
        $this->dispatchBrowserEvent('addBanner', ['message' => 'بنر  با موفقیت ویرایش شد','action'=>'success']);
        (new \App\Models\Log)->storeLog($validatedData['description'],'ویرایش کردن بنر','ویرایش');
       }else{
        $this->resetInputForm();
        $this->resetValidation();
        $this->dispatchBrowserEvent('addBanner', ['message' => 'مشکلی وجود دارد','action'=>'error']);
        (new \App\Models\Log)->storeLog($validatedData['description'],'خطا در ویرایش کردن بنر','ویرایش');
       }
    }
    public function removeConfirmation($id){
        $this->removeId = $id;
        $this->dispatchBrowserEvent('showDelete');
    }
    public function remove(){
        $prov = Advertises::findOrFail($this->removeId);
        $delete = $prov->delete();
        $image_path = public_path().'/'.$prov->banner;
        unlink($image_path);
        if($delete){
            $this->dispatchBrowserEvent('hidedelete', ['message' => 'بنر  با موفقیت حذف شد','action'=>'success']);
            (new \App\Models\Log)->storeLog( $prov->description,'حذف کردن بنر','حذف');
           }else{
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hidedelete', ['message' => 'مشکلی وجود دارد','action'=>'error']);
            (new \App\Models\Log)->storeLog( $prov->description,'خطا در حذف کردن بنر','حذف');
           }

    }
    public function render()
    {   $categories = Category::where('parent',0)->where('isActive',1)->get();
        $advertises = Advertises::latest()->paginate(21);
        return view('livewire.admin.advertises.adverises-list',['advertises'=>$advertises,'categories'=>$categories])->layout('layouts.admin.app');
    }
}
