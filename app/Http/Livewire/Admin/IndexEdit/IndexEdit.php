<?php

namespace App\Http\Livewire\Admin\IndexEdit;

use App\Models\IndexText;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class IndexEdit extends Component
{
    use AuthorizesRequests;

    public $indexText,$state = [];

    public function mount(){
        $data = IndexText::findOrFail(1);
        $this->indexText = $data;
        $this->state = $data->toArray();
    }
    public function update(){
        $validatedData = Validator::make($this->state,[
            'first_part' => 'required',
            'second_part' => 'required',
        ],[
            'first_part.required' => 'این فیلد نمیتواند خالی باشد',
            'second_part.required' => 'این فیلد نمیتواند خالی باشد'

        ])->validate();
       $update = $this->indexText->update($validatedData);
       if($update){
        
        $this->resetValidation();
        $this->dispatchBrowserEvent('edit-firstpage', ['message' => 'اطلاعات  با موفقیت ویرایش شد','action'=>'success']);
        (new \App\Models\Log)->storeLog( 'صفحه اول','ویرایش کردن اطلاعات','ویرایش');
        // return redirect()->to('dashboard/cities/'.$this->city->province_id);
       }else{
        
        $this->resetValidation();
        $this->dispatchBrowserEvent('edit-firstpage', ['message' => 'مشکلی وجود دارد','action'=>'error']);
        (new \App\Models\Log)->storeLog( 'صفحه اول','خطا در ویرایش کردن اطلاعات','ویرایش');
       }
    }

    public function render()
    {
        $this->authorize('edit-homepage');
      
        return view('livewire.admin.index-edit.index-edit')->layout('layouts.admin.app');
    }
}
