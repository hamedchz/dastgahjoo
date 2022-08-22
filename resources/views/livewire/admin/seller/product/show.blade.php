 <!-- Modal -->
<div class="modal fade" wire:ignore.self id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="form-group col-md-6">
              <label for="category">دسته بندی</label>
              <select class="custom-select" id="category" disabled>
                  <option >{{$categories}}</option>
              </select>
          </div>
          @if($subcategories <> null)
            <div class="form-group col-md-6">
              <label for="subcategory"> زیر دسته بندی</label>
              <select class="custom-select" id="category" disabled>
                <option >{{$subcategories->title}}</option>
            </select>
            </div>
          @endif
          <div class="form-group col-md-6">
            <label for="slug">نام دستگاه</label>
            <input type="text" name="name" wire:model.defer="state.name" class="form-control @error('name') is-invalid @enderror" id="name" disabled>
          </div>
          <div class="form-group col-md-6">
              <label for="quantity"> تعداد</label>
              <input type="number" wire:model.defer="state.quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="year_of_manufacture"> سال ساخت</label>
              <input type="text" wire:model.defer="state.year_of_manufacture" class="form-control @error('year_of_manufacture') is-invalid @enderror" id="year_of_manufacture" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="price"> قیمت(تومان)</label>
              <input type="text" wire:model.defer="state.price"  class="form-control @error('price') is-invalid @enderror" id="price" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="manufacturer"> شرکت سازنده</label>
              <input type="text"  wire:model.defer="state.manufacturer" class="form-control @error('manufacturer') is-invalid @enderror" id="manufacturer" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="model"> نام مدل</label>
              <input type="text" wire:model.defer="state.model" class="form-control @error('model') is-invalid @enderror" id="model" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="type_of_machine"> نوع ماشین</label>
              <input type="text" wire:model.defer="state.type_of_machine" class="form-control @error('type_of_machine') is-invalid @enderror" id="type_of_machine" disabled>
            </div>
            <div class="form-group col-md-6">
              <label for="isStock">نوع کالا</label>
              <select class="custom-select" id="isStock" disabled>
                @if($product->isStock == 1)
                <option >نو</option>
                @elseif($product->isStock == 2)
                <option>دست دوم</option>
                @endif
            </select>                                  
            </div>
            <div class="form-group col-md-6">
              <label for="isInstallments">اقساط</label>
              <select class="custom-select" id="isInstallments" disabled>
                @if($product->isInstallments == 0)
                <option >خیر</option>
                @elseif($product->isInstallments == 1)
                <option> بله</option>
                @endif
            </select>                                  
            </div>
            <div class="form-group col-md-6">
              <label for="isSold">وضعیت فروش</label>
              <select class="custom-select" id="isSold" disabled>
                @if($product->isSold == 0)
                <option >فروشی</option>
                @elseif($product->isSold == 1)
                <option> فروخته شده</option>
                @endif
            </select>                                  
            </div>
           <div class="form-group col-md-6">
                <label for="location">استان</label>
                <input type="text"  class="form-control" id="location" value="{{$province}}"   readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="location">شهر</label>
                <input type="text"  class="form-control" id="location" value="{{$city}}"   readonly>
              </div>
          
          <div class="form-group col-md-6">
            <label for="site_url"> آدرس سایت</label>
            <input type="text" wire:model.defer="state.site_url" class="form-control @error('site_url') is-invalid @enderror" id="site_url" disabled>
        </div>
       
        <div class="form-group col-md-12">
            <label for="description"> توضیحات اضافی: </label>
            <span>{!! $description !!}</span>
        </div>
        <div class="form-group col-md-12">
            <label for="extra_description"> توضیحات(<span style="color:red;"> این توضیحات  در سایت نمایش داده نمیشود  و برای اطلاع خود فروشنده میباشد</span>)  </label>
            <textarea  wire:model.defer="state.extra_description" class="form-control " id="extra_description" disabled></textarea>
        </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
          <button type="button" class="btn btn-danger" wire:click.prevent="showImage({{$product->id}})" data-dismiss="modal">مشاهده گالری</button>

        </div>
      </div>
    </div>
  </div>