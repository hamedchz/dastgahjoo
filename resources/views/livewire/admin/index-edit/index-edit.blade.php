<div>
    <nav aria-label="خرده نان" class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page"> ویرایش صفحه اول</li>
        </ol>
    </nav>
    
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                        <div class="d-flex justify-content-between ">
                            <h4 class="card-title mb-2"> ویرایش صفحه اول </h4>
                        </div>
                            <hr>
                            <form action="" wire:submit.prevent="update" >
                            
                            <div class="row">
                                <div class="form-group col-md-12" wire:ignore>
                                    <label for="description"> قسمت بالا </label>
                                    <textarea class="form-control" id="first" rows="15" cols="15" wire:model.defer="state.first_part" data-first="@this"></textarea>    
                                   @error('first_part')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                                  <div class="form-group col-md-12" wire:ignore>
                                    <label for="description">  قسمت پایین </label>
                                    <textarea class="form-control" id="second" rows="15" cols="15" wire:model.defer="state.second_part" data-second="@this"></textarea>    
                                   @error('second_part')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                  </div>
                              
                                  <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success" >ویرایش</button>
                             
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
    <script src="{{asset("admin/ckeditor5/ckeditor.js")}}"></script>
    <script>
       
  
         $(document).ready(function(){
          ClassicEditor
            .create( document.querySelector( '#first' ) )
            .then( editor => {
              
                editor.model.document.on('change:data', () => {
                    let first = $('#first').data('first');
                    
                    eval(first).set('state.first_part', editor.getData())
                })
              })
            .catch( error => {
                console.error( error );
            } );
            ClassicEditor
            .create( document.querySelector( '#second' ) )
            .then( editor => {
              
                editor.model.document.on('change:data', () => {
                    let second = $('#second').data('second');
                    
                    eval(second).set('state.second_part', editor.getData())
                })
              })
            .catch( error => {
                console.error( error );
            } );
           
                 toastr.options ={
                    
                     "progressBar": true,
                     "positionClass": "toast-bottom-right",
                
                 }
                 window.addEventListener('edit-firstpage', event => {
                     
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
<script src="/admin/js/default-assets/notification-active.js"></script>
    @endpush
</div>