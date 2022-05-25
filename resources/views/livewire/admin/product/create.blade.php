      <!-- Modal -->
     <div class="modal fade" wire:ignore.self id="productInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"> اطلاعات محصول{{$productInfo->itemNo}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="vendor">نام کاربر </label>
                  <input type="text"  class="form-control" id="vendor" value="{{$productInfo->vendor->user->name}}" readonly>
              </div>
              <div class="form-group col-md-6">
                  <label for="category">دسته بندی </label>
                  <input type="text"  class="form-control" id="category" value="{{$productInfo->category->title}}" readonly>
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
                <label for="location">آدرس</label>
                <input type="text"  class="form-control" id="location" value="{{$productInfo->location}}" readonly>
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
                <label for="file"> وضعیت </label>
                <select class="form-control @error('value') is-invalid @enderror" wire:change.defer = "changeStatus({{$productInfo->id}},event.target.value)">
                  <option value="pending" {{$productInfo->status == 'pending' ? 'selected':''}} >در حال بررسی</option>
                  <option value="verified" {{$productInfo->status == 'verified' ? 'selected':''}}>تایید شده</option>
                  <option value="rejected" {{$productInfo->status == 'rejected' ? 'selected':''}}>موافقت نشده</option>
              </select>
              @error('value')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
               <div class="form-group col-md-12">
                <label for="description">توضیحات </label>
                {{-- <input type="text"  class="form-control" id="description" value="{{$productInfo->description}}" readonly> --}}
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly>{{$productInfo->description}}</textarea>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
            </div>
         </form>
          </div>
          </div>
        </div>
      </div>
