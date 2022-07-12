<?php

namespace App\Http\Livewire\Admin\MembershipBody;

use App\Models\MembershipBody;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;

use Livewire\Component;

class MemebershipBody extends Component
{
    use AuthorizesRequests;
    public $indexText,$state = [];

    public function mount(){
        $data = MembershipBody::first();
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
        (new \App\Models\Log)->storeLog( 'صفحه عضویت','ویرایش کردن اطلاعات','ویرایش');
       }else{
        $this->resetValidation();
        $this->dispatchBrowserEvent('edit-firstpage', ['message' => 'مشکلی وجود دارد','action'=>'error']);
        (new \App\Models\Log)->storeLog( 'صفحه عضویت','خطا در ویرایش کردن اطلاعات','ویرایش');

       }
    }

    public function render()
    {
        $this->authorize('membershipBody');
        return view('livewire.admin.membership-body.memebership-body')->layout('layouts.admin.app');
    }
}
