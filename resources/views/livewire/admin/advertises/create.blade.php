     <!-- Modal -->
     <div class="modal fade" wire:ignore.self id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">{{ $editStatus ? 'ویرایش تبلیغ': 'تبلیغ جدید'}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                <form wire:submit.prevent ="{{ $editStatus ? 'update': 'store'}}" >
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="category">دسته بندی</label>
                  <select class="custom-select" id="category" wire:model = "state.category_id">
                      <option selected>انتخاب کنید</option>
                      @forelse($categories as $category)
                      <option value="{{$category->id}}">{{$category->title}}</option>
                      @empty
                      <option>دسته بندی وجود ندارد</option>
                      @endforelse
                  </select>
                  @error('category')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="form-group col-md-12">
                <label for="description">نام تبلیغ</label>
                <input type="text" wire:model="state.description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="نام تبلیغ">
                @error('description')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
              <div class="form-group col-md-12">
                  <label for="duration">  مدت اعتبار  (روز)</label>
                  {{-- <input type="number" name="date" class="form-control usage" wire:model="state.duration"  data-provide="datepicker" data-date-format="d-M-yyyy"> --}}
                  <input type="number" wire:model="state.duration" class="form-control @error('duration') is-invalid @enderror" id="duration" placeholder=" مدت اعتبار ">
                  @error('duration')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="form-group col-md-12">
                <div class="input-group cust-file-button mb-3">
                  <div class="custom-file">
                    
                      <input type="file" class="custom-file-input form-control" id="inputGroupFile03" wire:model = "photo">
                      <label class="custom-file-label" for="inputGroupFile03">تصویر بنر</label>
                 
                  </div>
                  <div class="col-md-12 "  >
                                       
                    @if ($photo)
                    
                      <div class="mt-5 justify-content-center align-items-center">
                    
                      <img src="{{ $photo->temporaryUrl() }}"  class='pr-2 mb-1 shadow mr-3' style='width:70px;height:70px;' >
                     
                      </div>
                   @endif
                      {{-- <div class="filearray  mt-5 justify-content-center align-items-center"></div> --}}
                  </div>
              </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
              <button type="submit" class="btn btn-primary" wire:loading.class="d-none" >{{$editStatus ?'ویرایش':'ذخیره'}}</button>
              <div class="la-ball-beat la-dark la-sm " wire:loading wire.target="photo" style="float:left;">
                <div></div>
                <div></div>
                <div></div>
            </div>
            </div>
         </form>
          </div>
          </div>
        </div>
      </div>
