     <!-- Modal -->
     <div class="modal fade" wire:ignore.self id="addPackage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">{{ $editStatus ? 'ویرایش پکیج': 'پکیج جدید'}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent ="{{ $editStatus ? 'updatePackage': 'packageStore'}}" >
              <div class="row">
              <div class="form-group col-md-6">
                  <label for="title">نام پکیج</label>
                  <input type="text" wire:model.defer="state.title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="نام پکیج">
                  @error('title')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

              <div class="form-group col-md-6">
                  <label for="price">قیمت</label>
                  <input type="number" wire:model.defer="state.price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="قیمت">
                  @error('price')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="discount">تخفیف</label>
                <input type="number" wire:model.defer="discount" class="form-control @error('discount') is-invalid @enderror" id="discount" placeholder="تخفیف">
                @error('discount')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
              <div class="form-group col-md-6">
                  <label for="label">برچسب</label>
                  <input type="text" wire:model.defer="state.label" class="form-control @error('label') is-invalid @enderror" id="label" placeholder="برچسب">
                  @error('label')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="form-group col-md-6">
                  <label for="duration">مدت زمان</label>
                  <input type="number" wire:model.defer="state.duration" class="form-control @error('duration') is-invalid @enderror" id="duration" placeholder="مدت زمان">
                  @error('duration')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="form-group col-md-6">
                  <label for="products">تعداد مجصول</label>
                  <input type="number" wire:model.defer="state.products" class="form-control @error('products') is-invalid @enderror" id="products" placeholder="تعداد مجصول">
                  @error('products')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="form-group col-md-6">
                  <label for="images">تعداد عکسها</label>
                  <input type="number" wire:model.defer="state.images" class="form-control @error('images') is-invalid @enderror" id="images" placeholder="تعداد عکسها">
                  @error('images')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="form-group col-md-6">
                  <label for="banner">تعداد بنر</label>
                  <input type="number" wire:model.defer="state.banner" class="form-control @error('banner') is-invalid @enderror" id="banner" placeholder="تعداد بنر">
                  @error('banner')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="form-group col-md-6">
                  <label for="video">امکان استفاده از  ویدیو</label>
                  {{-- <input type="number" wire:model.defer="state.video" class="form-control @error('video') is-invalid @enderror" id="video" placeholder="تعداد ویدیو"> --}}
                  <select class="form-control @error('video') is-invalid @enderror" id="video" wire:model.defer="state.video">
                    <option selected>انتخاب کنید</option>
                    <option value="YES">بله</option>
                    <option value="NO">خیر</option>
                </select>
                  @error('video')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="form-group col-md-6">
                  <label for="file">تعداد فایل</label>
                  <input type="number" wire:model.defer="state.file" class="form-control @error('file') is-invalid @enderror" id="file" placeholder="تعداد فایل">
                  @error('file')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="logo">امکان استفاده از لوگو</label>
                <select class="form-control @error('logo') is-invalid @enderror" id="logo" wire:model.defer="state.logo">
                    <option selected>انتخاب کنید</option>
                    <option value="YES">بله</option>
                    <option value="NO">خیر</option>
                </select>
                @error('logo')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="site">امکان استفاده از سایت</label>
                <select class="form-control  @error('site') is-invalid @enderror" id="site" wire:model.defer="state.site">
                    <option selected>انتخاب کنید</option>
                    <option value="YES">بله</option>
                    <option value="NO">خیر</option>
                </select>
                @error('site')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              @if($editStatus)
              <div class="form-group col-md-6">
                <label for="isActive">وضعیت</label>
                <select class="form-control  @error('isActive') is-invalid @enderror" id="isActive" wire:model.defer="state.isActive">
                    <option value="1">فعال</option>
                    <option value="0">غیرفعال</option>
                </select>
                @error('isActive')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              @endif
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
              <button type="submit" class="btn btn-primary" >ذخیره</button>
            </div>
         </form>
          </div>
          </div>
        </div>
      </div>
