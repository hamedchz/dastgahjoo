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
                            {{-- <div class="row btn-group">
                                <div class="col-md-3 col-lg-3">
                                <button type="button" class="btn  btn-secondary" wire:click.prevent="filterLogsByStatus">
                                    <span class="mr-1">همه</span>
                                    <span class="badge badge-pill badge-info">f</span>
                                </button>
                              </div>
                              <div class="col-md-3 col-lg-3 mt-1 d-block">
                                <button type="button" class="btn   btn-secondary"  wire:click.prevent="filterLogsByStatus('ایجاد')">
                                 <span class="mr-1">ایجاد</span>
                                 <span class="badge badge-pill badge-primary">f</span>
                                 </button>
                                </div>
                                 <div class="col-md-3 col-lg-3 mt-1">
                                <button type="button" class="btn   btn-secondary"  wire:click.prevent="filterLogsByStatus('حذف')">
                                 <span class="mr-1">حذف</span>
                                 <span class="badge badge-pill badge-success">f</span>
                                 </button>
                                </div>
                            </div> --}}
                        </div>
                            <hr>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>دسته بندی</th>
                                        <th> نام محصول</th>
                                        <th>سازنده</th>
                                        <th>وضعیت</th>
                                        <th>#</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($products as $product)
                                    <tr>
                                        <td>{{$product->category->title}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->manufacturer}}</td>
                                        <td>
                                            <select class="form-control @error('value') is-invalid @enderror"" wire:change.defer = "changeStatus({{$product->id}},event.target.value)">
                                                <option value="pending" {{$product->status == 'pending' ? 'selected':''}} >در حال بررسی</option>
                                                <option value="verified" {{$product->status == 'verified' ? 'selected':''}}>تایید شده</option>
                                                <option value="rejected" {{$product->status == 'rejected' ? 'selected':''}}>موافقت نشده</option>

                                            </select>
                                            @error('value')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </td>
                                        <td>
                                            <a href="" wire:click.prevent = "getInformation({{$product->id}})" class="btn btn-success" style="font-size:10px;">اطلاعات بیشتر</a>
                                        </td>
                                        <td>
                                            {{-- <a href="" wire:click.prevent="showImage({{$product->id}})" style="font-size:20px;"><i class="fa fa-image"  style="color:#e1e1e1;"></i></a> --}}
                                            <a href="" wire:click.prevent="removalConfirmation({{$product->id}})" style="font-size:20px;"><i class="fa fa-trash" style="color:#dc3545;"></i></a>
                                            </td>
                                        @empty
                                        <td align="center" colspan="6" style="background-color:#e1e1e1;">داده ای وجود ندارد</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex align-items-center justify-content-center">
                               {{$products->links()}}
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div>
    </div>
    @include('livewire.admin.product.delete')
    @include('livewire.admin.product.info')
    @include('livewire.admin.product.showImage') 
    
    @push('scripts')
    <script src="{{asset("admin/ckeditor5/ckeditor.js")}}"></script>

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
                 window.addEventListener('hide-productDelete', event => {
                     $('#productDelete').modal('hide')
                     if(event.detail['action'] == 'success'){ 
                      toastr.success(event.detail.message,'عملیات موفق!')
                     }else{
                      toastr.error(event.detail.message,'عملیات ناموفق!')
                     }
                 })
            })
               window.addEventListener('show-productInformation', event => {
                   
                 $('#productInfos').modal('show')
            })
            window.addEventListener('show-productDelete', event => {
                   $('#productDelete').modal('show')
            })
            window.addEventListener('show-productImages', event => {
                   $('#productShowImage').modal('show')
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
    {{-- <script src="/admin/js/default-assets/notification-active.js"></script> --}}
    
    @endpush

</div>