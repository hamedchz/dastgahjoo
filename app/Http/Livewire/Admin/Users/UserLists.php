<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\Vendors;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator as ValidationValidator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class UserLists extends Component
{
    use WithPagination,WithFileUploads,AuthorizesRequests;

    protected $paginationTheme = 'bootstrap';
    public $status;
    public $sortColumnName = 'created_at';
    public $columnDirection = 'desc';
    public $searchTerm = null;
    public $removeId= null;
    public $user;
    public $vendor;
    public $photo;
    public $permissions;
    public $selectUser = false;
    public $state =[];
    public $editStatus = false;

    public function newAdmin(){
        $this->reset();
        $this->dispatchBrowserEvent('show-newAdmin');
    }
    public function resetNewAdminInput(){
        $this->state['name'] = "";
        $this->state['password'] = "";
        $this->state['mobile'] = "";
        $this->state['password_confirmation'] = "";
        $this->state['permission_id'] = "";

    }
    public function adminStore(){
        $validatedData = Validator::make($this->state,[
            'name'=>'required',
            'mobile' => ['required', 'numeric', 'unique:users'],
            'password' => ['required', 'required_with:password_confirmation','same:password_confirmation','min:8'],
            ],[
            'name.required' => 'این فیلد نمیتواند خالی باشد',
            'mobile.required' => 'این فیلد نمیتواند خالی باشد',
            'password.required' => 'این فیلد نمیتواند خالی باشد',
            'mobile.unique'  => 'این شماره قبلا استفاده شده',
            'password.min'      => 'حداقل کلمه عبور 8 کاراکتر است',
            'password.same' => 'کلمه عبور تطابق ندارد',
            'password.required_with' => 'این فیلد نمیتواند خالی باشد',
        ])->validate();
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['isAdmin'] = 1;
        $validatedData['mobile_verified_at'] = Carbon::now();
        $validatedData['avatar'] = 'N/A';
        $store =  User::create($validatedData);
        $role = DB::table('role_user')->insert([
            'user_id' => $store->id,
            'role_id'=> 1
        ]);
        foreach ($this->state['permission_id'] as $value) {
            DB::table('permission_user')->insert([
                'permission_id' => $value,
                'user_id' => $store->id
            ]);  
         }
        
        if($store && $role){
            (new \App\Models\Log)->storeLog($validatedData['name'],'ادمین جدید','ایجاد');
            $this->dispatchBrowserEvent('hide-newAdmin',['message'=>'ادمین با موفقیت ذخیره شد', 'action'=>'success']);
            $this->resetNewAdminInput();
        }else{
            (new \App\Models\Log)->storeLog($validatedData['name'],'خطا ایجاد ادمین جدید','ایجاد');
            $this->dispatchBrowserEvent('hide-newAdmin',['message'=>'مشکلی وجود دارد', 'action'=>'error']);
            $this->resetNewAdminInput();
        }


    }
    public function editAdmin(User $user){
        $this->editStatus = true;
        $this->user = $user;
        $this->state = $user->toArray();
        $this->dispatchBrowserEvent('show-newAdmin');
    }

    public function updateAdmin(){
        $validatedData = Validator::make($this->state,[
            'name'=> 'required',
            'mobile'=> 'required|numeric|unique:users,mobile,'.$this->user->id,
            'password'=> 'sometimes',
            
            ],[
            'name.required' => 'این فیلد نمیتواند خالی باشد',
            'mobile.required' => 'این فیلد نمیتواند خالی باشد',
            'mobile.unique'  => 'این شماره قبلا استفاده شده',
            'password.min'      => 'حداقل کلمه عبور 8 کاراکتر است',
            'password.required_with' => 'این فیلد نمیتواند خالی باشد',

        ])->validate();
        if(!empty($validatedData['password'])){
            $validatedData['password'] = bcrypt($validatedData['password']);
        }
        $update = $this->user->update($validatedData);
        if($update){
            (new \App\Models\Log)->storeLog($validatedData['name'],'ویرایش ادمین ','ویرایش');
            $this->dispatchBrowserEvent('hide-newAdmin',['message'=>'ادمین با موفقیت ویرایش شد', 'action'=>'success']);
            $this->resetNewAdminInput();
        }else{
            (new \App\Models\Log)->storeLog($validatedData['name'],'خطا ویرایش ادمین','ویرایش');
            $this->dispatchBrowserEvent('hide-newAdmin',['message'=>'مشکلی وجود دارد', 'action'=>'error']);
            $this->resetNewAdminInput();
        }
     }

    public function edit(User $user){
        
        // $this->user = $user;
        $this->selectUser = true;
        $user_access= User::with('roles')->where('id',$user->id)->first();
        $role = Role::where('roles.id', $user_access['roles'][0]['pivot']->role_id)
        ->with('permissions')
        ->get();
        $this->permissions = $role;
        $this->dispatchBrowserEvent('show-userPermissions');
    }
    public function removalConfirmation($id){
        $this->removeId = $id;
        $this->dispatchBrowserEvent('show-userDelete');
    }

    public function removeUser(){
        $user = User::findOrFail($this->removeId);
        $vendor = Vendors::where('user_id',$this->removeId)->first();
        if($vendor !== null){
            $vendor->delete();
        }
        $delete = $user->delete();
        DB::table('role_user')->where('user_id',$this->removeId)->delete();
        if($delete){
            (new \App\Models\Log)->storeLog($user->id,'حذف  کاربر','حذف');
            $this->dispatchBrowserEvent('hide-userDelete',['message'=>'  کاربر با موفقیت حذف شد', 'action'=>'success']);
        }else{
            (new \App\Models\Log)->storeLog($user->id,'خطا  حذف کاربر','حذف');
            $this->dispatchBrowserEvent('hide-userDelete',['message'=>'مشکلی وجود دارد', 'action'=>'error']);

        }
    }

    public function filterByName($status = null){
        $this->resetPage();
        $this->status = $status;
    }
    public function getRolesProperty(){
        // return User::with('roles')->when($this->status,function($query,$status){
        //     return $query->where('id',$status);
        // })->where('name','Like','%'.$this->searchTerm.'%')
        // ->orWhere('mobile','Like','%'.$this->searchTerm.'%')
        // ->orWhere('email','Like','%'.$this->searchTerm.'%')->paginate(21);
        
        return Role::with('users')->whereHas('users',function($q){
            $q->where('name','Like','%'.$this->searchTerm.'%')
            ->orWhere('mobile','Like','%'.$this->searchTerm.'%')
            ->orWhere('email','Like','%'.$this->searchTerm.'%');
        })->when($this->status,function($query,$status){
            return $query->where('id',$status);
        })->orderBy('id','desc')->paginate(21); 
    }
    public function changeRole(User $user,$role){
        $update =  $user->roles[0]['pivot']->update(['role_id'=>$role]);
        if($update){
            (new \App\Models\Log)->storeLog($user->id,'  تغییر نقش کاربر ','ویرایش ');
            $this->dispatchBrowserEvent('editUserStatus',['message'=>' نقش کاربر با موفقیت ویرایش شد', 'action'=>'success']);
        }else{
            (new \App\Models\Log)->storeLog($user->id,'   خطا تغییر نقش کاربر ','ویرایش ');
            $this->dispatchBrowserEvent('editUserStatus',['message'=>'مشکلی وجود دارد', 'action'=>'error']);

        }
    }

    public function changeApproved(Vendors $vendor,$value){
        $update = $vendor->update([
            'isApproved' => $value
        ]);
        if($update){
            (new \App\Models\Log)->storeLog($vendor->id,'  تغییر وضعیت کاربر ','ویرایش ');
            $this->dispatchBrowserEvent('editUserStatus',['message'=>'کاربر با موفقیت ویرایش شد', 'action'=>'success']);
        }else{
            (new \App\Models\Log)->storeLog($$vendor->id,'   خطا تغییر وضعیت کاربر ','ویرایش ');
            $this->dispatchBrowserEvent('editUserStatus',['message'=>'مشکلی وجود دارد', 'action'=>'error']);

        }
    }
    public function changeStatus(User $user,$value){
         Validator::make(
            ['value'=>$value],
            ['value'=>
                        'required',
                        Rule::in(0,1)
            ],[
                'value.required' => 'این فیلد نمیتواند خالی باشد',
                'value.in' => 'اطلاعات این فیلد اشتباه است',
        
            ])->validate();
           $update =  $user->update([
                'isActive' => $value
            ]);

            if($update){
                (new \App\Models\Log)->storeLog($user->id,'  تغییر وضعیت کاربر ','ویرایش ');
                $this->dispatchBrowserEvent('editUserStatus',['message'=>'کاربر با موفقیت ویرایش شد', 'action'=>'success']);
            }else{
                (new \App\Models\Log)->storeLog($user->id,'   خطا تغییر وضعیت کاربر ','ویرایش ');
                $this->dispatchBrowserEvent('editUserStatus',['message'=>'مشکلی وجود دارد', 'action'=>'error']);

            }
    }
    public function updatedSearchTerm(){
        $this->resetPage();
    }
    public function sortBy($columnName){
        
        if($this->sortColumnName === $columnName){
            $this->columnDirection = $this->swapColumn();
        }else{
            $this->columnDirection = 'asc';
        }
        $this->sortColumnName = $columnName;
        

    }
    public function swapColumn(){
        return $this->columnDirection === 'asc' ? 'desc': 'asc';
        
    }
    public function render()
    {
        $this->authorize('users',User::class);
        $allPermissions = Permission::where('isActive',1)->get();
        $users = $this->roles;
        
        $roles = DB::table('roles')->selectRaw('roles.id, roles.name, count(role_user.user_id) as count')
        ->leftjoin('role_user', 'roles.id', '=', 'role_user.role_id')
        ->groupByRaw('roles.id,roles.name')->orderBy('id','desc')
        ->get();
        $userRoles = Role::all();
        return view('livewire.admin.users.user-lists',['allPermissions'=>$allPermissions,'users' => $users,'userRoles'=>$userRoles,'roles'=>$roles])->layout('layouts.admin.app');
    }
}
