<!-- Modal -->
<div class="modal fade"  id="editproductMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form >
                <div class="form-group">
                <label for="messageBody">متن پیام</label>
                <textarea class="form-control" id="messageBody" rows="3" wire:model="states" readonly>قثثفثفثقف</textarea>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
          {{-- <button type="submit" class="btn btn-primary">جواب</button> --}}
        </form>
        </div>
      </div>
    </div>
  </div>