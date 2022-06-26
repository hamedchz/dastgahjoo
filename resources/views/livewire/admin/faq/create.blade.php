     <!-- Modal -->
     <div class="modal fade" wire:ignore.self id="addProvince" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">{{ $editStatus ? 'ویرایش سوال': 'سوال جدید'}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent ="{{ $editStatus ? 'update': 'store'}}" >
              <div class="row">
              <div class="form-group col-md-12">
                  <label for="body"> سوال</label>
                  <textarea type="text" wire:model.defer="state.body" class="form-control @error('body') is-invalid @enderror" id="body" placeholder=" سوال"></textarea>
                  @error('body')<div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="form-group col-md-12">
                <label for="answer"> جواب</label>
                <textarea type="text" wire:model.defer="state.answer" class="form-control @error('answer') is-invalid @enderror" id="answer" placeholder=" جواب"></textarea>
                @error('answer')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
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
