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
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between ">
                            <h4 class="card-title mb-2">گزارشات سیستمی</h4>
                            <div class="btn-group">
                                <button type="button" class="btn {{is_null($status) ? 'btn-secondary' : 'btn-light'}} " wire:click.prevent="filterLogsByStatus">
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
                                </button>
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
                               {{$logs->links()}}
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div>
    </div>
</div>