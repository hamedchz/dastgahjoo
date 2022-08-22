<div>
    <nav aria-label="خرده نان" class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index')}}">داشبورد</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.category')}}">دسته بندی ها</a></li>
            <li class="breadcrumb-item active" aria-current="page">زیر دسته بندی ها</li>
        </ol>
    </nav>
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 box-margin" wire:ignore>
                    <div class="card">
                        <div class="card-body">
                            <div class="row" style="display: flex;align-items: center;justify-content: space-around;">
                                <h4 class="card-title mb-2">لیست زیر دسته بندی </h4>
                                <button type="button" class="btn btn-success mb-2 mr-2" style="float:left;"  wire:click.prevent="addNew({{$categoryId}})" ><i class="fa fa-plus-square"></i> افزودن</button>
                            </div>
                            <hr>
                            
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th id="edit-cat1">نام</th>
                                     <th id="edit-cat2"><a id="edit-cat2">نام</a> </th>
                                        <th class="status-semat">توضیحات</th>
                                        <th class="status-semat">وضعیت</th>
                                        <th id="edit-cat2">عملیات</th>
                                    </tr>
                                </thead>
                                <tbody wire:sortable="updateCategoryPosition">
                                    @forelse($subcategory as $category)
                                    <tr class="justify-content-center align-items-center"  wire:key="categoryphp artisan se-{{ $category->id }}" wire:sortable.item="{{ $category->id }}">
                                      <td id="edit-cat1"> 
                                         
                                         <i style="margin-left:15px;width: 10px;cursor:move;" wire:sortable.handle class="fa fa-arrows-alt text-muted"></i>
                                       {{$category->title}}
                                       <div style="margin-right: 50px;">
                                            <a href="" wire:click.prevent="edit({{$category}})" style="font-size:20px;margin-right:15px;"><i class="fa fa-edit" style="color:#04a9f5;"></i></a>
                                            <a href="" wire:click.prevent="removeConfirmation({{$category->id}})" style="font-size:20px;"><i class="fa fa-trash" style="color:#dc3545;"></i></a>
                                       </div>
                                        </td>
                                        
                                         <td >
                                        <i id="edit-cat2" style="width: 10px;cursor:move;" wire:sortable.handle class="fa fa-arrows-alt text-muted"></i>
                                       <a id="edit-cat2">{{$category->title}}</a>
                                        </td>
                                        
                                        <td class="status-semat">{{$category->description}}</td>
                                        <td class="status-semat">
                                            <select class="form-control @error('status') is-invalid @enderror" wire:change = "changeStatus({{$category}},event.target.value)">
                                                <option value="1" {{$category->isActive == 1 ? 'selected':''}} >فعال</option>
                                                <option value="0" {{$category->isActive == 0 ? 'selected':''}}>غیرفعال</option>
                                            </select>
                                            @error('status')<div class="invalid-feedback">{{ $message }}</div> @enderror

                                         </td>        
                                         <td id="edit-cat2">

                                            <a href="" wire:click.prevent="edit({{$category}})" style="font-size:20px;"><i class="fa fa-edit" style="color:#04a9f5;"></i></a>
                                            <a href="" wire:click.prevent="removeConfirmation({{$category->id}})" style="font-size:20px;"><i class="fa fa-trash" style="color:#dc3545;"></i></a>
                                       
                                        </td>
                                        @empty
                                           <td align="center" colspan="6">اطلاعاتی وجود ندارد</td> 
                                        </tr>
                                        @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex align-items-center justify-content-center">
                                {{-- {{$subcategory->links()}} --}}
                             </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
       
        </div><!-- Button trigger modal -->
        
    </div>
     @include('livewire.admin.category.create')
     @include('livewire.admin.category.delete')

    @push('styles')
    <link rel="stylesheet" href="{{asset('admin/css/default-assets/datatables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/default-assets/responsive.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/default-assets/buttons.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/default-assets/select.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/default-assets/notification.css')}}">
    <style>
          .draggable-mirror{
            background-color:white;
            display:flex;
            width: 80%;
            justify-content: space-around !important;
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
            align-items:center;

        }
        
         #edit-cat1{
        display:none;
        }
        
          @media only screen and (max-width: 767px){
      
 table.dataTable.dtr-inline.collapsed>tbody>tr[role=row]>td:first-child:before,
             table.dataTable.dtr-inline.collapsed>tbody>tr[role=row]>th:first-child:before {
                top: 70%;
                left: 90%;
                z-index: 100;    
                display:block;
        } 
        
        #edit-cat2{
        display:none;
        }
         #edit-cat1{
        display:block;
        
        }
        
     
     table.dataTable>tbody>tr.child ul.dtr-details>li:last-child {
    display: none;
}
        
    }
        

    </style>
    @endpush
    @push('scripts')

        <script>
        $(document).ready(function(){
        $("#metaTitle").MaxLength(
        {
            MaxLength: 60,
            CharacterCountControl: $('#counter1')
        });
        $("#metaDescription").MaxLength(
        {
            MaxLength: 160,
            CharacterCountControl: $('#counter2')
        });
            toastr.options ={
               
                "progressBar": true,
                "positionClass": "toast-bottom-right",
           
            }
            window.addEventListener('editcategoryStatus', event => {
                
                if(event.detail['action'] == 'success'){ 
                 toastr.success(event.detail.message,'عملیات موفق!')
                }else{
                 toastr.error(event.detail.message,'عملیات ناموفق!')
                }
            })
            window.addEventListener('hide-deleteCategory', event => {
                $('#categoryDelete').modal('hide')
                if(event.detail['action'] == 'success'){ 
                 toastr.success(event.detail.message,'عملیات موفق!')
                }else{
                 toastr.error(event.detail.message,'عملیات ناموفق!')
                }
            })
            window.addEventListener('hide-editCategory', event => {
                $('#addCategory').modal('hide')
                if(event.detail['action'] == 'success'){ 
                  toastr.success(event.detail.message,'عملیات موفق!')
                }else{
                  toastr.error(event.detail.message,'عملیات ناموفق!')
                }
            })
        })
           
            window.addEventListener('show-editCategory', event => {
                $('#addCategory').modal('show')

            })
            window.addEventListener('show-deleteCategory', event => {
                $('#categoryDelete').modal('show')

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
     {{--<script src="/admin/js/default-assets/demo.datatable-init.js"></script>--}}
     <script src="/admin/js/default-assets/bootstrap-growl.js"></script>
     {{-- <script src="/admin/js/default-assets/notification-active.js"></script> --}}
     <script src="/admin/js/MaxLength.min.js"></script>

    @endpush
     @push('after-scripts')
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
    @endpush
</div>
