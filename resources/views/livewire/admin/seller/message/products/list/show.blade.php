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
            <label for="category"> ایمیل </label>
            <input class="form-control" id="exampleFormControlTextarea1" value="{{$message->email}}" disabled>
          </div>
           <div class="form-group col-md-6">
            <label for="category"> آدرس </label>
            <input class="form-control" id="exampleFormControlTextarea1" value="{{$message->address}}" disabled>
          </div>
              <div class="form-group col-md-6">
            <label for="category"> کدپستی </label>
            <input class="form-control" id="exampleFormControlTextarea1" value="{{$message->postal}}" disabled>
          </div>
              <div class="form-group col-md-6">
            <label for="category"> نام محصول </label>
            <input class="form-control" id="exampleFormControlTextarea1" value="{{$message->products->name}}" disabled>
          </div>
              <div class="form-group col-md-6">
            <label for="category"> قیمت </label>
            <input class="form-control" id="exampleFormControlTextarea1" value="{{$message->price}}" disabled>
          </div>
          
        <div class="form-group col-md-12">
          <label for="category">متن </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>{{$message->comment}}</textarea>
        </div>
          </div>
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
        
        </div>
      </div>
    </div>
  </div>