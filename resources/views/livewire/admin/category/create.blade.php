     <!-- Modal -->
     <div class="modal fade" wire:ignore.self id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">{{ $editStatus ? 'ویرایش دسته بندی': 'دسته بندی جدید'}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent ="{{ $editStatus ? 'update': 'store'}}" >
              <div class="row">
              <div class="form-group col-md-12">
                  <label for="title">نام دسته بندی</label>
                  <input type="text" wire:model.defer="state.title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="نام دسته بندی">
                  @error('title')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="form-group col-md-12">
                <label for="slug">لینک دسته بندی(انگلیسی وارد شود)  </label>
                <input type="text" wire:model.defer="state.slug" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="نام دسته بندی">
                @error('slug')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
              <div class="form-group col-md-12">
                  <label for="description">توضیحات</label>
                  <textarea wire:model.defer="state.description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3"></textarea>
                  @error('description')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="form-group col-md-12">
                  <label for="metaTitle"> عنوان موتور جستجو</label>
                  <input type="text" wire:model.defer="state.metaTitle" class="form-control @error('metaTitle') is-invalid @enderror" id="metaTitle" placeholder="عنوان موتور جستجو">
                  <div id="counter1" style="font-size:12px"></div>
                  @error('metaTitle')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="form-group col-md-12">
                <label for="metaDescription"> توضیحات موتور جستجو</label>
                <textarea wire:model.defer="state.metaDescription" class="form-control @error('metaDescription') is-invalid @enderror" id="metaDescription" rows="3"></textarea>
                <div id="counter2" style="font-size:12px"></div>
                @error('metaDescription')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
              <button type="submit" class="btn btn-primary" >{{$editStatus ?'ویرایش':'ذخیره'}}</button>
            </div>
         </form>
          </div>
          </div>
        </div>
      </div>
     
