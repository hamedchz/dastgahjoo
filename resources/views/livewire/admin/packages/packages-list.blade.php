<div>
    <nav aria-label="خرده نان" class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index')}}">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">پکیج ها</li>
        </ol>
    </nav>
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-2">لیست پکیج ها</h4>
                            {{-- <button type="button" class="btn btn-danger mb-2 mr-2" style="float:left;margin-top:-37px;"><i class="fa fa-refresh"></i> سطل زباله</button> --}}
                            <button type="button" class="btn btn-success mb-2 mr-2" style="float:left;margin-top:-37px;" wire:click.prevent="addNew()" ><i class="fa fa-plus-square"></i> افزودن</button>
                            {{-- <button type="button" class="btn btn-primary mb-2 mr-2" style="float:left;margin-top:-37px;"><i class="fa fa-file-excel-o"></i> خروجی اکسل</button> --}}
                            <hr>
                            
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>نام</th>
                                        <th class="status-semat">قیمت</th>
                                        <th  class="status-semat">برچسب</th>
                                        <th  class="status-semat">مدت زمان</th>
                                        <th  class="status-semat">تعداد عکسها</th>
                                        <th class="status-semat"> ویدیو</th>

                                        <th  class="status-semat">تعداد بنر</th>
                                        <th  class="status-semat">  لوگو</th>
                                        <th  class="status-semat">تعداد مجصول</th>

                                        <th class="status-semat"> سایت</th>
                                        <th class="status-semat">تعداد فایل</th>
                                        <th class="status-semat"> وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($packages as $package)
                                    <tr class="justify-content-center align-items-center">
                                        <td>{{$package->title}}</td>
                                        <td class="status-semat">{{$package->price}}</td>
                                        <td class="status-semat">{{$package->label}}</td>
                                        <td class="status-semat">{{$package->duration}}</td>
                                        <td class="status-semat">{{$package->images}}</td>
                                        <td style="font-size:10px;" class="status-semat badge  p-3 {{$package->video == 'YES' ? 'badge-success': 'badge-danger'}}">{{$package->video == 'YES' ? 'دارد': 'ندارد'}}</td>
                                        <td class="status-semat">{{$package->banner}}</td>
                                        <td style="font-size:10px;" class="status-semat badge  p-3 {{$package->logo == 'YES' ? 'badge-success': 'badge-danger'}}">{{$package->logo == 'YES' ? 'دارد': 'ندارد'}}</td>
                                        {{-- <td class="status-semat">{{$package->video}}</td> --}}
                                        <td class="status-semat">{{$package->products}}</td>

                                        <td style="font-size:10px;" class="status-semat badge  p-3 {{$package->site == 'YES' ? 'badge-success': 'badge-danger'}}">{{$package->site == 'YES' ? 'دارد': 'ندارد'}}</td>
                                        <td class="status-semat">{{$package->file}}</td>
                                        <td style="font-size:10px;" class="status-semat badge  p-3 {{$package->isActive == 1 ? 'badge-success': 'badge-danger'}}">{{$package->isActive == 1 ? 'فعال': 'غیرفعال'}}</td>
                                        <td>
                                            {{-- <a href="" wire:click.prevent="editPackage({{$package}})" style="font-size:20px;"><i class="fa fa-percent" style="color:#0cf504;" title="اعمال تخفیف"></i></a> --}}
                                            <a href="" wire:click.prevent="editPackage({{$package}})" style="font-size:20px;"><i class="fa fa-edit" style="color:#04a9f5;"></i></a>
                                            <a href="" wire:click.prevent="removeConfirmation({{$package->id}})" style="font-size:20px;"><i class="fa fa-trash" style="color:#dc3545;"></i></a>
                                        </td>
                                        @empty
                                           <td align="center" colspan="13">اطلاعاتی وجود ندارد</td> 
                                        </tr>
                                        @endforelse
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
       
        </div><!-- Button trigger modal -->
        
    </div>
    @include('livewire.admin.packages.create')
    @include('livewire.admin.packages.delete')

    @push('styles')
    <link rel="stylesheet" href="{{asset('admin/css/default-assets/datatables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/default-assets/responsive.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/default-assets/buttons.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/default-assets/select.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/default-assets/notification.css')}}">
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
            window.addEventListener('closeNewPackage', event => {
                $('#addPackage').modal('hide')
                if(event.detail['action'] == 'success'){ 
                 toastr.success(event.detail.message,'عملیات موفق!')
                }else{
                 toastr.error(event.detail.message,'عملیات ناموفق!')
                }
            })
            window.addEventListener('hidePackageDelete', event => {
                $('#packageDelete').modal('hide')
                if(event.detail['action'] == 'success'){ 
                  toastr.success(event.detail.message,'عملیات موفق!')
                }else{
                  toastr.error(event.detail.message,'عملیات ناموفق!')
                }
            })
        })
            window.addEventListener('addNewPackage', event => {
                $('#addPackage').modal('show')

            })
            window.addEventListener('showPackageDelete', event => {
                $('#packageDelete').modal('show')

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
                 <script src="/admin/js/default-assets/notification-active.js"></script>
                 <script src="/admin/js/MaxLength.min.js"></script>
        
    @endpush
</div>
