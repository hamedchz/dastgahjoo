<?php

namespace App\Http\Livewire\Admin\Seller\Profile;

use App\Models\City;
use App\Models\Province;
use App\Models\User;
use App\Models\Vendors;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class VendorProfile extends Component
{
    use WithFileUploads;

    public $state = [];
    public $data = [];
    public $name;
    public $avatar;
    public $oldAvatar;
    public $about;
    public $mobile;
    public $provinces;
    public $cities;
    public $user;
    public $logo;
    public $oldLogo;
    public $address;
    public $fax;
    public $email;
    public $contactPerson;
    public $password;
    public $password_confirmation;
    public $province;
    public $city;
    public $phone;



    
    public function mount(){
        $user = Vendors::with('user')->with('package')->where('user_id',auth()->user()->id)->get();
        $provinces = Province::all();
        $cities = City::where('province_id',$user[0]->province_id)->get();
        $this->user = $user;
        $this->address = $user[0]->address;
        $this->fax = $user[0]->fax;
        $this->email = $user[0]->email;
        $this->phone = $user[0]->phone;
        $this->contactPerson = $user[0]->contactPerson;
        $this->provinces = $provinces;
        $this->cities = $cities;
        $userInfo = User::where('id',auth()->user()->id)->first();
        $this->state = $userInfo->toArray();
        $this->oldAvatar = $userInfo->avatar;
    }

    public function updateVendor(){
      
        $user = User::where('id',auth()->user()->id)->first();
        $vendor = Vendors::where('user_id',auth()->user()->id)->first();
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
       
        if($this->avatar){
            if($this->oldAvatar <> 'N\A'){
                // Storage::disk('avatars')->delete($this->oldAvatar);
                Storage::delete($this->oldAvatar);
           
                
            }
            $validatedData['avatar'] = $this->uploadImage($this->avatar);;
            

        }
       
        if(!empty($validatedData['password'])){
            $validatedData['password'] = bcrypt($validatedData['password']);
        }
        $vendorData = [
            'address' => $this->address,
            'fax' => $this->fax,
            'email' => $this->email,
            'phone' => $this->phone,
            'contactPerson' => $this->contactPerson,

        ];
        if($this->logo){
            if($this->oldLogo <> 'N\A'){
                Storage::disk('logos')->delete($this->oldLogo);
            }
            $vendorData['logo'] = $this->logo->store('/','logos');

        }
        if($this->province <> null){
            $vendorData['province_id'] = $this->province;
        }
        if($this->city <> null){
            $vendorData['city_id'] = $this->city;
        }

        $updateVendor = Vendors::where('user_id',auth()->user()->id)->update($vendorData);
  
        $update = $user->update($validatedData);

        if($update){
            
            (new \App\Models\Log)->storeLog($validatedData['name'],'ویرایش کاربر ','ویرایش');
            $this->dispatchBrowserEvent('hide-newAdmin',['message'=>'کاربر با موفقیت ویرایش شد', 'action'=>'success']);
            return redirect()->route('vendor.profile');
            
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
    public function getCity($id){
        
        $cities = City::where('province_id',$id)->get();
        $this->cities = $cities;
    }

    public function render()
    {
 
        return view('livewire.admin.seller.profile.vendor-profile')->layout('layouts.admin.app');
    }
}
