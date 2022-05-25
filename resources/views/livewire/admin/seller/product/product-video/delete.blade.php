<!-- Modal -->
<div class="modal fade" id="deleteImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          آیا میخواهید  این ویدیو را حذف  کنید؟
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">خیر</button>
          <button type="button" class="btn btn-primary" wire:click.prevent="removeimage">حذف </button>
        </div>
      </div>
    </div>
  </div>