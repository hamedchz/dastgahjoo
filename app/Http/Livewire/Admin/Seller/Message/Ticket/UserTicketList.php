<?php

namespace App\Http\Livewire\Admin\Seller\Message\Ticket;

use App\Models\Setting;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use SoapClient;

class UserTicketList extends Component
{

    public $status;
    public $ticket;
    public $ticketAnswer = null;
    public $state = [];
    

    public function showTicket(Ticket $ticket){
        $answer = Ticket::where('parent',$ticket->id)->first();
        if($answer <> null){ 
        $this->ticketAnswer = $answer->description;
        }else{
            $this->ticketAnswer ='  تیکیت شما در حال بررسی است' ;
        }
        $this->ticket = $ticket->description;
        $this->dispatchBrowserEvent('show-ticketDetail');
    }

    public function newTicket(){
        $this->reset();
        $this->dispatchBrowserEvent('show-newTicket');

    }
    public function storeTicket(){
       
        $validatedData = Validator::make($this->state,
            [
                'title' => 'required',
                'description' => 'required'
            ],
            [
              'title.required' => 'این فیلد نمیتواند خالی باشد',
              'description.required' => 'این فیلد نمیتواند خالی باشد',
            ])->validate();
               $save = DB::table('tickets')->insert([
                    'user_id' => auth()->user()->id,
                    'title' => $this->state['title'],
                    'description' => $this->state['description'],
                    'parent' => 0,
                ]);
                
                $this->sendSmsCode(auth()->user()->mobile,$this->state['title'],auth()->user()->name);
                if ($save) {
                    $this->dispatchBrowserEvent('hide-newTicket',['message'=> 'تیکت با موفقیت فرستاده شد','action'=>'success']);
                    (new \App\Models\Log)->storeLog($this->state['title'],'تیکت جدید','ایجاد');
                }else{
                    $this->dispatchBrowserEvent('hide-newTicket',['message'=> 'مشکلی وجود دارد','action'=>'error']);
                    (new \App\Models\Log)->storeLog($this->state['title'],'خطا در تیکت جدید','ایجاد');
                }
        

           
    }
    public function sendSmsCode($mobile,$subject,$name)
    {
        $client = new SoapClient("http://188.0.240.110/class/sms/wsdlservice/server.php?wsdl");
        $user = Setting::where('name','user_panel_for_sms')->pluck('value')->first();
        $pass = Setting::where('name','password_panel_for_sms')->pluck('value')->first();
        $fromNum = Setting::where('name','lineNumber_panel_for_sms')->pluck('value')->first();
        $toNum = $mobile;
        $pattern_code = "fsomamzmde8q1dy";
        $input_data = array(
            "name" => $name,
            "subject" => $subject,
        );
        return $client ->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
    }
    public function render()
    {
        
        $messages = Ticket::where('user_id',auth()->user()->id)->where('parent',0)->latest()->paginate(21);
        return view('livewire.admin.seller.message.ticket.user-ticket-list',['messages' => $messages])->layout('layouts.admin.app');
    }
}
