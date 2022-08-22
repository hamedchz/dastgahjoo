<?php

namespace App\Http\Livewire\Admin\Background;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\WithFileUploads;

class BackgroundSite extends Component
{

    use WithFileUploads,AuthorizesRequests;
    public $photo;
    
    public function uploadImage($image)
    {
        $name =  $image->getClientOriginalName();
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $name = 'background.'.$ext;
        $image_path = public_path().'/frontend/background.jpg';
        unlink($image_path);
        Image::make($image)->resize(2008,946)->save(public_path("/frontend/" . $name));
        return $name;
    }
    public function store()
    {
     
        $validatedData = Validator::make(
            ['photo' => $this->photo],
            ['photo' => 'required|image|mimes:jpg'],
            [
                'required' => 'این فیلد نمیتواند خالی باشد',
                'image' => 'فقط عکس آپلود کنید',
                'mimes' => 'فقط عکس با پسوند jpg آپلود کنید',
 
            ],
          )->validate();
        $fileName = $this->uploadImage($this->photo);
     
        if($fileName){  
        
            $this->photo = "";
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-add', ['message' => 'اطلاعات جدید با موفقیت اضافه شد', 'action' => 'success']);
            (new \App\Models\Log())->storeLog('بکگراند', 'اضافه کردن اطلاعات', 'ایجاد');
            // return redirect()->to(route('admin.cong-list'));
        } else {
            $this->photo = "";
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-add', ['message' => 'مشکلی وجود دارد', 'action' => 'error']);
            (new \App\Models\Log())->storeLog('بکگراند', 'خطا در اضافه کردن اطلاعات', 'ایجاد');
            // return redirect()->to(route('admin.cong-list'));

        }
    }
    
    public function render()
    {
        $this->authorize('backgroundPicture');
        return view('livewire.admin.background.background-site')->layout('layouts.admin.app');
    }
}
