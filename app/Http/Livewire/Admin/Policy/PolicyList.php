<?php

namespace App\Http\Livewire\Admin\Policy;

use App\Models\Policy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class PolicyList extends Component
{
    use AuthorizesRequests;

    public $state =[];
    public $policy;

    public function mount(){
        $policy = Policy::first();
        $this->policy = $policy;
        $this->state = $policy->toArray();
    }

    public function update(){

        $validatedData = Validator::make($this->state,[
            'body' => 'required'
        ],[
            'body.required' => 'این فیلد نمیتواند خالی باشد'
        ])->validate();
        $validatedData['user_id'] = auth()->user()->id;
        $update = $this->policy->update($validatedData);
        if($update){
        
         $this->resetValidation();
         $this->dispatchBrowserEvent('edit-page', ['message' => 'اطلاعات  با موفقیت ویرایش شد','action'=>'success']);
         (new \App\Models\Log)->storeLog( 'صفحه حریم خصوصی','ویرایش کردن اطلاعات','ویرایش');
         // return redirect()->to('dashboard/cities/'.$this->city->province_id);
        }else{
        
         $this->resetValidation();
         $this->dispatchBrowserEvent('edit-page', ['message' => 'مشکلی وجود دارد','action'=>'error']);
         (new \App\Models\Log)->storeLog( 'صفحه حریم خصوصی','خطا در ویرایش کردن اطلاعات','ویرایش');
        }
     }
 

    public function render()
    {
        $this->authorize('policy');
        return view('livewire.admin.policy.policy-list')->layout('layouts.admin.app');
    }
}
