<div>
    <nav aria-label="خرده نان" class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">داشبورد</a></li>
            <li class="breadcrumb-item"><a href="{{route('user.products')}}">لیست محصولات</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش محصول </li>
        </ol>
    </nav>
    
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                        <div class="d-flex justify-content-between ">
                            <h4 class="card-title mb-2"> ویرایش محصول </h4>
                        </div>
                            <hr>
                            <form action="" wire:submit.prevent="update" method="post"  enctype="multipart/form-data">
                              @csrf
                            <div class="row">
                               
                                <div class="form-group col-md-6">
                                    <label for="category">دسته بندی</label>
                                    <select class="custom-select" id="category" wire:model.defer="state.category_id" wire:change.defer = "changeCategory(event.target.value)">
                                        @forelse($categories as $category)
                                        <option value="{{$category->id}}" {{$product->category_id == $category->id ?'selected':''}}>{{$category->title}}</option>
                                        @empty
                                        <option>دسته بندی وجود ندارد</option>
                                        @endforelse
                                    </select>
                                    @error('category')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                    
                                <div class="form-group col-md-6">
                                  <label for="subcategory"> زیر دسته بندی</label>
                                  <select class="custom-select" wire:model.defer="state.subcategory_id">
                                    @if($subcategories <> null)
                                      
                                      @forelse($subcategories as $category)
                                      <option value="{{$category->id}}" id="subcategory" {{$product->subcategory_id == $category->id ?'selected':''}}>{{$category->title}}</option>
                                      @empty
                                      <option value="">زیر دسته بندی وجود ندارد</option>
                                      @endforelse
                                    @endif
                                </select>
                                 @error('subcategory')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="slug">نام دستگاه</label>
                                  <input type="text" name="name" wire:model.defer="state.name" value="{{$product->name}}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="نام دستگاه" oninput="removeError('#name')">
                                  @error('name')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="quantity"> تعداد</label>
                                    <input type="number" wire:model.defer="state.quantity"  class="form-control @error('quantity') is-invalid @enderror" id="quantity" oninput="removeError('#quantity')">
                                    @error('quantity')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="year_of_manufacture"> سال ساخت</label>
                                    <input type="text" wire:model.defer="state.year_of_manufacture" value="{{$product->year_of_manufacture}}" class="form-control @error('year_of_manufacture') is-invalid @enderror" id="year_of_manufacture" placeholder="سال ساخت " oninput="removeError('#year_of_manufacture')">
                                    @error('year_of_manufacture')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="price"> قیمت</label>
                                    <input type="text" wire:model.defer="state.price" value="{{$product->price}}"  class="form-control @error('price') is-invalid @enderror" id="price" placeholder="قیمت " oninput="removeError('#price')">
                                    @error('price')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="manufacturer"> شرکت سازنده</label>
                                    <input type="text"  wire:model.defer="state.manufacturer" value="{{$product->manufacturer}}"  class="form-control @error('manufacturer') is-invalid @enderror" id="manufacturer" placeholder="شرکت سازنده " oninput="removeError('#manufacturer')">
                                    @error('manufacturer')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="model"> نام مدل</label>
                                    <input type="text" wire:model.defer="state.model" value="{{$product->model}}" class="form-control @error('model') is-invalid @enderror" id="model" placeholder=" نام مدل " oninput="removeError('#model')">
                                    @error('model')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="type_of_machine"> نوع ماشین</label>
                                    <input type="text" wire:model.defer="state.type_of_machine" value="{{$product->type_of_machine}}" class="form-control @error('type_of_machine') is-invalid @enderror" id="type_of_machine" placeholder=" نام مدل " oninput="removeError('#type_of_machine')">
                                    @error('type_of_machine')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="isStock">نوع کالا</label>
                                    <select class="custom-select" id="isStock" wire:model.defer="state.isStock">
                                      
                                      <option value="1" {{$product->isStock == 1 ?'selected':''}}>نو</option>
                                      <option value="2" {{$product->isStock == 2 ?'selected':''}}>دست دوم</option>
                                  </select>                                  
                                    @error('isStock')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="isInstallments">امکان اقساط وجود دارد</label>
                                    <select class="custom-select" id="isInstallments"  wire:model.defer="state.isInstallments">
                                      
                                      <option value="0" {{$product->isInstallments == 0 ?'selected':''}}>خیر</option>
                                      <option value="1" {{$product->isInstallments == 1 ?'selected':''}}>بله </option>
                                  </select>                                  
                                    @error('isInstallments')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="isSold">وضعیت فروش</label>
                                    <select class="custom-select" id="isSold"  wire:model.defer="state.isSold">
                                      <option value="0" {{$product->isSold == 0 ?'selected':''}}>فروشی </option>
                                      <option value="1" {{$product->isSold == 1 ?'selected':''}}>فروخته شده</option>
                                  </select>                                  
                                    @error('isSold')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="location"> موقعیت</label>
                                    <input type="text" wire:model.defer="state.location" value="{{$product->location}}" class="form-control @error('location') is-invalid @enderror" id="location" placeholder=" موقعیت  " oninput="removeError('#location')">
                                    @error('location')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                @if(auth()->user()->vendor->package->packageHistories->site == 'YES')
                                <div class="form-group col-md-6">
                                  <label for="site_url"> آدرس سایت</label>
                                  <input type="text" wire:model.defer="state.site_url" value="{{$product->site_url}}" class="form-control @error('site_url') is-invalid @enderror" id="site_url" placeholder=" آدرس سایت  ">
                                  @error('site_url')<div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>
                              @endif
                                <div class="form-group col-md-12" wire:ignore>
                                    <label for="description"> توضیحات </label>
                                    <textarea class="form-control" id="description" rows="15" cols="15" wire:model.defer="state.description" data-description="@this">{!! $product->site_url !!}</textarea>    
                                   @error('description')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                              
                                  <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success">ذخیره</button>
                                  </div>
                              </div>
                              </form>
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
    
    {{-- @include('livewire.admin.product.create') --}}
    
    @push('scripts')
    <script>
      function removeError(par){
        console.log(par)
        const name = document.querySelector(par)
        name.addEventListener('input',(e)=>{
        name.classList.remove('is-invalid')
      })
      }
    
    </script>
    <script src="{{asset("admin/ckeditor5/ckeditor.js")}}"></script>
    <script>
       
  
         $(document).ready(function(){
          ClassicEditor
            .create( document.querySelector( '#description' ) )
            .then( editor => {
              
                editor.model.document.on('change:data', () => {
                    let description = $('#description').data('description');
                    
                    eval(description).set('state.description', editor.getData())
                })
              })
            .catch( error => {
                console.error( error );
            } );
            $('#category').on('change', function(){
                @this.set('state.category', $(this).val())
            });
            $('#subcategory').on('change', function(){
                @this.set('state.subcategory', $(this).val())
            });
            $('#isStock').on('change', function(){
                @this.set('state.isStock', $(this).val())
            });
            $('#isInstallments').on('change', function(){
                @this.set('state.isInstallments', $(this).val())
            });
            $('#isSold').on('change', function(){
                @this.set('state.isSold', $(this).val())
            });
                 toastr.options ={
                    
                     "progressBar": true,
                     "positionClass": "toast-bottom-right",
                
                 }
                 window.addEventListener('addProduct', event => {
                     
                     if(event.detail['action'] == 'success'){ 
                      toastr.success(event.detail.message,'عملیات موفق!')
                     }else{
                      toastr.error(event.detail.message,'عملیات ناموفق!')
                     }
                 })
                 
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