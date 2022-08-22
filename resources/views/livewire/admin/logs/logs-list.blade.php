<div>
    <nav aria-label="خرده نان" class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">داده ها</li>
        </ol>
    </nav>
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 box-margin" wire:ignore>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-inline ">
                            <h4 class="card-title mb-2">گزارشات سیستمی</h4>
                            <div class="btn-group">
                               {{-- <button type="button" class="btn {{is_null($status) ? 'btn-secondary' : 'btn-light'}} " wire:click.prevent="filterLogsByStatus">
                                    <span class="mr-1">همه</span>
                                    <span class="badge badge-pill badge-info">{{$alllogs}}</span>
                                </button>
                                <button type="button" class="btn {{$status=='ایجاد' ? 'btn-secondary' : 'btn-light'}} "  wire:click.prevent="filterLogsByStatus('ایجاد')">
                                 <span class="mr-1">ایجاد</span>
                                 <span class="badge badge-pill badge-primary">{{$createlogs}}</span>
                                 </button>
                                <button type="button" class="btn {{$status=='حذف' ? 'btn-secondary' : 'btn-light'}} "  wire:click.prevent="filterLogsByStatus('حذف')">
                                 <span class="mr-1">حذف</span>
                                 <span class="badge badge-pill badge-success">{{$deletelogs}}</span>
                                 </button>
                                 <button type="button" class="btn {{$status=='ویرایش' ? 'btn-secondary' : 'btn-light'}} "  wire:click.prevent="filterLogsByStatus('ویرایش')">
                                <span class="mr-1">ویرایش</span>
                                <span class="badge badge-pill badge-success">{{$editlogs}}</span>
                                </button>
                                <button type="button" class="btn {{$status=='دیگر' ? 'btn-secondary' : 'btn-light'}} "  wire:click.prevent="filterLogsByStatus('دیگر')">
                                <span class="mr-1">دیگر</span>
                                <span class="badge badge-pill badge-success">{{$otherlogs}}</span>
                                </button>--}}
                            </div>
                        </div>
                            <hr>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>نام</th>
                                        <th>سمت</th>
                                        <th>آی پی</th>
                                        <th>توضیحات</th>
                                        <th>تاریخ و ساعت</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($logs as $log)
                                    <tr>
                                        <td>{{$log->user->name}}</td>
                                        <td>{{$log->user->roles[0]->description}}</td>
                                        <td>{{$log->ip}}</td>
                                        <td>{{$log->description}}</td>
                                        <td>{{$log->created_at}}</td>
                                        <td>
                                            <div class="badge {{$log->action_badge}}">{{$log->action}}</div>
                                        </td>
                                        @empty
                                        <td align="center" colspan="6" style="background-color:#e1e1e1;">داده ای وجود ندارد</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex align-items-center justify-content-center">
                             {{-- {{$logs->links()}}--}}
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div>
    </div>
</div>


@push('styles')
     <link rel="stylesheet" href="{{asset('admin/css/default-assets/datatables.bootstrap4.css')}}">
     <link rel="stylesheet" href="{{asset('admin/css/default-assets/responsive.bootstrap4.css')}}">
     <link rel="stylesheet" href="{{asset('admin/css/default-assets/buttons.bootstrap4.css')}}">
     <link rel="stylesheet" href="{{asset('admin/css/default-assets/select.bootstrap4.css')}}">
     <link rel="stylesheet" href="{{asset('admin/css/default-assets/notification.css')}}">

<style>

  
    @media only screen and (max-width: 683px){
    table.dataTable.dtr-inline.collapsed>tbody>tr[role=row]>td:first-child:before,
             table.dataTable.dtr-inline.collapsed>tbody>tr[role=row]>th:first-child:before {
                top: 70%;
                left: 90%;
                z-index: 100;       
        } 
        
        }

  

</style> 
@endpush
@push('scripts')

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