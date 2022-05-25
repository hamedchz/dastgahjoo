
<div>
    <nav aria-label="خرده نان" class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">داشبورد</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.users')}}">لیست کاربران </a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست دسترسی ها  </li>
        </ol>
    </nav>
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-9 box-margin height-card">
                    <div class="card card-body">
                        <h4 class="card-title">دسترسی کاربر {{$currentUser->name}}</h4>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                      
                                            <th class="text-center">شماره</th>
                                            <th class="text-center">نوع دسترسی</th>
                                            <th class="text-center">عملیات</th>
    
                                        </tr>
                                    </thead>
    
                                    <tbody class="justify-content-center text-center">
                                  
                                        <?php $i=1; ?>
                                      @forelse($allPermissions as $per)
                                      @if(in_array($per->id,$currentUser->permissions()->pluck('permission_id')->toArray()))
                                      <tr>
                                          <td style="width: 37px;">{{$i}}</td>
                                         <td>{{$per->description}}</td>
                                         <td>
                                            <a href=""  wire:click.prevent="removeConfirmation({{$per->id}})" style="font-size:20px;"><i class="fa fa-trash" style="color:#dc3545;"></i></a>
                                         </td>
                                     </tr>
                                     <?php $i++; ?>
                                     @endif
                                     @empty
                                     <td align="center" colspan="2">دسترسی وجود ندارد</td>
                                     @endforelse
                                    </tbody>
                                  
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-12 col-lg-3 box-margin height-card">
                    <div class="card card-body">
                        <h4 class="card-title">دسترسی جدید  </h4>
                        <hr>
                   
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form wire:submit.prevent="addNew">
                                    <div class="form-group" wire:ignore>
                                        <label for="exampleInputEmail12">  نوع دسترسی:</label>
                                        <select class="js-example-basic-single form-control" multiple="multiple" name="" style="width: 100%;" >
                                            
                                            @foreach($allPermissions as $per)
                                            @if(!in_array($per->id,$currentUser->permissions()->pluck('permission_id')->toArray()))
                                            <option value="{{$per->id}}">{{$per->description}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-outline-success mb-2 mr-2" style="float:left;"><i class="fa fa-save"></i> ذخیره</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row-->
    
        </div>
    </div>
     @include('livewire.admin.users.permission.delete')
     {{-- @include('livewire.admin.users.permission.permissions') --}}
     {{-- @include('livewire.admin.users.permissions') --}}


</div>
@push('before-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            $('.js-example-basic-single').select2().on('change', function(){
                @this.set('state.permission_id', $(this).val())
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
        window.addEventListener('show-newPermission', event =>{
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

        window.addEventListener('hide-removePermission', event =>{
            $('#permissionDelete').modal('hide')
            if(event.detail['action'] == 'success'){ 
                toastr.success(event.detail.message,'عملیات موفق!')
            }else{
                 toastr.error(event.detail.message,'عملیات ناموفق!')
                }
        })
     
        })

        
        window.addEventListener('show-removePermission',event =>{
            $('#permissionDelete').modal('show')
        })
      
    </script>
        <script src="/admin/js/default-assets/jquery.datatables.min.js"></script>
        <script src="/admin/js/default-assets/datatables.bootstrap4.js"></script>
        <script src="/admin/js/default-assets/datatable-responsive.min.js"></script>
        <script src="/admin/js/default-assets/responsive.bootstrap4.min.js"></script>
        <script src="/admin/js/default-assets/datatable-button.min.js"></script>
        <script src="/admin/js/default-assets/button.bootstrap4.min.js"></script>
        <script src="/admin/js/default-assets/button.html5.min.js"></script>
        <script src="/admin/js/default-assets/button.flash.min.js"></script>
        <script src="/admin/js/default-assets/datatables.keytable.min.js"></script>
        <script src="/admin/js/default-assets/datatables.select.min.js"></script>
        {{-- <script src="/admin/js/default-assets/demo.datatable-init.js"></script> --}}
        <script src="/admin/js/default-assets/bootstrap-growl.js"></script>
        <script src="/admin/js/default-assets/notification-active.js"></script>
    
@endpush