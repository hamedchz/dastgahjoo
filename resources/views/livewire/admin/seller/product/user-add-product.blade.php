<div>
    <nav aria-label="خرده نان" class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">داشبورد</a></li>
            <li class="breadcrumb-item"><a href="{{route('user.products')}}">لیست محصولات</a></li>
            <li class="breadcrumb-item active" aria-current="page">محصول جدید</li>
        </ol>
    </nav>
    
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                        <div class="d-flex justify-content-between ">
                            <h4 class="card-title mb-2"> محصول جدید</h4>
                        </div>
                            <hr>
                            <form action="" wire:submit.prevent="addNew" method="post"  enctype="multipart/form-data">
                              @csrf
                            <div class="row">
                               
                                <div class="form-group col-md-6">
                                    <label for="category">دسته بندی</label>
                                    <select class="custom-select @error('category_id') is-invalid @enderror" id="category" wire:model.defer="state.category_id" wire:change.defer = "changeCategory(event.target.value)">
                                        <option selected>انتخاب کنید</option>
                                        @forelse($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                        @empty
                                        <option>دسته بندی وجود ندارد</option>
                                        @endforelse
                                    </select>
                                    @error('category_id')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                    
                                <div class="form-group col-md-6">
                                  <label for="subcategory"> زیر دسته بندی</label>
                                  <select class="custom-select" id="subcategory" wire:model.defer="state.subcategory_id">
                                    <option  value="0" selected>انتخاب کنید</option>
                                    @if($subCategory <> null)
                                      @forelse($subCategory as $category)
                                      <option value="{{$category->id}}">{{$category->title}}</option>
                                      @empty
                                      <option value="">زیر دسته بندی وجود ندارد</option>
                                      @endforelse
                                    @endif
                                </select>
                                 @error('subcategory_id')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="slug">نام دستگاه</label>
                                  <input type="text" name="name" wire:model.defer="state.name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="نام دستگاه" oninput="removeError('#name')">
                                  @error('name')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                             
                                <div class="form-group col-md-6">
                                    <label for="quantity"> تعداد</label>
                                    <input type="number" wire:model.defer="state.quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" placeholder="تعداد " oninput="removeError('#quantity')">
                                    @error('quantity')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="year_of_manufacture"> سال ساخت</label>
                                    <input type="text" wire:model.defer="state.year_of_manufacture" class="form-control @error('year_of_manufacture') is-invalid @enderror" id="year_of_manufacture" placeholder="سال ساخت " oninput="removeError('#year_of_manufacture')">
                                    @error('year_of_manufacture')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="price"> قیمت</label>
                                    <input type="text" wire:model.defer="state.price"  class="form-control @error('price') is-invalid @enderror" id="price" placeholder="قیمت " oninput="removeError('#price')">
                                    @error('price')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="manufacturer"> شرکت سازنده</label>
                                    <input type="text"  wire:model.defer="state.manufacturer" class="form-control @error('manufacturer') is-invalid @enderror" id="manufacturer" placeholder="شرکت سازنده " oninput="removeError('#manufacturer')">
                                    @error('manufacturer')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="model"> نام مدل</label>
                                    <input type="text" wire:model.defer="state.model" class="form-control @error('model') is-invalid @enderror" id="model" placeholder=" نام مدل " oninput="removeError('#model')">
                                    @error('model')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="type_of_machine"> نوع ماشین</label>
                                    <input type="text" wire:model.defer="state.type_of_machine" class="form-control @error('type_of_machine') is-invalid @enderror" id="type_of_machine" placeholder=" نوع ماشین  " oninput="removeError('#type_of_machine')">
                                    @error('type_of_machine')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="isStock">نوع کالا</label>
                                    <select class="custom-select" id="isStock">
                                      
                                      <option value="1" selected>نو</option>
                                      <option value="2">دست دوم</option>
                                  </select>                                  
                                    @error('isStock')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="isInstallments">امکان اقساط وجود دارد</label>
                                    <select class="custom-select" id="isInstallments">
                                    
                                      <option value="0" selected>خیر</option>
                                      <option value="1">بله </option>
                                  </select>                                  
                                    @error('isInstallments')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="isSold">وضعیت فروش</label>
                                    <select class="custom-select" id="isSold">
                                      
                                      <option value="0" selected>فروشی </option>
                                      <option value="1">فروخته شده</option>
                                  </select>                                  
                                    @error('isSold')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="location"> موقعیت دستگاه</label>
                                    <input type="text" wire:model.defer="state.location" class="form-control @error('location') is-invalid @enderror" id="location" placeholder=" موقعیت دستگاه  " oninput="removeError('#location')">
                                    @error('location')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                @if($vendor->package->packageHistories->site == 'YES')
                                <div class="form-group col-md-6">
                                  <label for="site_url"> آدرس سایت</label>
                                  <input type="text" wire:model.defer="state.site_url" class="form-control @error('site_url') is-invalid @enderror" id="site_url" placeholder=" آدرس سایت  " oninput="removeError('#site_url')">
                                  @error('site_url')<div class="invalid-feedback">{{ $message }}</div> @enderror
                              </div>
                              @endif
                                <div class="form-group col-lg-12 col-md-12">
                                  <label for="image">عکس  :(شما مجاز به آپلود {{$vendor->package->packageHistories->images}} عکس هستید)</label>
                                  <div class="input-group cust-file-button mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control  @error('image') is-invalid @enderror" id="f_p_v_up1" multiple wire:model.defer="state.image">
                                        <label class="custom-file-label" for="inputGroupFile03">عکس محصولات </label>
                                      </div>
                                </div>
                                <div class="filearray row mt-5 justify-content-center align-items-center" wire:ignore></div>
                                {{-- @error('image')<div class="text-danger">{{ $message }}</div> @enderror
                                <div class="col-md-12 mt-2">
                                  @if ($state->image)
                                    <div class="mt-5 justify-content-center align-items-center">
                                    @foreach ($state->image as $ph)
                                    <img src="{{ $ph->temporaryUrl() }}"  class='pr-2 mb-1 shadow mr-3' style='width:70px;height:70px;' >
                                    @endforeach
                                    </div>
                                  @endif
                                </div> --}}
                                </div>
                                @if($vendor->package->packageHistories->logo == 'YES')
                                <div class="form-group col-lg-12 col-md-12">
                                  <label for="logo">لوگو </label>
                                  <div class="input-group cust-file-button mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control  @error('logo') is-invalid @enderror" id="inputGroupFile03" wire:model.defer="logo">
                                        <label class="custom-file-label" for="inputGroupFile03">عکس لوگو </label>
                                      </div>
                                </div>
                                @error('logo')<div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                @endif
                                @if($vendor->package->packageHistories->video == 'YES')
                                <div class="form-group col-lg-12 col-md-12">
                                  <label for="video">ویدیو  :</label>
                                  <div class="input-group cust-file-button mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control  @error('video') is-invalid @enderror" id="inputGroupFile03" wire:model.defer="video">
                                        <label class="custom-file-label" for="inputGroupFile03"> ویدیو </label>
                                      </div>
                                </div>
                                @error('video')<div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                
                                @endif
                                <div class="form-group col-md-12" wire:ignore>
                                    <label for="description"> توضیحات </label>
                                    <textarea class="form-control" id="description" rows="15" cols="15" wire:model.defer="state.description" data-description="@this"></textarea>    
                                   @error('description')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                              
                                  <div class="form-group col-md-12">
                                    @if($errors->any())
                                    <div class="alert alert-danger text-right" role="alert" id="fieldError" style="text-align:right !important;width:100%;color:#721c24;background-color:#f8d7da;border-color:#f5c6cb;">
                                      لطفا فیلدها را کنترل کنید
                                    </div>
                                    <script>
                                      const errorField = document.querySelector('#fieldError')
                                      setTimeout(() => {
                                        errorField.classList.add('d-none')
                                      }, 3000);
                                    </script>
                                    @endif
                                    <button type="submit" class="btn btn-success" wire:loading.class="d-none">ثبت</button>
                                    <div class="la-ball-beat la-dark la-sm " wire:loading  style="float:right;">
                                      <div></div>
                                      <div></div>
                                      <div></div>
                                  </div>

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
    @push('styles')
        <style>
          .la-ball-beat,
    .la-ball-beat > div {
        position: relative;
        -webkit-box-sizing: border-box;
          -moz-box-sizing: border-box;
                box-sizing: border-box;
    }
    .la-ball-beat {
        display: block;
        font-size: 0;
        color: #fff;
    }
    .la-ball-beat.la-dark {
        color: #333;
    }
    .la-ball-beat > div {
        display: inline-block;
        float: none;
        background-color: currentColor;
        border: 0 solid currentColor;
    }
    .la-ball-beat {
        width: 54px;
        height: 18px;
    }
    .la-ball-beat > div {
        width: 10px;
        height: 10px;
        margin: 4px;
        border-radius: 100%;
        -webkit-animation: ball-beat .7s -.15s infinite linear;
          -moz-animation: ball-beat .7s -.15s infinite linear;
            -o-animation: ball-beat .7s -.15s infinite linear;
                animation: ball-beat .7s -.15s infinite linear;
    }
    .la-ball-beat > div:nth-child(2n-1) {
        -webkit-animation-delay: -.5s;
          -moz-animation-delay: -.5s;
            -o-animation-delay: -.5s;
                animation-delay: -.5s;
    }
    .la-ball-beat.la-sm {
        width: 26px;
        height: 8px;
    }
    .la-ball-beat.la-sm > div {
        width: 4px;
        height: 4px;
        margin: 2px;
    }
    .la-ball-beat.la-2x {
        width: 108px;
        height: 36px;
    }
    .la-ball-beat.la-2x > div {
        width: 20px;
        height: 20px;
        margin: 8px;
    }
    .la-ball-beat.la-3x {
        width: 162px;
        height: 54px;
    }
    .la-ball-beat.la-3x > div {
        width: 30px;
        height: 30px;
        margin: 12px;
    }
    /*
    * Animation
    */
    @-webkit-keyframes ball-beat {
        50% {
            opacity: .2;
            -webkit-transform: scale(.75);
                    transform: scale(.75);
        }
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
                    transform: scale(1);
        }
    }
    @-moz-keyframes ball-beat {
        50% {
            opacity: .2;
            -moz-transform: scale(.75);
                transform: scale(.75);
        }
        100% {
            opacity: 1;
            -moz-transform: scale(1);
                transform: scale(1);
        }
    }
    @-o-keyframes ball-beat {
        50% {
            opacity: .2;
            -o-transform: scale(.75);
              transform: scale(.75);
        }
        100% {
            opacity: 1;
            -o-transform: scale(1);
              transform: scale(1);
        }
    }
    @keyframes ball-beat {
        50% {
            opacity: .2;
            -webkit-transform: scale(.75);
              -moz-transform: scale(.75);
                -o-transform: scale(.75);
                    transform: scale(.75);
        }
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
              -moz-transform: scale(1);
                -o-transform: scale(1);
                    transform: scale(1);
        }
    }
        </style>
    @endpush
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
        $(document).on('ready',()=>{
        $("#f_p_v_up1").on('change',function(){

            $(".filearray").empty();//you can remove this code if you want previous user input
            for(let i=0;i<this.files.length;++i){
                let filereader = new FileReader();
                let $img=jQuery.parseHTML("<img src='' class='pr-2 mt-2 shadow' style='width:200px;height:200px;' >");
                filereader.onload = function(){
                    $img[0].src=this.result;
                };
                filereader.readAsDataURL(this.files[i]);
                $(".filearray").append($img);
            }


        });
    });
    </script>
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
                @this.set('state.subcategory_id', $(this).val())
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