 <!-- Modal -->
<div class="modal fade" wire:ignore.self id="newTicket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form  wire:submit.prevent="storeTicket">
              <div class="form-group">
                <label for="title"> عنوان</label>
                <input type="text" wire:model = "state.title" class="form-control  @error('title') is-invalid @enderror" id="title" placeholder="عنوان">
                @error('title')<div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
                <div class="form-group">
                    <label for="description"> پیام</label>
                    <textarea class="form-control  @error('description') is-invalid @enderror" id="description" rows="3" wire:model="state.description" ></textarea>
                    @error('description')<div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
          <button type="submit" class="btn btn-primary">ارسال</button>
        </form>
        </div>
      </div>
    </div>
  </div>