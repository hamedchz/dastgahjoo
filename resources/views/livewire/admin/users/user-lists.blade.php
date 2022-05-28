
<div>
  
    <nav aria-label="خرده نان" class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست کاربران  </li>
        </ol>
    </nav>
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row" style="display: flex;align-items: center;justify-content: space-around;">
                                <h4 class="card-title mb-2">کاربران </h4>
                                <button type="button" class="btn btn-success " style="float:left;"  wire:click.prevent="newAdmin">
                                    <i class="fa fa-plus-square"></i> ادمین جدید</button>

                            </div>
                            <hr>
                            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-6">
                                        <div class="dt-buttons">
                                        <button class="btn  {{is_null($status) ? 'btn-secondary' : 'btn-light'}} my-1"  wire:click.prevent="filterByName" tabindex="0" aria-controls="datatable-buttons" type="button">
                                            <span>همه</span>
                                            <span class="badge badge-pill badge-info">
                                                {{$roles->sum('count')}}
                                           </span>
                                        </button> 
                                     @foreach ($userRoles as $role)
                                        <button class="btn {{$status == $role->id ? 'btn-secondary' : 'btn-light'}}  my-1" wire:click.prevent="filterByName({{$role->id}})" tabindex="0" aria-controls="datatable-buttons" type="button">
                                             <span>{{$role->description}}</span>
                                             <span class="badge badge-pill badge-primary">
                                                @foreach($roles as $ro)
                                                    @if($ro->id == $role->id)
                                                        {{$ro->count}}
                                                    @endif
                                                @endforeach
                                            </span>
                                        </button> 
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <x-search-input  wire:model="searchTerm"/>
                                </div>
                    </div>
               <div class="row">
              <div class="col-sm-12">
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 242px;">
                </table>
            </div>
            </div>
            <div class="row">
                        <div class="col-sm-12 col-md-7">
           <div class="dataTables_paginate paging_simple_numbers" id="datatable-buttons_paginate">
            </div>
                </div>
                </div>
                </div>
                              <div class="container mt-3">
                                <div class="table-responsive">          
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th class="account" scope="col">کاربر</th>
                                                <th class="semat" scope="col">سمت</th>
                                                <th class="mobile" scope="col">موبایل</th>
                                                <th class="accept" scope="col"> احراز هویت</th>
                                                <th class="email-semat" scope="col">تایید</th>
                                                <th class="status-semat " scope="col">وضعیت</th>
                                                <th class="amaliat" scope="col">عملیات</th>
                                                 </tr>
                                        </thead>
                                      
                                        <tbody>
                                            @foreach($users as $user)
                                            @foreach($user->users as $us)
                                            <tr>
                                                <td class="account">{{$us->name}}</td>
                                                <td class="semat">  
                                                 <select class="form-control" wire:change = "changeRole({{$us}},event.target.value)" disabled>
                                                    @foreach($userRoles as $role)
                                                    <option value="{{$role->id}}" {{$us['pivot']->role_id == $role->id ? 'selected':''}} >{{$role->description}}</option>
                                                    @endforeach
                                                </select>
                                                </td>
                                                <td class="mobile">{{$us->mobile}}</td>
                                                <td class="accept">
                                                    @if(is_null($us->mobile_verified_at))
                                                    <div class="badge badge-danger">تایید نشده</div>
                                                    @else
                                                    <div class="badge badge-success">تایید شده</div>
                                                    @endif
                                                </td>
                                                <td class="accept">
                                                    @if($user->name == 'seller')
                                                    <select class="form-control" wire:change = "changeApproved({{$us->vendor}},event.target.value)">
                                                        <option value="1" {{$us->vendor->isApproved == 1 ? 'selected':''}} >در حال بررسی</option>
                                                        <option value="2" {{$us->vendor->isApproved == 2 ? 'selected':''}}>تایید شده</option>
                                                        <option value="3" {{$us->vendor->isApproved == 3 ? 'selected':''}}>تایید نشده</option>

                                                    </select>
                                                    @endif
                                                </td>
                                                <td class="status-semat">
                                                    <select class="form-control" wire:change = "changeStatus({{$us}},event.target.value)">
                                                        <option value="1" {{$us->isActive == 1 ? 'selected':''}} >فعال</option>
                                                        <option value="0" {{$us->isActive == 0 ? 'selected':''}}>غیرفعال</option>
                                                    </select>
                                                </td>
                                                <td class="amaliat">
                                                    @if($us['pivot']->role_id == 1)
                                                    <a href=""  wire:click.prevent="editAdmin({{$us}})" style="font-size:20px;"><i class="fa fa-edit" style="color:#35addc;"></i></a>
                                                    <a href="{{route('admin.users-permissions',$us->id)}}"  style="font-size:20px;" title="سطح دسترسی کاربر"><i class="fa fa-user-secret"  style="color:#0cf504;"></i></a>
                                                    @else
                                                    <a href="#"  style="font-size:20px;"><i class="fa fa-edit" style="color:#e1e1e1;"></i></a>
                                                    <a href="#"  style="font-size:20px;" title="سطح دسترسی کاربر"><i class="fa fa-user-secret"  style="color:#e1e1e1;"></i></a>
                                                    @endif
                                                    {{-- @if($us['pivot']->role_id !== 1)
                                                    <a href="{{route('admin.users-permissions',$us->id)}}"  style="font-size:20px;" title="سطح دسترسی کاربر"><i class="fa fa-user-secret"  style="color:#0cf504;"></i></a>
                                                    @else
                                                    <a href="{{route('admin.users-permissions',$us->id)}}"  style="font-size:20px;" title="سطح دسترسی کاربر"><i class="fa fa-user-secret"  style="color:#0cf504;"></i></a>
                                                    @endif  --}}
                                                    <a href=""  wire:click.prevent="removalConfirmation({{$us->id}})" style="font-size:20px;"><i class="fa fa-trash" style="color:#dc3545;"></i></a>
                                                        </td>
                                            </tr>
                                            @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex align-items-center justify-content-center">
                                        {{$users->links()}}
                                     </div>
                                </div>
                              </div>



                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div>
    </div>

    @include('livewire.admin.users.delete')
    @include('livewire.admin.users.create')

     {{-- @include('livewire.admin.users.edit') --}}
     @include('livewire.admin.users.permissions')


</div>
@push('styles')
<style>
    @media only screen and (max-width: 767px){
        .status-semat{
            display: none;
        }

        .accept{
            display: none;
        }
        .email-semat{
            display: none;
        }
        .mobile{
            display: none;
        }
    }



    .breadcrumb-item::before {
        display: none !important;
    }
.breadcrumb-item::after {
    display: inline-block !important;
    padding-right: 0.5rem !important;
    color: #6c757d !important;
    content: "/" !important;
}

.breadcrumb-item:last-child::after {
  display: none !important;
}


</style>
@endpush
@push('before-styles')
<link rel="stylesheet" href="{{asset('admin/css/default-assets/datatables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('admin/css/default-assets/responsive.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('admin/css/default-assets/buttons.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('admin/css/default-assets/select.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('admin/css/default-assets/notification.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        //select2 in modal
        $('.js-example-basic-multiple').each( function() {
        $(this).val( $(this).find("option[selected]").val() );
    });
        //$(".js-example-basic-multiple").val([]).trigger("change.select2");
        $('body').on('shown.bs.modal', '.modal', function() {
        $(this).find('select').each(function() {
            var dropdownParent = $(document.body);
            if ($(this).parents('.modal.in:first').length !== 0)
            dropdownParent = $(this).parents('.modal.in:first');
            $(this).select2({
            dropdownParent: dropdownParent
            // ...
            });
        });
        });
 
        //////////////////////////////////
        $(document).ready(function(){
            $('.js-example-basic-multiple').select2({
                "dropdownParent": $('#userPermission'),
                theme:"bootstrap4"
            });
            $(document).on('change', '.js-example-basic-multiple',function(){
                @this.set('state.permission_id',$(this).val());
            });
            toastr.options ={
               
               "progressBar": true,
               "positionClass": "toast-bottom-right",
          
           }
            window.addEventListener('editUserStatus', event =>{
                $('#editUser').modal('hide')
            if(event.detail['action'] == 'success'){ 
                toastr.success(event.detail.message,'عملیات موفق!')
            }else{
                 toastr.error(event.detail.message,'عملیات ناموفق!')
                }
        })
        window.addEventListener('hide-userDelete', event =>{
            $('#userDelete').modal('hide')
            if(event.detail['action'] == 'success'){ 
                toastr.success(event.detail.message,'عملیات موفق!')
            }else{
                 toastr.error(event.detail.message,'عملیات ناموفق!')
                }
        })
        window.addEventListener('hide-newAdmin', event =>{
            $('#addNewAdmin').modal('hide')
            if(event.detail['action'] == 'success'){ 
                toastr.success(event.detail.message,'عملیات موفق!')
            }else{
                 toastr.error(event.detail.message,'عملیات ناموفق!')
                }
        })
     
        })
        
        window.addEventListener('show-userPermissions',event =>{
            $('#userPermission').modal('show')
        })
        window.addEventListener('show-userDelete',event =>{
            $('#userDelete').modal('show')
        })
        window.addEventListener('show-newAdmin',event =>{
            $('#addNewAdmin').modal('show')
        })
      
    </script>
        <!-- These plugins only need for the run this page -->

<script src="/admin/js/default-assets/jquery.datatables.min.js"></script>
<script src="/admin/js/default-assets/datatables.bootstrap4.js"></script>
<script src="/admin/js/default-assets/datatable-responsive.min.js"></script>
<script src="/admin/js/default-assets/responsive.bootstrap4.min.js"></script>
<script src="/admin/js/default-assets/datatable-button.min.js"></script>
<script src="/admin/js/default-assets/button.bootstrap4.min.js"></script>
<script src="/admin/js/default-assets/button.html5.min.js"></script>
<script src="/admin/js/default-assets/button.flash.min.js"></script>
<script src="/admin/js/default-assets/button.print.min.js"></script>
 <script src="/admin/js/default-assets/datatables.keytable.min.js"></script> 
 <script src="/admin/js/default-assets/datatables.select.min.js"></script> 
 <script src="/admin/js/default-assets/demo.datatable-init.js"></script> 
<script src="/admin/js/default-assets/bootstrap-growl.js"></script>
{{-- <script src="/admin/js/default-assets/notification-active.js"></script> --}}

@endpush