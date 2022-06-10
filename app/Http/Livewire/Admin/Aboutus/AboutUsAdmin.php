<?php

namespace App\Http\Livewire\Admin\Aboutus;

use App\Models\Aboutus;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class AboutUsAdmin extends Component
{
    use AuthorizesRequests;
    public $state = [];

    public function mount(){
        $aboutus = Aboutus::findOrFail(1);
        $this->state = $aboutus->toArray();
    }
    public function update(){
        
     
        $about = Aboutus::where('id',1)->first();
        $update = $about->update([
            'user_id' => auth()->user()->id,
            'body' => $this->state['body']
        ]);
    
        if($update){
            $this->reset();
            $this->dispatchBrowserEvent('aboutus', ['message' => '  با موفقیت ویرایش شد','action'=>'success']);
            (new \App\Models\Log)->storeLog( 'درباره ما','ویرایش کردن ','ویرایش');
           }else{
            $this->reset();
            $this->resetValidation();
            $this->dispatchBrowserEvent('aboutus', ['message' => 'مشکلی وجود دارد','action'=>'error']);
            (new \App\Models\Log)->storeLog( 'درباره ما','خطا در ویرایش کردن ','ویرایش');
           }
    }

    public function render()
    {
        $this->authorize('aboutus',Aboutus::class);
  
        return view('livewire.admin.aboutus.about-us-admin')->layout('layouts.admin.app');
    }
}
