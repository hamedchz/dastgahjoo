<?php

namespace App\Http\Livewire\Admin\Users\Permission;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PermissionsList extends Component
{
    use AuthorizesRequests;
    
    public $permissions;
    public $currentUser;
    public $removeId=null;
    public $state =[];

    public function mount($id){
        $user_access= User::with('permissions')->where('id',$id)->first();
        $this->currentUser = $user_access;
        
    }
    
    public function addNew(){
       
        foreach ($this->state['permission_id'] as $value) {
            DB::table('permission_user')->insert([
                'permission_id' => $value,
                'user_id' => $this->currentUser['id']
            ]);  
        (new \App\Models\Log)->storeLog($this->currentUser['id'],'اضافه کردن دسترسی به کاربر','ایجاد ');
         }
        $this->dispatchBrowserEvent('show-newPermission',['message' => 'دسترسی با موفقیت اضافه شد','action'=>'success']);
        return redirect()->to('dashboard/users/'.$this->currentUser['id']);

    }
    public function removeConfirmation($id){
        $this->removeId = $id;
        $this->dispatchBrowserEvent('show-removePermission');
    }
    public function removePermission(){
        $delete = DB::table('permission_user')->where('user_id','=',$this->currentUser['id'])->where('permission_id','=',$this->removeId)->delete();
        if ($delete) {
            (new \App\Models\Log)->storeLog($this->currentUser['id'],'حذف کردن دسترسی به کاربر','حذف ');
            $this->dispatchBrowserEvent('hide-removePermission',['message' => 'دسترسی با موفقیت حذف شد','action'=>'success']);
            }else{
                (new \App\Models\Log)->storeLog($this->currentUser['id'],'خطا در حذف کردن دسترسی به کاربر','حذف ');
            $this->dispatchBrowserEvent('hide-removePermission',['message' => 'مشکلی وجود دارد','action'=>'error']);
            }
            return redirect()->to('dashboard/users/'.$this->currentUser['id']);

    }
    public function render()
    {
        $this->authorize('roles',Permission::class);
        $allPermissions = Permission::where('isActive',1)->get();
        return view('livewire.admin.users.permission.permissions-list',['allPermissions'=>$allPermissions])->layout('layouts.admin.app');
    }
}
