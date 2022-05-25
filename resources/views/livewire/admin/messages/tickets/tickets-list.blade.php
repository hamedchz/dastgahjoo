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
                            <div class="btn-group">
                                {{-- <button type="button" class="btn {{is_null($status) ? 'btn-secondary' : 'btn-light'}} " wire:click.prevent="filterMessagesByStatus">
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
                                        <th class="status-semat">فرستنده</th>
                                        <th>عنوان</th>
                                       
                                        <th class="status-semat">وضعیت</th>
                                        <th class="status-semat">تاریخ </th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($messages as $msg)
                                    <tr>
                                        <td class="status-semat">{{$msg->user->name}}</td>
                                        <td>{{$msg->title}}</td>
                                        <td class="status-semat">
                                            <select class="form-control form-select form-select-sm" aria-label=".form-select-sm example" wire:change="changeStatus({{$msg}},event.target.value)">
                                                
                                                <option value="OPEN" {{$msg->status == 'OPEN' ? 'selected': ''}}>باز</option>
                                                <option value="CLOSED" {{$msg->status == 'CLOSED' ? 'selected': ''}}>بسته</option>
                                                <option value="PENDING" {{$msg->status == 'PENDING' ? 'selected': ''}}>در حال بررسی فنی</option>
                                                <option value="SUSPENDED" {{$msg->status == 'SUSPENDED' ? 'selected': ''}}> معلق</option>
                                            
                                              </select>
                                        </td>
                                        <td class="status-semat">{{$msg->created_at}}</td>
                               
                                        <td>
                                            @if($msg->status !== 'CLOSED')
                                            <a href="" wire:click.prevent="editTicket({{$msg}})" style="font-size:20px;"><i class="fa fa-edit"  style="color:#04a9f5;"></i></a>
                                            @else
                                            <span  style="font-size:20px;"><i class="fa fa-edit"  style="color:#e1e1e1;"></i></span>

                                            @endif
                                            <a href=""  wire:click.prevent="removeConfirmation({{$msg->id}})" style="font-size:20px;"><i class="fa fa-trash" style="color:#dc3545;"></i></a>
                                        </td>
                                        @empty
                                        <td align="center" colspan="5" style="background-color:#e1e1e1;">داده ای وجود ندارد</td>
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
     @include('livewire.admin.messages.tickets.answer')
     @include('livewire.admin.messages.tickets.delete')
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
            window.addEventListener('hide-editticket', event =>{
            $('#editTicketMessage').modal('hide')
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
        window.addEventListener('editTicketStatus', event =>{
            if(event.detail['action'] == 'success'){ 
                toastr.success(event.detail.message,'عملیات موفق!')
            }else{
                 toastr.error(event.detail.message,'عملیات ناموفق!')
                }
        })
        
        })
        window.addEventListener('show-editticket', event =>{
            $('#editTicketMessage').modal('show')
        })
        window.addEventListener('show-deleteTicket', event =>{
            $('#deleteTicket').modal('show')
        })
    </script>
@endpush