<?php

namespace App\Http\Livewire\Admin\MachineSearch;

use App\Models\MachineSearch as ModelsMachineSearch;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class MachineSearch extends Component
{
    use AuthorizesRequests;

    public $indexText,$state = [];

    public function mount(){
        $data = ModelsMachineSearch::findOrFail(2);
        $this->indexText = $data;
        $this->state = $data->toArray();
    }
    public function update(){
        
       $update = $this->indexText->update([
        'firstSection' => $this->state['firstSection'],
        'secondSection' => $this->state['secondSection'],
        'thirdSection' => $this->state['thirdSection'],
        'forthSection' => $this->state['forthSection'],
        'fifthSection' => $this->state['fifthSection'],
        'sixthSection' => $this->state['sixthSection'],
       ]);
       if($update){
        
        $this->resetValidation();
        $this->dispatchBrowserEvent('edit-firstpage', ['message' => 'اطلاعات  با موفقیت ویرایش شد','action'=>'success']);
        (new \App\Models\Log)->storeLog( 'صفحه جستجو','ویرایش کردن اطلاعات','ویرایش');
        // return redirect()->to('dashboard/cities/'.$this->city->province_id);
       }else{
        
        $this->resetValidation();
        $this->dispatchBrowserEvent('edit-firstpage', ['message' => 'مشکلی وجود دارد','action'=>'error']);
        (new \App\Models\Log)->storeLog( 'صفحه جستجو','خطا در ویرایش کردن اطلاعات','ویرایش');
       }
    }

    public function render()
    {
        $this->authorize('edit-serachpage');
        return view('livewire.admin.machine-search.machine-search')->layout('layouts.admin.app');
    }
}
