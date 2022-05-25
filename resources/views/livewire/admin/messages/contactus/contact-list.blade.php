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
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between ">
                            <h4 class="card-title mb-2">پیامها </h4>
                            <div class="btn-group">
                                <button type="button" class="btn {{is_null($status) ? 'btn-secondary' : 'btn-light'}} " wire:click.prevent="filterMessagesByStatus">
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
                                    </button>
                            </div>
                        </div>
                      
                            <hr>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th class="status-semat">نام</th>
                                        <th class="status-semat">موبایل</th>
                                        <th>موضوع</th>
                                        <th class="status-semat">
                                            <span wire:click="sortBy('id')" class="text-sm" style="cursor: pointer;">
                                                <i class="fa fa-arrow-up  {{ $sortColumnName === 'id' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                                <i class="fa fa-arrow-down  {{ $sortColumnName === 'id' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                            </span>
                                            تاریخ
                                            
                                        </th>
                                        <th>#</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($messages as $msg)
                                    <tr>
                                        <td class="status-semat">{{$msg->name}}</td>
                                        <td class="status-semat">{{$msg->mobile}}</td>
                                        <td>{{$msg->subject}}</td>
                                        <td class="status-semat">
                                            {{$msg->created_at}}
        
                                        </td>
                                        <td>
                                            <a href="" wire:click.prevent="getInfo({{$msg}})" class="btn btn-success" style="font-size:10px;">متن پیام</a>
                                        </td>
                                        <td>
                                            <a href=""  wire:click.prevent="removeConfirmation({{$msg->id}})" style="font-size:20px;"><i class="fa fa-trash" style="color:#dc3545;"></i></a>
                                        </td>
                                        @empty
                                        <td align="center" colspan="6" style="background-color:#e1e1e1;">داده ای وجود ندارد</td>
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
     @include('livewire.admin.messages.contactus.answer')
     @include('livewire.admin.messages.contactus.delete')
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
@endpush