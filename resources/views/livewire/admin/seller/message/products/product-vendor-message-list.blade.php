<div>
    <nav aria-label="خرده نان" class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست پرسش محصولات </li>
        </ol>
    </nav>
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between ">
                            <h4 class="card-title mb-2">پرسش محصولات</h4>
                            {{-- <div class="btn-group">
                                <button type="button" class="btn {{is_null($status) ? 'btn-secondary' : 'btn-light'}} " wire:click.prevent="filterMessagesByStatus">
                                    <span class="mr-1">همه</span>
                                    <span class="badge badge-pill badge-info">{{$numberAllMessages}}</span>
                                </button>
                                <button type="button" class="btn {{$status=='read' ? 'btn-secondary' : 'btn-light'}} "  wire:click.prevent="filterMessagesByStatus('read')">
                                 <span class="mr-1">خوانده شده</span>
                                 <span class="badge badge-pill badge-primary">{{$numberReadMessages}}</span>
                                 </button>
                                 <button type="button" class="btn {{$status=='unread' ? 'btn-secondary' : 'btn-light'}} "  wire:click.prevent="filterMessagesByStatus('unread')">
                                    <span class="mr-1">خوانده نشده</span>
                                    <span class="badge badge-pill badge-primary">{{$numberunReadMessages}}</span>
                                    </button> --}}
                            </div>
                        </div>
                        
                            <hr>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th >فرستنده</th>
                                        <th>محصول</th>
                                        <th >عنوان</th>
                                        <th>موضوع</th>
                                        <th>متن پیام</th>
                                        <th>شماره محصول</th>
                                        <th >وضعیت</th>
                                        <th >تاریخ </th>
                                       
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($messages as $msg)
                                    <tr>
                                        <td >{{$msg->user->name}}</td>
                                        <td >{{$msg->products->name}}</td>
                                        <td >{{$msg->title}}</td>
                                        <td>
                                          
                                            @if($msg->isPrice == 1)
                                            <div class="badge badge-primary">  قیمت  </div>
                                            @endif
                                            @if($msg->morePhotos == 1)
                                            <div class="badge badge-info"> عکس </div>
                                            @endif
                                            @if($msg->moreInformation == 1)
                                            <div class="badge badge-danger"> اطلاعات </div>
                                            @endif
                                            @if($msg->offer == 1)
                                            <div class="badge badge-warning">  تخفیف </div>
                                            @endif 
                                        </td>
                                        <td>{{$msg->comment}}</td>
                                        <td>{{$msg->products->itemNo}}</td>
                                        <td >
                                            <select class="form-control form-select form-select-sm" aria-label=".form-select-sm example" wire:change="changeStatus({{$msg}},event.target.value)" >
                                                
                                                <option value="OPEN" {{$msg->status == 'OPEN' ? 'selected': ''}}>باز</option>
                                                <option value="CLOSED" {{$msg->status == 'CLOSED' ? 'selected': ''}}>بسته</option>
                                                <option value="PENDING" {{$msg->status == 'PENDING' ? 'selected': ''}}>در حال بررسی فنی</option>
                                                <option value="SUSPENDED" {{$msg->status == 'SUSPENDED' ? 'selected': ''}}> معلق</option>
                                            
                                              </select>
                                        
                                        </td>
                                        <td >{{$msg->created_at}}</td>
                               
                                        {{-- <td>
                                            <a href="" class="bg-success p-1 text-white" wire:click.prevent="showMessage({{$msg->id}})" style="font-size:10px;"> متن پیام</a>
                                        </td> --}}
                                        @empty
                                        <td align="center" colspan="7" style="background-color:#e1e1e1;">داده ای وجود ندارد</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex align-items-center justify-content-center">
                               {{-- {{$messages->links()}} --}}
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div>
    </div>
    {{-- @include('livewire.admin.seller.message.products.list.show') --}}
    {{-- @include('livewire.admin.messages.products.delete') --}}

</div>
@push('styles')
<style>
    @media only screen and (max-width: 767px){
   .status-semat{
       display: none !important;
   }
}

</style>
@endpush
@push('scripts')
    <script>
        
        $(document).ready(function(){
            toastr.options ={
               
               "progressBar": true,
               "positionClass": "toast-bottom-right",
          
           }
            window.addEventListener('hide-editproductMessage', event =>{
            $('#editproductMessage').modal('hide')
            if(event.detail['action'] == 'success'){ 
                toastr.success(event.detail.message,'عملیات موفق!')
            }else{
                 toastr.error(event.detail.message,'عملیات ناموفق!')
                }
        })
        window.addEventListener('hide-removeProductMessage', event =>{
            $('#deleteProductMessage').modal('hide')
            if(event.detail['action'] == 'success'){ 
                toastr.success(event.detail.message,'عملیات موفق!')
            }else{
                 toastr.error(event.detail.message,'عملیات ناموفق!')
                }
        })
        window.addEventListener('editproductStatus', event =>{
            
            if(event.detail['action'] == 'success'){ 
                toastr.success(event.detail.message,'عملیات موفق!')
            }else{
                 toastr.error(event.detail.message,'عملیات ناموفق!')
                }
        })
        
        })
        window.addEventListener('show-message', event =>{
            $('#showMessageProduct').modal('show')
        })
        window.addEventListener('show-deleteProductMsg', event =>{
            $('#deleteProductMessage').modal('show')
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
<script src="/admin/js/default-assets/button.print.min.js"></script>
 <script src="/admin/js/default-assets/datatables.keytable.min.js"></script> 
 <script src="/admin/js/default-assets/datatables.select.min.js"></script> 
 <script src="/admin/js/default-assets/demo.datatable-init.js"></script> 
<script src="/admin/js/default-assets/bootstrap-growl.js"></script>
<script src="/admin/js/default-assets/notification-active.js"></script>
@endpush