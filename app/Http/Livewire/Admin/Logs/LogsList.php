<?php

namespace App\Http\Livewire\Admin\Logs;

use App\Models\Log;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class LogsList extends Component
{
    use WithPagination,AuthorizesRequests;
    Protected $paginationTheme = 'bootstrap';
    public $status;

    public function filterLogsByStatus($status = null){
        $this->resetPage();
        $this->status = $status;
    }

    public function getLogsProperty(){
        return Log::with('user')->when($this->status, function($query,$action){
            return $query->where('action',$action);
        })->latest()->get();
    }

    public function render()
    {
        $this->authorize('system-logs',Log::class);
        $logs = $this->logs;
        $alllogs = Log::count();
        $editlogs = Log::where('action','ویرایش')->count();
        $otherlogs = Log::where('action','دیگر')->count();
        $deletelogs = Log::where('action','حذف')->count();
        $createlogs = Log::where('action','ایجاد')->count();
        return view('livewire.admin.logs.logs-list',
        [
            'logs'=> $logs,
            'alllogs'=> $alllogs,
            'editlogs'=> $editlogs,
            'otherlogs'=> $otherlogs,
            'deletelogs'=> $deletelogs,
            'createlogs'=> $createlogs
        ])->layout('layouts.admin.app');
    }
}
