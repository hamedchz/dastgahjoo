<!-- Modal -->
<div class="modal fade"  id="productShowImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hgg">گالری عکسها </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <div class="row">
          @if($productsImages <> null)
          @forelse ($productsImages as $img)
          <div  class="col-md-4">
            <div class="card" style="width: 8rem;">
              <img class="card-img-top" src="{{asset($img['image'])}}" alt="" style="width: 200px;height:150px;">
              {{-- <div class="card-body">
                <p class="card-text"></p>
              </div> --}}
            </div>
          </div>
          @empty
          عکسی وجود ندارد
          @endforelse
          @else
          عکسی وجود ندارد
          @endif
        </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
        {{-- <button type="submit" class="btn btn-primary">ویرایش</button> --}}
      </div>
    </div>
  </div>
