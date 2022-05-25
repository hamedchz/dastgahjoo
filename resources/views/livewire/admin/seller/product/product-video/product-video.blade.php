<div>
    @section('title', 'ویدیو  محصول ')
    <nav aria-label="خرده نان" class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">داشبورد</a></li>
            <li class="breadcrumb-item"><a href="{{route('user.products')}}">لیست محصولات</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویدیو محصول </li>
        </ol>
    </nav>
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-9 box-margin height-card">
                    <div class="card card-body">
                        <h4 class="card-title">ویدیو محصول</h4>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                @if (!is_null($images))
                                <div class="col-lg-3 col-md-3">
                                  <div class="card" style="width: 10rem;">
                                      {{-- <img class="card-img-top" src="{{asset('storage/videos/'.$images->video)}}" alt=""> --}}
                                      <video width="320" height="240" controls>
                                        <source src={{asset('storage/videos/'.$images->video)}}" type="video/mp4">
                                        <source src="{{asset('storage/videos/'.$images->video)}}" type="video/ogg">
                                        Your browser does not support the video tag.
                                      </video>
                                      <div class="card-body">
                                        <p class="card-text">
                                        
                                              <a href=""   wire:click.prevent="removeConfirmation({{$images->id}})"  style="font-size:20px;" class="mr-2"><i class="fa fa-trash" style="color:#dc3545;" title="حذف"></i></a>
                                        </p>
                                       
                                      </div>
                                    </div>                            
                                  
                                  </div>
                                @else
                                <div class="col-lg-12 col-md-12 d-flex justify-content-center align-text-center">
                                    <span>ویدیو وجود ندارد</span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if(is_null($images))
                <div class="col-12 col-lg-3 box-margin height-card">
                    <div class="card card-body">
                        <h4 class="card-title">ویدیو جدید</h4>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form wire:submit.prevent="imageStore">
                                 
                                    <div class="input-group cust-file-button mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control"   wire:model.defer="video">
                                            <label class="custom-file-label" for="f_p_v_up1"> ویدیو</label>
                                        </div>
                                        <div class="col-md-12"  wire:ignore>
                                            <div class="filearray  mt-5 justify-content-center align-items-center"></div>
                                            </div>
                                    </div>
                                
                                  
                                    <button type="submit" class="btn btn-outline-success mb-2 mr-2" style="float:left;" wire:loading.class="d-none"><i class="fa fa-save"></i> ذخیره</button>
                                    <div class="la-ball-beat la-dark la-sm " wire:loading  wire:target="video" style="float:left;">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <!-- end row-->

        </div>
    </div>
    {{-- @include('livewire.admin.cars.images.create') --}}
    @include('livewire.admin.seller.product.product-video.delete')

</div>
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
          $(document).ready(function(){
            $("#f_p_v_up1").on('change',function(){
                $(".filearray").empty();//you can remove this code if you want previous user input
                for(let i=0;i<this.files.length;++i){
                    let filereader = new FileReader();
                    let $img=jQuery.parseHTML("<img src='' class='pr-2 mb-1 shadow mr-3' style='width:70px;height:70px;' >");
                    filereader.onload = function(){
                        $img[0].src=this.result;
                    };
                    filereader.readAsDataURL(this.files[i]);
                    $(".filearray").append($img);
                }
                });
            toastr.options ={
               
                "progressBar": true,
                "positionClass": "toast-bottom-right",
           
            }
            window.addEventListener('selectCover', event => {
                
                if(event.detail['action'] == 'success'){ 
                 toastr.success(event.detail.message,'عملیات موفق !')
                }else{
                 toastr.error(event.detail.message,'عملیات ناموفق !')
                }
            })
            window.addEventListener('hide-imageDelete', event => {
                $('#deleteImage').modal('hide')
                if(event.detail['action'] == 'success'){ 
                  toastr.success(event.detail.message,'عملیات موفق !')
                }else{
                  toastr.error(event.detail.message,'عملیات ناموفق!')
                }
            })
        })
    
        window.addEventListener('show-imageDelete' , event =>{
            $('#deleteImage').modal('show')
        })
        window.addEventListener('addNewImage' , event =>{
            $('#addImage').modal('show')
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
         {{-- <script src="/admin/js/default-assets/demo.datatable-init.js"></script> --}}
         <script src="/admin/js/default-assets/bootstrap-growl.js"></script>
         {{-- <script src="/admin/js/default-assets/notification-active.js"></script> --}}
         {{-- <script src="/admin/js/MaxLength.min.js"></script> --}}
    
@endpush
