<?php

namespace App\Http\Livewire\Admin\IndexEdit;

use App\Models\IndexText;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
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
        
       $update = $this->indexText->update([
        'first_part' => $this->state['first_part'],
        'second_part' => $this->state['second_part'],
       ]);
       if($update){
        $this->state = "";
        $this->resetValidation();
        $this->dispatchBrowserEvent('edit-firstpage', ['message' => 'اطلاعات  با موفقیت ویرایش شد','action'=>'success']);
        (new \App\Models\Log)->storeLog( 'صفحه اول','ویرایش کردن اطلاعات','ویرایش');
        // return redirect()->to('dashboard/cities/'.$this->city->province_id);
       }else{
        $this->state = "";
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
