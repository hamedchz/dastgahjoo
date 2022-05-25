<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\User;
use App\Models\Vendors;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class UserProfile extends Component
{

    use WithFileUploads;

    public $state = [];
    public $avatar;
    public $oldAvatar;

    public function updateUser(){
        
        $user = User::where('id',auth()->user()->id)->first();
        $validatedData = Validator::make($this->state,[
            'name'=>'required',
            'mobile'=> 'required|numeric|unique:users,mobile,'.$user->id,
            'password' => ['sometimes', 'required_with:password_confirmation','same:password_confirmation','min:8'],
            'about' => 'sometimes',
            
            
        ],[
            'name.required' => 'این فیلد نمیتواند خالی باشد',
            'mobile.required' => 'این فیلد نمیتواند خالی باشد',
            'mobile.unique'  => 'این شماره قبلا استفاده شده',
            'password.same' => 'کلمه عبور یکسان نیست'

        ])->validate();
        $this->validate([
            'avatar' => 'sometimes|image|max:2048', 
        ],[
            'avatar.image' => 'فایل مورد نظر باید عکس باشد',
            'avatar.max' => 'حداکثر حجم فایل 1 مگا بایت است'
        ]);
        if($this->avatar){
            if($this->oldAvatar <> 'N\A'){
                Storage::disk('avatars')->delete($this->oldAvatar);
            }
            $validatedData['avatar'] =  $this->uploadVideo($this->avatar);


        }
        if(!empty($validatedData['password'])){
            $validatedData['password'] = bcrypt($validatedData['password']);
        }
        $update = $user->update($validatedData);
        if($update){
            
            (new \App\Models\Log)->storeLog($validatedData['name'],'ویرایش کاربر ','ویرایش');
            $this->dispatchBrowserEvent('hide-newAdmin',['message'=>'کاربر با موفقیت ویرایش شد', 'action'=>'success']);
            
        }else{
            (new \App\Models\Log)->storeLog($validatedData['name'],'خطا ویرایش کاربر','ویرایش');
            $this->dispatchBrowserEvent('hide-newAdmin',['message'=>'مشکلی وجود دارد', 'action'=>'error']);
            
        }
    
    }
    public function uploadImage($image)
    {
        $year = now()->year;
        $month = now()->month;
      //   $directory = "/storage/images/products/$year/$month";
        $directory = "/images/avatar/$year/$month";
        $name = time() . '-' . Str::random(15).$image->getClientOriginalName();
        $name = str_replace(' ', '-', $name);
        $image->storeAs($directory, $name);
        return "/storage$directory/$name";
    }
    public function render()
    {
        $user = User::where('id',auth()->user()->id)->first();
        $this->state = $user->toArray();
        $this->oldAvatar = $user->avatar;
        return view('livewire.admin.profile.user-profile')->layout('layouts.admin.app');
    }
}
