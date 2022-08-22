<div>
    <nav aria-label="خرده نان" class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست پیامها  </li>
        </ol>
    </nav>
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 box-margin"  wire:ignore>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between ">
                            <h4 class="card-title mb-2">پیامها </h4>
                            <div class="btn-group">
                               {{-- <button type="button" class="btn {{is_null($status) ? 'btn-secondary' : 'btn-light'}} " wire:click.prevent="filterMessagesByStatus">
                                    <span class="mr-1">همه</span>
                                    <span class="badge badge-pill badge-info">{{$allMessagesCount}}</span>
                                </button>
                                <button type="button" class="btn {{$status=='read' ? 'btn-secondary' : 'btn-light'}} "  wire:click.prevent="filterMessagesByStatus('read')">
                                 <span class="mr-1">خوانده شده</span>
                                 <span class="badge badge-pill badge-primary">{{$readMessagesCount}}</span>
                                 </button>
                                 <button type="button" class="btn {{$status=='unread' ? 'btn-secondary' : 'btn-light'}} "  wire:click.prevent="filterMessagesByStatus('unread')">
                                    <span class="mr-1">خوانده نشده</span>
                                    <span class="badge badge-pill badge-primary">{{$unreadMessagesCount}}</span>
                                    </button>--}}
                            </div>
                        </div>
                      
                            <hr>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th class="status-semat">نام</th>
                                        <th id="see-msg1">#</th>
                                         <th class="status-semat">موبایل</th>
                                        <th>موضوع</th>
                                        <th>وضعیت</th>
                                        <th class="status-semat">
                                            {{--<span wire:click="sortBy('id')" class="text-sm" style="cursor: pointer;">
                                                <i class="fa fa-arrow-up  {{ $sortColumnName === 'id' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                                <i class="fa fa-arrow-down  {{ $sortColumnName === 'id' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                            </span>--}}
                                            تاریخ
                                            
                                        </th>
                                        <th id="see-msg2">#</th>
                                        <th id="see4">عملیات</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($messages as $msg)
                                    <tr>
                                        <td class="status-semat">{{$msg->name}}</td>
                                           <td id="see-msg1">
                                            <a href="" wire:click.prevent="getInfo({{$msg}})" class="btn btn-success" style="font-size:10px;">متن پیام</a>
                                            <a href=""  wire:click.prevent="removeConfirmation({{$msg->id}})" style="font-size:20px;"><i class="fa fa-trash" style="color:#dc3545;"></i></a>
                                        </td>
                                        <td class="status-semat">{{$msg->mobile}}</td>
                                        <td>{{$msg->subject}}</td>
                                        <td style="font-size:8px;" class="badge  p-1 {{ $msg->seen == 'read' ? 'badge-success': 'badge-danger'}}">{{$msg->seen == 'read' ? 'خوانده شده': 'خوانده نشده'}}</td>
                                        <td class="status-semat">
                                            {{$msg->created_at}}
                                        </td>
                                        <td id="see-msg2">
                                            <a href="" wire:click.prevent="getInfo({{$msg}})" class="btn btn-success" style="font-size:10px;">متن پیام</a>
                                        </td>
                                        <td id="see4">
                                            <a href=""  wire:click.prevent="removeConfirmation({{$msg->id}})" style="font-size:20px;"><i class="fa fa-trash" style="color:#dc3545;"></i></a>
                                        </td>
                                        @empty
                                        <td align="center" colspan="7" style="background-color:#e1e1e1;">داده ای وجود ندارد</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex align-items-center justify-content-center">
                              {{-- {{$messages->links()}}--}}
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        </div>
    </div>
     @include('livewire.admin.messages.contactus.answer')
     @include('livewire.admin.messages.contactus.delete')
</div>
@push('styles')
     <link rel="stylesheet" href="{{asset('admin/css/default-assets/datatables.bootstrap4.css')}}">
     <link rel="stylesheet" href="{{asset('admin/css/default-assets/responsive.bootstrap4.css')}}">
     <link rel="stylesheet" href="{{asset('admin/css/default-assets/buttons.bootstrap4.css')}}">
     <link rel="stylesheet" href="{{asset('admin/css/default-assets/select.bootstrap4.css')}}">
     <link rel="stylesheet" href="{{asset('admin/css/default-assets/notification.css')}}">

<style>

  
        
     
           #see-msg1{
        display:none;
        }
        
          
        
    @media only screen and (max-width: 514px){
    table.dataTable.dtr-inline.collapsed>tbody>tr[role=row]>td:first-child:before,
             table.dataTable.dtr-inline.collapsed>tbody>tr[role=row]>th:first-child:before {
                top: 70%;
                left: 90%;
                z-index: 100;       
        } 
        
        
        #see-msg1{
        display:block;
        }
        
          #see-msg2{
        display:none;
        }
     
       
             #see4{
        display:none;
        }
      table.dataTable>tbody>tr.child ul.dtr-details>li:last-child,
      table.dataTable>tbody>tr.child ul.dtr-details>li:nth-last-child(2)
   {
      display:none;
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
            window.addEventListener('hide-deleteContact', event =>{
            $('#deleteContact').modal('hide')
            if(event.detail['action'] == 'success'){ 
                toastr.success(event.detail.message,'عملیات موفق!')
            }else{
                 toastr.error(event.detail.message,'عملیات ناموفق!')
                }
        })
      
        })
        window.addEventListener('show-contactus', event =>{
            $('#contactusInfo').modal('show')
        })
        window.addEventListener('show-deleteContact', event =>{
            $('#deleteContact').modal('show')
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