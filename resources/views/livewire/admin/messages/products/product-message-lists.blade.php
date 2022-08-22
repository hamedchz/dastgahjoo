<div>
  <nav aria-label="خرده نان" class="container-fluid">
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">داشبورد</a></li>
          <li class="breadcrumb-item active" aria-current="page">لیست پرسش محصولات </li>
      </ol>
  </nav>
  <div class="data-table-area">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12 box-margin"  wire:ignore>
                  <div class="card">
                      <div class="card-body">
                          <div class="d-flex justify-content-between ">
                          <h4 class="card-title mb-2">پرسش محصولات</h4>
                          {{-- <div class="btn-group">
                              <button type="button" class="btn {{is_null($status) ? 'btn-secondary' : 'btn-light'}} " wire:click.prevent="filterMessagesByStatus">
                                  <span class="mr-1">همه</span>
                                  <span class="badge badge-pill badge-info">{{$numberAllMessages}}</span>
                              </button>
                              <button type="button" class="btn {{$status=='read' ? 'btn-secondary' : 'btn-light'}} "  wire:click.prevent="filterMessagesByStatus('read')">
                               <span class="mr-1">خوانده شده</span>
                               <span class="badge badge-pill badge-primary">{{$numberReadMessages}}</span>
                               </button>
                               <button type="button" class="btn {{$status=='unread' ? 'btn-secondary' : 'btn-light'}} "  wire:click.prevent="filterMessagesByStatus('unread')">
                                  <span class="mr-1">خوانده نشده</span>
                                  <span class="badge badge-pill badge-primary">{{$numberunReadMessages}}</span>
                                  </button> --}}
                          </div>
                      </div>
                          <hr>
                          <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                              <thead>
                                  <tr>
                                      <th class="status-semat">فروشنده</th>
                                   <th id="edit-product1">عملیات</th>
                                      <th class="status-semat">عنوان</th>
                                      <th>موضوع</th>
                                      <th>شماره محصول</th>
                                      <th class="status-semat">وضعیت</th>
                                      <th class="status-semat">تاریخ و ساعت</th>
                                      <th id="edit-product2">عملیات</th>
                                  </tr>
                              </thead>

                              <tbody>
                                  @forelse($messages as $msg)
                                  <tr>
                                      <td class="status-semat">{{$msg->vendor->user->name}}</td>
                                       <td id="edit-product1">
                                          {{-- @if($msg->status == 'unread') --}}
                                          {{-- <a href="" wire:click.prevent="edit({{$msg->id}})" style="font-size:20px;"><i class="fa fa-edit"  style="color:#04a9f5;"></i></a> --}}
                                          {{-- @else
                                          <span  style="font-size:20px;"><i class="fa fa-edit"  style="color:#e1e1e1;"></i></span>

                                          @endif --}}
                                          <a href="" wire:click.prevent="removeConfirmation({{$msg->id}})" style="font-size:20px;"><i class="fa fa-trash" style="color:#dc3545;"></i></a>
                                      </td>
                                      <td class="status-semat">{{$msg->title}}</td>
                                      <td>
                                        
                                          @if($msg->isPrice == 1)
                                          <div class="badge badge-primary">  قیمت  </div>
                                          @endif
                                          @if($msg->morePhotos == 1)
                                          <div class="badge badge-info"> عکس </div>
                                          @endif
                                          @if($msg->moreInformation == 1)
                                          <div class="badge badge-danger"> اطلاعات </div>
                                          @endif
                                          @if($msg->offer == 1)
                                          <div class="badge badge-warning">  تخفیف </div>
                                          @endif 
                                      </td>

                                      <td>{{$msg->products->itemNo}}</td>
                                      <td class="status-semat">
                                          <select class="form-control form-select form-select-sm" aria-label=".form-select-sm example" wire:change="changeStatus({{$msg}},event.target.value)" disabled>
                                              
                                                <option value="OPEN" {{$msg->status == 'OPEN' ? 'selected': ''}}>جواب داده نشده</option>
                                                <option value="CLOSED" {{$msg->status == 'CLOSED' ? 'selected': ''}}>جواب داده شده</option>
                                                <option value="PENDING" {{$msg->status == 'PENDING' ? 'selected': ''}}>در حال بررسی </option>
                                                <option value="SUSPENDED" {{$msg->status == 'SUSPENDED' ? 'selected': ''}}> معلق</option>
                                          
                                            </select>
                                          {{-- <div class="badge {{$msg->status_badge}}">
                                          @switch($msg->status)
                                              @case('read')
                                                      خوانده شده
                                                  @break
                                              @case('unread')
                                                      خوانده نشده
                                                  @break
                                              @default
                                                  
                                          @endswitch
                                          </div> --}}
                                      </td>
                                      <td class="status-semat">{{$msg->created_at}}</td>
                             
                                      <td id="edit-product2">
                                          {{-- @if($msg->status == 'unread') --}}
                                          {{-- <a href="" wire:click.prevent="edit({{$msg->id}})" style="font-size:20px;"><i class="fa fa-edit"  style="color:#04a9f5;"></i></a> --}}
                                          {{-- @else
                                          <span  style="font-size:20px;"><i class="fa fa-edit"  style="color:#e1e1e1;"></i></span>

                                          @endif --}}
                                          <a href="" wire:click.prevent="removeConfirmation({{$msg->id}})" style="font-size:20px;"><i class="fa fa-trash" style="color:#dc3545;"></i></a>
                                      </td>
                                      @empty
                                      <td align="center" colspan="7" style="background-color:#e1e1e1;">داده ای وجود ندارد</td>
                                  </tr>
                                  @endforelse
                              </tbody>
                          </table>
                          <div class="d-flex align-items-center justify-content-center">
                             
                          </div>
                      </div> <!-- end card body-->
                  </div> <!-- end card -->
              </div><!-- end col-->
          </div>
          <!-- end row-->

      </div>
  </div>
  {{--@include('livewire.admin.messages.products.answer')--}}
  @include('livewire.admin.messages.products.delete')
  
       <link rel="stylesheet" href="{{asset('admin/css/default-assets/datatables.bootstrap4.css')}}">
   <link rel="stylesheet" href="{{asset('admin/css/default-assets/responsive.bootstrap4.css')}}">
   <link rel="stylesheet" href="{{asset('admin/css/default-assets/buttons.bootstrap4.css')}}">
   <link rel="stylesheet" href="{{asset('admin/css/default-assets/select.bootstrap4.css')}}">
   <link rel="stylesheet" href="{{asset('admin/css/default-assets/notification.css')}}">


</div>
@push('styles')
<style>

   #edit-product1{
    display:none;
    }
    
    
  @media only screen and (max-width: 835px){
  
  
     table.dataTable.dtr-inline.collapsed>tbody>tr[role=row]>td:first-child:before,
           table.dataTable.dtr-inline.collapsed>tbody>tr[role=row]>th:first-child:before {
              top: 70% !important;
              left: 90% !important;
              z-index: 100;       
      } 
  
     table.dataTable>tbody>tr.child ul.dtr-details>li:last-child{
          display:none;
    }
    
        #edit-product1{
              display:block;
    }
    
    
    #edit-product2{
          display:none;

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
          window.addEventListener('hide-editproductMessage', event =>{
          $('#editproductMessage').modal('hide')
          if(event.detail['action'] == 'success'){ 
              toastr.success(event.detail.message,'عملیات موفق!')
          }else{
               toastr.error(event.detail.message,'عملیات ناموفق!')
              }
      })
      window.addEventListener('hide-removeProductMessage', event =>{
          $('#deleteProductMessage').modal('hide')
          if(event.detail['action'] == 'success'){ 
              toastr.success(event.detail.message,'عملیات موفق!')
          }else{
               toastr.error(event.detail.message,'عملیات ناموفق!')
              }
      })
      window.addEventListener('editproductStatus', event =>{
          
          if(event.detail['action'] == 'success'){ 
              toastr.success(event.detail.message,'عملیات موفق!')
          }else{
               toastr.error(event.detail.message,'عملیات ناموفق!')
              }
      })
      
      })
      window.addEventListener('show-editproductMessage', event =>{
          $('#editproductMessage').modal('show')
      })
      window.addEventListener('show-deleteProductMsg', event =>{
          $('#deleteProductMessage').modal('show')
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
@endpush