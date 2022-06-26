     <!-- Modal -->
     <div class="modal fade" wire:ignore.self id="addNewAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">{{ $editStatus ? 'ویرایش ادمین': 'ادمین جدید'}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent ="{{ $editStatus ? 'updateAdmin': 'adminStore'}}" >
              <div class="row">
              <div class="form-group col-md-6">
                  <label for="name">نام ادمین</label>
                  <input type="text" wire:model.defer="state.name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="نام ادمین">
                  @error('name')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="mobile"> موبایل</label>
                <input type="text" wire:model.defer="state.mobile" class="form-control @error('mobile') is-invalid @enderror" id="mobile" placeholder="موبایل ">
                @error('mobile')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="password">کلمه عبور</label>
              <input type="text" wire:model.defer="state.password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="کلمه عبور ">
              @error('password')<div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="password_confirmation"> تکرار کلمه عبور</label>
            <input type="text" wire:model.defer="state.password_confirmation" class="form-control" id="password_confirmation" placeholder="تکرار کلمه عبور ">
        </div>
        @if($editStatus == false)
        <div  class="form-group col-md-12" wire:ignore>
          <label for="exampleInputEmail12"> دسترسی ها:</label>
          <select class="js-example-basic-multiple col-md-12"  name="states[]" multiple="multiple" style="width: 100%;" wire:model.defer="state.permission_id">
              @forelse($allPermissions as $per)
                  <option  value="{{$per->id}}">{{$per->description}}</option>
              @empty
              <option>اطلاعاتی وجود ندارد</option>
              @endforelse
        </select>
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
