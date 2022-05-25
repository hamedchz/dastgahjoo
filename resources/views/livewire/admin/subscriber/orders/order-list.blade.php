<div>
    <nav aria-label="خرده نان" class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">  لیست سفارشات</li>
        </ol>
    </nav>
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-2"> لیست  سفارشات</h4>
                            {{-- <button type="button" class="btn btn-danger mb-2 mr-2" style="float:left;margin-top:-37px;"><i class="fa fa-refresh"></i> سطل زباله</button> --}}
                            {{-- <button type="button" class="btn btn-success mb-2 mr-2" style="float:left;margin-top:-37px;" wire:click.prevent="addNew()" ><i class="fa fa-plus-square"></i> افزودن</button> --}}
                            {{-- <button type="button" class="btn btn-primary mb-2 mr-2" style="float:left;margin-top:-37px;"><i class="fa fa-file-excel-o"></i> خروجی اکسل</button> --}}

                            <hr>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th> آیدی سفارش</th>
                                     
                                        <th>    وضعیت پرداخت</th>
                                        <th>    وضعیت ارسال</th>
                                        <th>  مبلغ سفارش</th>
                                      
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                       
                                        <td >
                                           
                                            @switch($order->status)
                                                @case('PAID')
                                                    <div class="badge badge-success">پرداخت شده </div>
                                                    @break
                                                @case('UNPAID')
                                                <div class="badge badge-warning">در انتظار پرداخت</div>
                                                    @break
                                                @case('CANCELED')
                                                <div class="badge badge-danger">کنسل شده </div>
                                                @break   
                                                @default
                                                    
                                            @endswitch
                                            {{-- <span class="pr-5"><a href="{{route('admin.cities',$prov->id)}}" class="badge badge-success p-1" style="font-size:10px;" >لیست </a></span> --}}
                                        </td>
                                        <td >
                                            <select class="form-select form-select-sm form-control" aria-label=".form-select-sm example" disabled >
                                                
                                                <option value="DELIVERED" {{$order->delivery == 'DELIVERED' ? 'selected': ''}}>تحویل شده</option>
                                                <option value="UNDELIVERED" {{$order->delivery == 'UNDELIVERED' ? 'selected': ''}}>در حال پردازش</option>
                                               
                                              </select>
                                            
                                            {{-- <span class="pr-5"><a href="{{route('admin.cities',$prov->id)}}" class="badge badge-success p-1" style="font-size:10px;" >لیست </a></span> --}}
                                        </td>
                                        <td>{{$order->price}}</td>
                                        <td>
                                            {{-- <a href=""  style="font-size:20px;"><i class="fa fa-edit"  style="color:#04a9f5;"></i></a> --}}
                                            {{-- <a href="" wire:click.prevent="removeConfirmation({{$order->id}})" style="font-size:20px;"><i class="fa fa-trash" style="color:#dc3545;"></i></a> --}}
                                         </td>
                                        @empty
                                        <td align="center" colspan="4" style="background-color:#e1e1e1;">داده ای وجود ندارد</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex align-items-center justify-content-center">
                               {{-- {{$orders->links()}} --}}
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div>
    </div>
    {{-- @include('livewire.admin.location.province.create') --}}
    {{-- @include('livewire.admin.orders.delete') --}}

</div>
@push('styles')
<link rel="stylesheet" href="{{asset('admin/css/default-assets/datatables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('admin/css/default-assets/responsive.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('admin/css/default-assets/buttons.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('admin/css/default-assets/select.bootstrap4.css')}}">
{{-- <link rel="stylesheet" href="{{asset('admin/css/default-assets/notification.css')}}"> --}}
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
            window.addEventListener('hideDeliveryStatus', event => {
                if(event.detail['action'] == 'success'){ 
                 toastr.success(event.detail.message,'عملیات موفق!')
                }else{
                 toastr.error(event.detail.message,'عملیات ناموفق!')
                }
            })
            window.addEventListener('hideorderDelete', event => {
                $('#orderDelete').modal('hide')
                if(event.detail['action'] == 'success'){ 
                  toastr.success(event.detail.message,'عملیات موفق!')
                }else{
                  toastr.error(event.detail.message,'عملیات ناموفق!')
                }
            })
        })
        window.addEventListener('show-addProvince' , event =>{
            $('#addProvince').modal('show')
        })
        window.addEventListener('showOrderDelete' , event =>{
            $('#orderDelete').modal('show')
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
         {{-- <script src="/admin/js/MaxLength.min.js"></script> --}}
    
@endpush