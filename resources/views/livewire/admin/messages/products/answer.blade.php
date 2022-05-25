<!-- Modal -->
<div class="modal fade" wire:ignore.self id="editproductMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form  wire:submit.prevent="update">
                <div class="form-group">
                <label for="messageBody">متن پیام</label>
                <textarea class="form-control" id="messageBody" rows="3" wire:model="states" readonly></textarea>
                </div>
                {{-- <div class="form-group">
                    <label for="answerBody">جواب پیام</label>
                    <textarea class="form-control  @error('answer') is-invalid @enderror" id="answerBody" rows="3" wire:model="answer" readonly></textarea>
                    @error('answer')<div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
          {{-- <button type="submit" class="btn btn-primary">جواب</button> --}}
        </form>
        </div>
      </div>
    </div>
  </div>