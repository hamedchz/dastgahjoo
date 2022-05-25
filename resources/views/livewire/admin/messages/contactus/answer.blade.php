 <!-- Modal -->
<div class="modal fade" wire:ignore.self id="contactusInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form  wire:submit.prevent="updateTicket">
              <div class="row">
              <div class="form-group col-md-12">
                <label for="mobile"> موبایل</label>
                <input type="text" wire:model.defer="state.mobile" class="form-control" id="mobile" readonly>
            </div>
              <div class="form-group col-md-12">
              <label for="messageBody">متن پیام</label>
              <textarea class="form-control" id="messageBody" rows="6" wire:model.defer="state.description" readonly></textarea>
              </div>
            </div>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
        </form>
        </div>
      </div>
    </div>
  </div>