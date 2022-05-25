<?php

namespace App\Http\Livewire\Admin\Messages\Tickets;

use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class TicketsList extends Component
{
    use WithPagination,AuthorizesRequests;

    public $paginationTheme = 'bootstrap';
    public $status;
    public $ticket;
    public $answer;
    public $ticketAnswer;
    public $removeId = null;

    public function filterMessagesByStatus($status = null){
        $this->resetPage();
        $this->status = $status;
    }
    public function changeStatus(Ticket $inq, $status){
        $update = $inq->update([
            'status' => $status
        ]);
        if ($update) {
         
            $this->dispatchBrowserEvent('editTicketStatus',['message' => 'وضعیت با موفقیت ویرایش شد', 'action' => 'success']);
            (new \App\Models\Log)->storeLog($inq->title,' ویرایش   تیکت ','ویرایش ');

        }else{
            
            $this->dispatchBrowserEvent('editTicketStatus',['message' => 'مشکلی وجود دارد', 'action' => 'error']);
            (new \App\Models\Log)->storeLog($inq->title,' خطا در  ویرایش  تیکت','ویرایش');

        }
    }
    public function editTicket(Ticket $tick){
        $this->answer = $tick->description;
        $this->ticket = $tick;
        $this->dispatchBrowserEvent('show-editticket');
    }
    public function resetInputAnswer(){
        $this->ticketAnswer = "";
    }

    public function updateTicket(){
        $validatedData = Validator::make(
            [
                'ticketAnswer'=> $this->ticketAnswer
            ],
            [ 'ticketAnswer' => 'required'],
            [
              'required' => 'این فیلد نمیتواند خالی باشد'
            ])->validate();
            $answer = DB::table('tickets')->insert([
                'title' => $this->ticket->title,
                'description' => $validatedData['ticketAnswer'],
                'status' => 'CLOSED',
                'user_id' => $this->ticket->user_id,
                'parent' => $this->ticket->id,
                'created_at' => Carbon::now()]);
               $update =  DB::table('tickets')->where('id',$this->ticket->id)->update([
                        'status' => 'CLOSED'
                ]);
                if ($answer && $update) {
                    $this->resetInputAnswer();
                    $this->resetValidation();
                    $this->dispatchBrowserEvent('hide-editticket',['message' => 'تیکت با موفقیت فرستاده شد', 'action' => 'success']);
                    (new \App\Models\Log)->storeLog($this->ticket->id,'ارسال تیکت ','ایجاد ');
        
                }else{
                    $this->resetInputAnswer();
                    $this->resetValidation();
                    $this->dispatchBrowserEvent('hide-editticket',['message' => 'مشکلی وجود دارد', 'action' => 'error']);
                    (new \App\Models\Log)->storeLog($this->ticket->id,' خطا در  ارسال تیکت  ','ایجاد');
        
                }
                
    }

    public function removeConfirmation($id){
        $this->removeId = $id;
        $this->dispatchBrowserEvent('show-deleteTicket');
    }

    public function removeTicket(){
        $ticket = Ticket::findOrFail($this->removeId);
        $delete = $ticket->delete();
        if ($delete) {
            $this->dispatchBrowserEvent('hide-deleteTicket',['message' => 'تیکت با موفقیت حذف شد', 'action' => 'success']);
            (new \App\Models\Log)->storeLog($ticket->id,'حذف تیکت ','حذف ');
        }else{
            $this->dispatchBrowserEvent('hide-deleteTicket',['message' => 'مشکلی وجود دارد', 'action' => 'error']);
            (new \App\Models\Log)->storeLog($ticket->id,' خطا در  حذف تیکت  ','حذف');
        }
    }

    public function getTicketsProperty(){
        return Ticket::with('user')->where('parent',0)->when($this->status,function($query,$status){
           return $query->where('status',$status);
        })->latest()->paginate(20);
    }
    public function render()
    {
        $this->authorize('tickets',Ticket::class);
        $messages  = $this->tickets;
        $numberAllMessages = Ticket::where('parent',0)->count();
        $numberReadMessages = Ticket::where('parent',0)->where('status','CLOSED')->count();
        $numberunReadMessages = Ticket::where('parent',0)->where('status','OPEN')->count();

        return view('livewire.admin.messages.tickets.tickets-list',[
        'messages' => $messages,
        'numberAllMessages' => $numberAllMessages ,
        'numberReadMessages' => $numberReadMessages ,
        'numberunReadMessages' => $numberunReadMessages
         ])->layout('layouts.admin.app');
    }
}
