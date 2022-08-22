      <!-- Modal -->
      <div class="modal fade"  id="productInfos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">اطلاعات ماشین آلات</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @if($productInfo <> null)
            
            <div class="modal-body">
              <div class="row">
            <div class="form-group col-md-6" >
              <label for="category"> دسته بندی </label>
                  <select class="form-control form-select @error('value') is-invalid @enderror" aria-label="Default select example"  wire:change.defer = "changeCategory(event.target.value)">
                @foreach($categories as $category)
                 <option value="{{ $category->id }}" {{$productInfo->category_id == $category->id ? 'selected':''}} >{{ $category->title }}</option>
                @endforeach
            </select>
            @error('value')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            
            <div class="form-group col-md-6">
              <label for="subcategory">  زیر دسته بندی </label>
              <select class="form-control @error('value') is-invalid @enderror"  wire:change="updateCategory(event.target.value)" >
                @foreach($subcategories as $category)
                 <option value="{{ $category->id }}" {{$productInfo->subcategory_id == $category->id ? 'selected':''}} >{{ $category->title }}</option>
                @endforeach
            </select>
            @error('value')<div class="invalid-feedback">{{ $message }}</div> @enderror
          
            </div>
          

              {{--  <div class="form-group col-md-6">
                <label for="file"> وضعیت </label>
                <select class="form-control @error('value') is-invalid @enderror" wire:change.defer = "changeStatus({{$productInfo->id}},event.target.value)" >
                  <option value="pending" {{$productInfo->status == 'pending' ? 'selected':''}} >در حال بررسی</option>
                  <option value="verified" {{$productInfo->status == 'verified' ? 'selected':''}}>تایید شده</option>
                  <option value="rejected" {{$productInfo->status == 'rejected' ? 'selected':''}}>موافقت نشده</option>
              </select>
              @error('value')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div> --}}
           
                <div class="form-group col-md-6">
                  <label for="vendor">نام کاربر </label>
                  <input type="text"  class="form-control" id="vendor" value="{{$productInfo->vendor->user->name}}" readonly>
              </div>
             
              <div class="form-group col-md-6">
                  <label for="itemNo"> شماره محصول</label>
                  <input type="text"  class="form-control" id="itemNo" value="{{$productInfo->itemNo}}" readonly>
              </div>
              <div class="form-group col-md-6">
                  <label for="quant">تعداد</label>
                  <input type="text"  class="form-control" id="quant" value="{{$productInfo->quantity}}" readonly>
              </div>
              <div class="form-group col-md-6">
                  <label for="year">سال ساخت</label>
                  <input type="text"  class="form-control" id="year" value="{{$productInfo->year_of_manufacture}}" readonly>
              </div>
              <div class="form-group col-md-6">
                  <label for="productInfos">قیمت</label>
                  <input type="text"  class="form-control" id="year" value="{{$productInfo->year_of_manufacture}}" readonly>
              </div>
              <div class="form-group col-md-6">
                  <label for="manufacturer">سازنده</label>
                  <input type="text"  class="form-control" id="manufacturer" value="{{$productInfo->manufacturer}}" readonly>
              </div>
              <div class="form-group col-md-6">
                  <label for="model">مدل </label>
                  <input type="text"  class="form-control" id="model" value="{{$productInfo->model}}" readonly>
              </div>
              <div class="form-group col-md-6">
                  <label for="type_of_machine">نوع </label>
                  <input type="text"  class="form-control" id="type_of_machine" value="{{$productInfo->type_of_machine}}" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="view">بازدید </label>
                <input type="text"  class="form-control" id="view" value="{{$productInfo->view}}" readonly>
              </div>
         
              <div class="form-group col-md-6">
                <label for="stock">دسته دوم</label>
                @if($productInfo->isStock == 1)
                <input type="text"  class="form-control" id="stock" value="بله" readonly>
                @else
                <input type="text"  class="form-control" id="stock" value="خیر" readonly>
                @endif
              </div>
              <div class="form-group col-md-6">
                <label for="sold">فروخته شده</label>
                @if($productInfo->isSold == 1)
                <input type="text"  class="form-control" id="sold" value="بله" readonly>
                @else
                <input type="text"  class="form-control" id="sold" value="خیر" readonly>
                @endif
               </div>
              <div class="form-group col-md-6">
                <label for="installments">اقساط</label>
                @if($productInfo->isInstallments == 1)
                <input type="text"  class="form-control" id="installments" value="بله" readonly>
                @else
                <input type="text"  class="form-control" id="installments" value="خیر" readonly>
                @endif             
               </div>
               
                <div class="form-group col-md-6">
                <label for="location">استان</label>
                <input type="text"  class="form-control" id="location" value="{{$productInfo->province->title}}" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="location">شهر</label>
                <input type="text"  class="form-control" id="location" value="{{$productInfo->city->title}}" readonly>
              </div>
          
               <div class="form-group col-md-12" >
                <label for="description"> توضیحات اضافی </label><br>
                {{-- <input type="text"  class="form-control" id="description" value="{{$productInfo->description}}" readonly> --}}
                <span>{!! $productInfo->description !!}</span>
            </div>
                <div class="form-group col-md-12" >
                   <label for="extra_description"> توضیحات(<span style="color:red;">این توضیحات در سایت نمایش داده نمیشود</span>)  </label>
                    <textarea class="form-control" id="extra_description" rows="3" cols="15" readonly >{{$productInfo->extra_description}}</textarea>    
               </div>
            </div>
            <div class="modal-footer">
              <button type="button" wire:click.prevent="showImage({{$productInfo->id}})" class="btn btn-danger" data-dismiss="modal">مشاهده گالری</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>


            </div>
   
         @endif
          </div>
          </div>
        </div>

      </div>
