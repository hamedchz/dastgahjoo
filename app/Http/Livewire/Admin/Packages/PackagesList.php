<?php

namespace App\Http\Livewire\Admin\Packages;

use App\Models\Discounts;
use App\Models\Packages;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class PackagesList extends Component
{
    use AuthorizesRequests;
    
    public $state = [];
    public $editStatus = false;
    public $package;
    public $removePackageId = null;

    public function resetInputForm(){
        $this->state['title' ]= "";
        $this->state['price' ]= "";
        $this->state['label' ]= "";
        $this->state['products' ]= "";
        $this->state['duration' ]= "";
        $this->state['images' ]= "";
        $this->state['logo' ]= "";
        $this->state['banner' ]= "";
        $this->state['video' ]= "";
        $this->state['site' ]= "";
        $this->state['file' ]= "";
    }

    public function addNew(){
        $this->reset();
        $this->editStatus = false;
        $this->dispatchBrowserEvent('addNewPackage');
    }
    public function packageStore(){
        $validatedData = Validator::make($this->state,[
            'title' => 'required',
            'price'=>'required|numeric',
            'label'=>'required',
            'products'=>'required',
            'duration'=>'required|numeric',
            'images'=>'required|numeric',
            'logo'=>'required|in:YES,NO',
            'banner'=>'required|numeric',
            'video'=>'required|in:YES,NO',
            'site'=>'required|in:YES,NO',
            'file'=>'required|numeric',
         
        ],
        [
            'title.required' => 'این فیلد ضروری است',
            'price.required' => 'این فیلد ضروری است',
            'price.numeric' => 'این فیلد باید عدد باشد',
            'label.required' => 'این فیلد ضروری است',
            'products.required' => 'این فیلد ضروری است',
            'duration.required' => 'این فیلد ضروری است',
            'images.required' => 'این فیلد ضروری است',
            'images.numeric' => 'این فیلد باید عدد باشد',
            'logo.required' => 'این فیلد ضروری است',
            'logo.in' => ' اطلاعات این فیلد اشتباه است ',
            'banner.required' => 'این فیلد ضروری است',
            'banner.numeric' => 'این فیلد باید عدد باشد',
            'video.required' => 'این فیلد ضروری است',
            'video.in' => 'اطلاعات این فیلد اشتباه است',
            'site.required' => 'این فیلد ضروری است',
            'site.in' => ' اطلاعات این فیلد اشتباه است ',
            'file.required' => 'این فیلد ضروری است',
            'file.numeric' => 'این فیلد ضروری است',
        ])->validate();

        $packageStore = Packages::create($validatedData);
        if ($packageStore) {
            $discount = Discounts::create([
                'package_id' => $packageStore->id,
                'name' => $validatedData['title'],
                'percentage' => 0,
            ]);
            $this->resetInputForm();
            $this->dispatchBrowserEvent('closeNewPackage', ['message' => 'پکیج جدید با موفقیت اضافه شد','action'=>'success']);
            (new \App\Models\Log)->storeLog($packageStore->title,'اضافه کردن پکیج','ایجاد');
        }else{
            $this->dispatchBrowserEvent('closeNewPackage', ['message' => 'مشکلی وجود دارد','action'=>'error']);
            (new \App\Models\Log)->storeLog($packageStore->title,'خطا در اضافه کردن پکیج','ایجاد');

        }

        
    }
    public function editPackage(Packages $package){
        $this->editStatus = true;
        $this->package = $package;
        $this->state = $package->toArray();
        $this->dispatchBrowserEvent('addNewPackage');

    }
    public function updatePackage(){
        $validatedData = Validator::make($this->state,[
            'title' => 'required',
            'price'=>'required|numeric',
            'label'=>'required',
            'products'=>'required',
            'duration'=>'required|numeric',
            'images'=>'required|numeric',
            'logo'=>'required|in:YES,NO',
            'banner'=>'required|numeric',
            'video'=>'required|in:YES,NO',
            'site'=>'required|in:YES,NO',
            'file'=>'required|numeric',
            'isActive' => 'required|in:1,0'
         
        ],
        [
            'title.required' => 'این فیلد ضروری است',
            'price.required' => 'این فیلد ضروری است',
            'price.numeric' => 'این فیلد باید عدد باشد',
            'label.required' => 'این فیلد ضروری است',
            'products.required' => 'این فیلد ضروری است',
            'duration.required' => 'این فیلد ضروری است',
            'images.required' => 'این فیلد ضروری است',
            'images.numeric' => 'این فیلد باید عدد باشد',
            'logo.required' => 'این فیلد ضروری است',
            'logo.in' => ' اطلاعات این فیلد اشتباه است ',
            'banner.required' => 'این فیلد ضروری است',
            'banner.numeric' => 'این فیلد باید عدد باشد',
            'video.required' => 'این فیلد ضروری است',
            'video.in' => 'اطلاعات این فیلد اشتباه است',
            'site.required' => 'این فیلد ضروری است',
            'site.in' => ' اطلاعات این فیلد اشتباه است ',
            'file.required' => 'این فیلد ضروری است',
            'file.numeric' => 'این فیلد ضروری است',
            'isActive.required' => 'این فیلد ضروری است',
            'isActive.in' => ' اطلاعات این فیلد اشتباه است ',

        ])->validate();

        $update = $this->package->update($validatedData);
        $this->resetInputForm();
        if($update) {
            $this->dispatchBrowserEvent('closeNewPackage', ['message' => 'پکیج  با موفقیت ویرایش شد' ,'action' => 'success']);
            (new \App\Models\Log)->storeLog($validatedData['title'],'آپدیت کردن پکیج','ویرایش ');
        }else{
            $this->dispatchBrowserEvent('closeNewPackage', ['message' => 'مشکلی وجود دارد' ,'action' => 'reject']);
            (new \App\Models\Log)->storeLog($validatedData['title'],' خطا در آپدیت کردن پکیج','ویرایش');

        }


    }
    public function removeConfirmation($id){
        $this->removePackageId = $id;
        $this->dispatchBrowserEvent('showPackageDelete');
    }
    public function removePackage(){
        $package = Packages::findOrFail($this->removePackageId);
        $delete = $package->update([
            'isActive' => 0,
        ]);
        if($delete){
            $this->dispatchBrowserEvent('hidePackageDelete',['message' => 'پکیج با موفقیت حذف شد','action' => 'success']);
            (new \App\Models\Log)->storeLog($package->title,'حذف کردن پکیج','حذف ');
        }else{
            $this->dispatchBrowserEvent('hidePackageDelete',['message' => 'مشکلی وجود دارد' , 'action' => 'reject']);
            (new \App\Models\Log)->storeLog($package->title,'خطا در حذف کردن پکیج','حذف ');
        }

    }
    public function render()
    {
        $this->authorize('packages',Packages::class);
        $packages = Packages::where('isActive',1)->latest()->get();
        return view('livewire.admin.packages.packages-list',['packages'=>$packages])->layout('layouts.admin.app');
    }
}
