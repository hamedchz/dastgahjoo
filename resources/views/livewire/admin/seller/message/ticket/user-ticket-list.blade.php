<div>
    <nav aria-label="خرده نان" class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست تیکتها  </li>
        </ol>
    </nav>
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between ">
                            <h4 class="card-title mb-2">تیکتها </h4>
                            <button type="button" class="btn btn-success " style="float:left;"  wire:click.prevent="newTicket">
                                <i class="fa fa-plus-square"></i> تیکت جدید</button>

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
                                    </button>
                            </div> --}}
                        </div>
                      
                            <hr>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>عنوان</th>
                                        <th class="status-semat">وضعیت</th>
                                        <th class="status-semat">تاریخ </th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($messages as $msg)
                                    <tr>
                                        <td>{{$msg->title}}</td>
                                        <td class="status-semat">
                                            @switch($msg->status )
                                                @case('OPEN')
                                                <div class="badge badge-primary px-2">باز</div>
                                                    @break
                                                @case('CLOSED')
                                                <div class="badge badge-success px-2">بسته</div>
                 
                                                    @break
                                                @case('PENDING')
                                                <div class="badge badge-warning">در حال بررسی فنی</div>
                                              @break
                                                @case('SUSPENDED')
                                                <div class="badge badge-danger px-2">معلق</div>
                                                @break
                                                @default
                                                    
                                            @endswitch
                                            {{-- <select class="form-control form-select form-select-sm" aria-label=".form-select-sm example" disabled>
                                                <option value="OPEN" {{$msg->status == 'OPEN' ? 'selected': ''}}>باز</option>
                                                <option value="CLOSED" {{$msg->status == 'CLOSED' ? 'selected': ''}}>بسته</option>
                                                <option value="PENDING" {{$msg->status == 'PENDING' ? 'selected': ''}}>در حال بررسی فنی</option>
                                                <option value="SUSPENDED" {{$msg->status == 'SUSPENDED' ? 'selected': ''}}> معلق</option>
                                              </select> --}}
                                        </td>
                                        <td class="status-semat">{{$msg->created_at}}</td>
                                        <td>
                                            <a href="" class="bg-success p-1 text-white" wire:click.prevent="showTicket({{$msg}})" style="font-size:10px;">مشاهده</a>

                                        </td>
                                        @empty
                                        <td align="center" colspan="7" style="background-color:#e1e1e1;">داده ای وجود ندارد</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex align-items-center justify-content-center">
                               {{$messages->links()}}
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        </div>
    </div>
     @include('livewire.admin.seller.message.ticket.send')
     @include('livewire.admin.seller.message.ticket.delete')
     @include('livewire.admin.seller.message.ticket.show')

</div>
@push('styles')
<link rel="stylesheet" href="{{asset('admin/css/default-assets/datatables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('admin/css/default-assets/responsive.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('admin/css/default-assets/buttons.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('admin/css/default-assets/select.bootstrap4.css')}}">

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
            window.addEventListener('hide-newTicket', event =>{
            $('#newTicket').modal('hide')
            if(event.detail['action'] == 'success'){ 
                toastr.success(event.detail.message,'عملیات موفق!')
            }else{
                 toastr.error(event.detail.message,'عملیات ناموفق!')
                }
        })
        window.addEventListener('hide-deleteTicket', event =>{
            $('#deleteTicket').modal('hide')
            if(event.detail['action'] == 'success'){ 
                toastr.success(event.detail.message,'عملیات موفق!')
            }else{
                 toastr.error(event.detail.message,'عملیات ناموفق!')
                }
        })
        })
        window.addEventListener('show-ticketDetail', event =>{
            $('#showUserTicket').modal('show')
        })
        window.addEventListener('show-newTicket', event =>{
            $('#newTicket').modal('show')
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
@endpush