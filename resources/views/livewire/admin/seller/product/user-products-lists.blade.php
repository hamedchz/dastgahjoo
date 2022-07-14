<div>
    <nav aria-label="خرده نان" class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست محصولات</li>
        </ol>
    </nav>
    
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between ">
                            <h4 class="card-title mb-2">لیست محصولات</h4>
                            @if(Carbon\Carbon::now() < App\Models\PackageHistory::where('user_id',auth()->user()->id)->where('package_id',auth()->user()->vendor->package->id)->first()->endDate &&  App\Models\Product::whereBetween('created_at',[App\Models\PackageHistory::where('user_id',auth()->user()->id)->where('package_id',auth()->user()->vendor->package->id)->first()->startDate,App\Models\PackageHistory::where('user_id',auth()->user()->id)->where('package_id',auth()->user()->vendor->package->id)->first()->endDate])->count() <= App\Models\PackageHistory::where('user_id',auth()->user()->id)->where('package_id',auth()->user()->vendor->package->id)->first()->products)
                            <a href="{{route('user.addProduct')}}" class="btn btn-success mb-2 mr-2" style="float:left;"><i class="fa fa-plus-square"></i> افزودن</a>
                            @endif
                        </div>
                            <hr>
                           
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>نام دستگاه</th>
                                        <th>وضعیت</th>
                                        <th>#</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($products as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                   
                                        <td>
                                            <select class="form-control" disabled >
                                                <option  {{$product->status == 'pending' ? 'selected':''}}>در حال بررسی</option>
                                                <option {{$product->status == 'verified' ? 'selected':''}}>تایید شده</option>
                                                <option {{$product->status == 'rejected' ? 'selected':''}}>موافقت نشده</option>

                                            </select>
                                           
                                        </td>
                                        <td>
                                            <a href="" wire:click.prevent="moreInformationModal({{$product}})" class="btn btn-success" style="font-size:10px;">اطلاعات بیشتر</a>
                                        </td>
                                        <td>
                                            {{-- @if (auth()->user()->vendor->package->packageHistories->video = 'YES')
                                            <a href="{{route('user.editProductvideo',$product->id)}}" style="font-size:20px;"><i class="fa fa-camera"  style="color:#dd1717;" title="ویدیو"></i></a>
                                            @endif
                                            @if (auth()->user()->vendor->package->packageHistories->logo = 'YES')
                                            <a href="{{route('user.editProductLogo',$product->id)}}" style="font-size:20px;"><i class="fa fa-image"  style="color:#279623;" title="لوگو"></i></a>
                                            @endif --}}
                                            {{-- <a href="{{route('user.editProductImage',$product->id)}}" style="font-size:20px;"><i class="fa fa-image"  style="color:#000000;" title="انتخاب عکس کاور"></i></a> --}}
                                            <a href="{{route('user.editProduct',$product->id)}}"  style="font-size:20px;"><i class="fa fa-edit"  style="color:#0468aa;"  title="ویرایش"></i></a>
                                           {{-- <a href="" style="font-size:20px;"><i class="fa fa-trash" style="color:#dc3545;"  title="حذف"></i></a>--}}
                                            </td>
                                        @empty
                                        <td align="center" colspan="4" style="background-color:#e1e1e1;">داده ای وجود ندارد</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex align-items-center justify-content-center">
                               {{-- {{$products->links()}} --}}
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div>
    </div>
    {{-- @include('livewire.admin.product.delete') --}}
    @if($products->count()>0)
    @include('livewire.admin.seller.product.show')
    @endif
    @push('scripts')
    <script>
         $(document).ready(function(){
                 toastr.options ={
                    
                     "progressBar": true,
                     "positionClass": "toast-bottom-right",
                
                 }
                 window.addEventListener('editproductstatus', event => {
                     
                     if(event.detail['action'] == 'success'){ 
                      toastr.success(event.detail.message,'عملیات موفق!')
                     }else{
                      toastr.error(event.detail.message,'عملیات ناموفق!')
                     }
                 })
             
            })
            window.addEventListener('informationModal', event => {
                   $('#infoModal').modal('show')
            })
            window.addEventListener('show-productDelete', event => {
                   $('#productDelete').modal('show')
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
    @endpush
</div>