 <!-- Modal -->
<div class="modal fade" wire:ignore.self id="showMessageProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="row">
          
            <div class="form-group col-md-6">
              @if($message->isPrice == 1)
              <div class="badge badge-primary">  قیمت  </div>
              @endif
              @if($message->morePhotos == 1)
              <div class="badge badge-info"> عکس </div>
              @endif
              @if($message->moreInformation == 1)
              <div class="badge badge-danger"> اطلاعات </div>
              @endif
              @if($message->offer == 1)
              <div class="badge badge-warning">  تخفیف </div>
              @endif 
            </div>
            <div class="form-group col-md-6">
              <label for="category">دسته بندی</label>
              <input type="text"  class="form-control" value="{{$message->title}}" disabled>
          </div>
          <div class="form-group col-md-6">
            <label for="category">دسته بندی</label>
            <input type="text"  class="form-control" value="{{$message->comment}}" disabled>
        </div>
        <div class="form-group col-md-6">
          <label for="category">دسته بندی</label>
          <input type="text"  class="form-control" value="{{$message->user->name}}" disabled>
      </div>
        <div class="form-group col-md-6">
          <label for="category">دسته بندی</label>
          <input type="text"  class="form-control" value="{{$message->title}}" disabled>
      </div>
     
          </div>
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
        
        </div>
      </div>
    </div>
  </div>