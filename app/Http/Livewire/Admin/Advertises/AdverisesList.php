<?php

namespace App\Http\Livewire\Admin\Advertises;

use App\Models\Advertises;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;


class AdverisesList extends Component
{
    use WithPagination,WithFileUploads,AuthorizesRequests;

    public $paginationTheme = 'bootstrap';
    public  $editStatus = false;
    public $state = [],$photo=null,$advertise,$removeId;

    public function resetInputForm(){
        $this->state['description'] = "";
        $this->state['expire_at'] = "";
        $this->state['link'] = "";
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
            'category_id' => 'required',
            'link' => 'sometimes'
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
        return redirect()->to(route('admin.advertises'));

       }else{
        $this->resetInputForm();
        $this->resetValidation();
        $this->dispatchBrowserEvent('addBanner', ['message' => 'مشکلی وجود دارد','action'=>'error']);
        (new \App\Models\Log)->storeLog($validatedData['description'],'خطا در اضافه کردن بنر','ایجاد');
        return redirect()->to(route('admin.advertises'));

       }
    }
         public function uploadImage($image)
      {
         $name = time() . '-' . Str::random(15).$image->getClientOriginalName();
          $name = str_replace(' ', '-', $name);
          if ($image->getClientOriginalExtension() == 'gif') {
            copy($image->getRealPath(), public_path("/images/banner/" . $name) );
           }
        else {
            //$image->save(public_path("/images/banner/" . $name));
            Image::make($image)->resize(1150,150)->save(public_path("/images/banner/" . $name));

        }
          return "/images/banner/$name";
      }

    public function edit(Advertises $advertise){
        $this->editStatus = true;
        $this->advertise = $advertise;
        $this->state = $advertise->toArray();
        
    }
    public function update(){
        $validatedData = Validator::make($this->state,[
            'duration' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'link' => 'sometimes'
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
       $image_path = public_path().'/'.$this->advertise->banner;
       unlink($image_path);

       $this->advertise->update([
            'banner'=> $fileName
        ]);
        }
       if($save){
        $this->resetInputForm();
        $this->resetValidation();
        $this->dispatchBrowserEvent('addBanner', ['message' => 'بنر  با موفقیت ویرایش شد','action'=>'success']);
        (new \App\Models\Log)->storeLog($validatedData['description'],'ویرایش کردن بنر','ویرایش');
        return redirect()->to(route('admin.advertises'));
       }else{
        $this->resetInputForm();
        $this->resetValidation();
        $this->dispatchBrowserEvent('addBanner', ['message' => 'مشکلی وجود دارد','action'=>'error']);
        (new \App\Models\Log)->storeLog($validatedData['description'],'خطا در ویرایش کردن بنر','ویرایش');
        return redirect()->to(route('admin.advertises'));
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
            $this->resetInputForm();
            $this->dispatchBrowserEvent('hidedelete', ['message' => 'بنر  با موفقیت حذف شد','action'=>'success']);
            (new \App\Models\Log)->storeLog( $prov->description,'حذف کردن بنر','حذف');
            return redirect()->to(route('admin.advertises'));
           }else{
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hidedelete', ['message' => 'مشکلی وجود دارد','action'=>'error']);
            (new \App\Models\Log)->storeLog( $prov->description,'خطا در حذف کردن بنر','حذف');
            return redirect()->to(route('admin.advertises'));
           }

    }
    public function changeStatus(){
        $this->reset();
        $this->editStatus = false;

        $this->resetInputForm();
        $this->resetValidation();
        
    }
    public function render()
    {  
        $this->authorize('advertise');
        $categories = Category::where('parent',0)->where('isActive',1)->get();
        $advertises = Advertises::latest()->get();
        return view('livewire.admin.advertises.adverises-list',['advertises'=>$advertises,'categories'=>$categories])->layout('layouts.admin.app');
    }
}
