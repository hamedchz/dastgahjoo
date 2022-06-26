<div>
    <nav aria-label="خرده نان" class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">حریم خصوصی</li>
        </ol>
    </nav>
    
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                        <div class="d-flex justify-content-between ">
                            <h4 class="card-title mb-2">حریم خصوصی</h4>
                        </div>
                            <hr>
                            <form wire:submit.prevent="update"   >
                           
                            <div class="row">
                               
                                <div class="form-group col-md-12" wire:ignore>
                                    <label for="body"> توضیحات </label>
                                    <textarea class="form-control" id="body" rows="15" cols="15" wire:model.defer="state.body" data-body="@this"></textarea>    
                                   @error('body')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                              
                                  <div class="form-group col-md-12">
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
    <script src="{{asset("admin/ckeditor5/ckeditor.js")}}"></script>
    <script>
       
  
         $(document).ready(function(){
            ClassicEditor
            .create( document.querySelector( '#body' ) ,{
                language: {
                      ui: 'en',
                     content: 'ar'
                          }
            } )
            .then( editor => {
              
                editor.model.document.on('change:data', () => {
                    
                    let body = $('#body').data('body');
                    
                    eval(body).set('state.body', editor.getData())
                })
              })
            .catch( error => {
                console.error( error );
            });
                 toastr.options ={
                    
                     "progressBar": true,
                     "positionClass": "toast-bottom-right",
                
                 }
                 window.addEventListener('edit-page', event => {
                     
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