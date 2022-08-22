<?php

namespace App\Http\Livewire\Admin\CongMessage;

use App\Models\Congratulation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\WithFileUploads;

class CongList extends Component
{
    use WithPagination,WithFileUploads,AuthorizesRequests;

    public $state = [];
    public $editStatus = false;
    public $photo,$cong,$errorMsg=null;
    public $removeId = null;

    protected function resetInputForm()
    {
      
        $this->photo = "";
    }
    public function addNew()
    {
        $this->reset();
        $this->editStatus = false;
        $this->dispatchBrowserEvent('showNew');
    }

    public function uploadImage($image)
    {
        $name = time() . '-' . Str::random(15).$image->getClientOriginalName();
        $name = str_replace(' ', '-', $name);
        Image::make($image)->resize(2880,600)->save(public_path("/images/congra/" . $name));
        return "/images/congra/$name";
    }

    public function store()
    {
        $congCount = Congratulation::all();
        if($congCount->count() > 0){
            $this->errorMsg = 'لطفا پیام موجود را حذف کنید و دوباره تلاش کنید';
        }else{ 
        $validatedData = Validator::make(
            ['photo' => $this->photo],
            ['photo' => 'required|image'],
            [
                'required' => 'این فیلد نمیتواند خالی باشد',
                'image' => 'فقط عکس آپلود کنید',
 
            ],
          )->validate();
        $fileName = $this->uploadImage($this->photo);
        $save = Congratulation::create([
            'image' => $fileName
        ]);
        if ($save) {
        
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-add', ['message' => 'اطلاعات جدید با موفقیت اضافه شد', 'action' => 'success']);
            (new \App\Models\Log())->storeLog('تبریک', 'اضافه کردن اطلاعات', 'ایجاد');
            return redirect()->to(route('admin.cong-list'));
        } else {
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-add', ['message' => 'مشکلی وجود دارد', 'action' => 'error']);
            (new \App\Models\Log())->storeLog('تبریک', 'خطا در اضافه کردن اطلاعات', 'ایجاد');
            return redirect()->to(route('admin.cong-list'));

        }
    }
    }
    public function edit(Congratulation $cong)
    {
        $this->errorMsg = null;
        $this->editStatus = true;
        $this->cong = $cong;
        $this->photo = "";
        
        
    }
    public function update()
    {

        $validatedData = Validator::make(
            ['photo' => $this->photo],
            ['photo' => 'required|image'],
            [
                'required' => 'این فیلد نمیتواند خالی باشد',
                'image' => 'فقط عکس آپلود کنید',
 
            ],
          )->validate();
          $fileName = $this->uploadImage($this->photo);
          $image_path = public_path().'/'.$this->cong->image;
          unlink($image_path);
   
          $update = $this->cong->update([
               'image'=> $fileName
           ]);
      
        if ($update) {
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-add', ['message' => 'اطلاعات  با موفقیت ویرایش شد', 'action' => 'success']);
            (new \App\Models\Log())->storeLog('تبریک', 'ویرایش کردن اطلاعات', 'ویرایش');
            return redirect()->to(route('admin.cong-list'));
        } else {
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-add', ['message' => 'مشکلی وجود دارد', 'action' => 'error']);
            (new \App\Models\Log())->storeLog('تبریک', 'خطا در ویرایش کردن اطلاعات', 'ویرایش');
            return redirect()->to(route('admin.cong-list'));
        }
    }

    public function removeConfirmation($id)
    {
        $this->removeId = $id;
        $this->dispatchBrowserEvent('showDelete');
    }
    public function remove()
    {
        $prov = Congratulation::findOrFail($this->removeId);
        $image_path = public_path().'/'.$prov->image;
        unlink($image_path);
        $delete = $prov->delete();
        if ($delete) {
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hidedelete', ['message' => 'اطلاعات  با موفقیت حذف شد', 'action' => 'success']);
            (new \App\Models\Log())->storeLog('تبریک', 'حذف کردن اطلاعات', 'حذف');
            return redirect()->to(route('admin.cong-list'));

        } else {
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hidedelete', ['message' => 'مشکلی وجود دارد', 'action' => 'error']);
            (new \App\Models\Log())->storeLog('تبریک', 'خطا در حذف کردن اطلاعات', 'حذف');
            return redirect()->to(route('admin.cong-list'));

        }
    }
    public function changeStatus(){
        $this->photo = "";
        $this->errorMsg = null;
        $this->reset();
        $this->editStatus = false;
        $this->resetInputForm();
        $this->resetValidation();
        
    }
    public function render()
    {
        $this->authorize('congratulation');
        $congratulations = Congratulation::where('isActive', 1)
            ->orderBy('id', 'desc')
            ->paginate(21);
        return view('livewire.admin.cong-message.cong-list', ['congratulations' => $congratulations])->layout('layouts.admin.app');
    }
}
