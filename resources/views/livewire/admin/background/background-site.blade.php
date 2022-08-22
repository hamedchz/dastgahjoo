<div>
    <nav aria-label="خرده نان" class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">  ویرایش پس زمینه سایت  </li>
        </ol>
    </nav>
<div class="data-table-area">
    <div class="container-fluid">
        <div class="row">
        

            <div class="col-12 col-lg-12 box-margin height-card">
                <div class="card card-body">
                    <h4 class="card-title">  ویرایش پس زمینه سایت  (فقط عکس با پسوند jpg آپلود کنید)</h4>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form wire:submit.prevent ="store">
                                {{-- <div class="form-group col-md-12" wire:ignore>
                                    <label for="category">متن </label>
                                    <textarea class="form-control" id="first" rows="15" cols="15" wire:model.defer="state.body" data-first="@this"></textarea>    
                                    @error('body')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div> --}}
                                <div class="form-group col-md-12">
                                  <div class="input-group cust-file-button mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control  @error('photo') is-invalid @enderror" id="inputGroupFile03" wire:model = "photo">
                                        <label class="custom-file-label" for="inputGroupFile03">تصویر </label>
                                    </div>
                                    @error('photo')<div style="width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;">{{ $message }}</div> @enderror

                                    <div class="col-md-12 ">
                                      @if ($photo)
                                        <div class="mt-5 justify-content-center align-items-center">
                                        <img src="{{ $photo->temporaryUrl() }}"  class='pr-2 mb-1 shadow mr-3' style='width:70px;height:70px;' >
                                        </div>
                                     @endif
                                        {{-- <div class="filearray  mt-5 justify-content-center align-items-center"></div> --}}
                                    </div>
                                </div>
                                </div>
                                <button type="submit" class="btn btn-primary" wire:loading.class="d-none" wire:target="photo">ذخیره</button>
                       
                                <div class="la-ball-beat la-dark la-sm " wire:loading wire:target="photo" style="float:right;">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                {{-- @if($errorMsg <> null)
                                <div class="mt-2 p-2" style="position: relative;padding: 0.75rem 1.25rem;margin-bottom: 1rem;border: 1px solid transparent;border-radius: 0.25rem;
                                color: #721c24;background-color: #f8d7da;border-color: #f5c6cb;" >
                                    {{$errorMsg }}
                                  </div>
                                @endif --}}
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row-->

    </div>
</div>
@include('livewire.admin.cong-message.delete')

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
{{-- <script src="{{asset("admin/ckeditor5/ckeditor.js")}}"></script> --}}

    <script>
          $(document).ready(function(){
            // ClassicEditor
            // .create( document.querySelector( '#first' ),{
            //     language: {
            //           ui: 'en',
            //          content: 'ar'
            //               }
            // } )
            // .then( editor => {
              
            //     editor.model.document.on('change:data', () => {
            //         let first = $('#first').data('first');
                    
            //         eval(first).set('state.body', editor.getData())
            //     })
            //   })
            // .catch( error => {
            //     console.error( error );
            // } );
           
            toastr.options ={
               
                "progressBar": true,
                "positionClass": "toast-bottom-right",
           
            }
            window.addEventListener('hide-add', event => {
                // $('#add').modal('hide')
                if(event.detail['action'] == 'success'){ 
                 toastr.success(event.detail.message,'عملیات موفق!')
                }else{
                 toastr.error(event.detail.message,'عملیات ناموفق!')
                }
            })
            window.addEventListener('hidedelete', event => {
                $('#delete').modal('hide')
                if(event.detail['action'] == 'success'){ 
                  toastr.success(event.detail.message,'عملیات موفق!')
                }else{
                  toastr.error(event.detail.message,'عملیات ناموفق!')
                }
            })
        })
        window.addEventListener('showNew' , event =>{
            $('#addCongr').modal('show')
        })
        window.addEventListener('showDelete' , event =>{
            $('#delete').modal('show')
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
         <script src="/admin/js/MaxLength.min.js"></script>
    
@endpush
</div>