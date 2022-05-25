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
              <div class="form-group col-md-12">
                  <label for="title">نام پکیج</label>
                  <input type="text" wire:model.defer="state.title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="نام پکیج">
                  @error('title')<div class="invalid-feedback">{{ $message }}</div> @enderror
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
