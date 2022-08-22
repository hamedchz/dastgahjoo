<?php

namespace App\Http\Livewire\Admin\Messages\Contactus;

use App\Models\Contactus;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;
use Mockery\Matcher\Contains;

class ContactList extends Component
{
    use WithPagination,AuthorizesRequests;

    public $paginationTheme = 'bootstrap';
    public $state=[];
    public $removeId = null;
    public $status;
    public $sortDirection = 'desc';
    public $sortColumnName = 'created_at';
    

    public function filterMessagesByStatus($status = null){
        $this->resetPage();
        $this->status = $status;
        
    }

    public function sortBy($sort){

        if ($this->sortColumnName === $sort) {
            $this->sortDirection = $this->swapDirection();
        }else{
            $this->sortDirection = 'asc';
        }
        
        $this->sortColumnName = $sort;
    }

    public function swapDirection(){
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function getMessagesProperty(){
    
        return Contactus::when($this->status,function($query,$status){
       
            return $query->where('seen',$status);
        })->orderBy($this->sortColumnName,$this->sortDirection)->paginate(21);
    }

    public function removeConfirmation($id){
        $this->removeId = $id;
        $this->dispatchBrowserEvent('show-deleteContact');
    }

    public function removeContact(){
        $message = Contactus::findOrFail($this->removeId);
        $delete = $message->delete();
        if ($delete) {
            $this->dispatchBrowserEvent('hide-deleteContact',['message'=> 'پیام با موفقیت حذف شد','action'=>'success']);
            (new \App\Models\Log)->storeLog($message->subject,' مشاهده  سوال ارتباط با ما ','دیگر ');
        }else{
            $this->dispatchBrowserEvent('hide-deleteContact',['message'=> 'مشکلی وجود دارد','action'=>'error']);
            (new \App\Models\Log)->storeLog($message->subject,' خطا در     مشاهده  سوال ارتباط با ما','دیگر');
        }

    }

    public function getInfo(Contactus $contact){
       $this->state = $contact->toArray();
       $this->dispatchBrowserEvent('show-contactus');
       $update = $contact->update([
        'seen'=> 'read',
       ]);
       if ($update) {
        (new \App\Models\Log)->storeLog($contact->subject,' مشاهده  سوال ارتباط با ما ','دیگر ');

    }else{
        (new \App\Models\Log)->storeLog($contact->subject,' خطا در     مشاهده  سوال ارتباط با ما','دیگر');

    }
    }
    public function render()
    {
        $this->authorize('contactus',Contactus::class);
        $messages = $this->messages;
        $allMessagesCount = Contactus::count();
        $unreadMessagesCount = Contactus::where('seen','unread')->count();
        $readMessagesCount = Contactus::where('seen','read')->count();
        return view('livewire.admin.messages.contactus.contact-list',
        ['messages'=>$messages,'allMessagesCount'=>$allMessagesCount,'unreadMessagesCount'=>$unreadMessagesCount,'readMessagesCount'=>$readMessagesCount])->layout('layouts.admin.app');
    }
}
