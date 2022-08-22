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
            <div class="card modal-fancy-img" style="width: 8rem;">
              <img class="card-img-top" data-fancybox="gallery" src="{{asset($img['image'])}}" alt="" style="width: 200px;height:150px;">
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
                              @if($productVideo <> null)
        <div class="row" style="border-top:1px solid #dee2e6;margin-top: 20px;" >
        <h5 style="padding:10px 20px;"> ویدیو</h5>
            @foreach($productVideo as $video)
                <div  class="col-md-12" style="margin-top: 20px;display: flex;justify-content: center;align-items: center;">
                
      
                
                <video width="400" controls>
                  <source src="{{$video['video']}}" type="video/mp4">
                
                  Your browser does not support HTML video.
                </video>
                
                
              
                  
                </div>
            @endforeach
            </div>
       @endif  
         @if($productLogos <> null)
        <div class="row" style="border-top:1px solid #dee2e6;margin-top: 20px;" >
                   <h5 style="padding:10px 20px;"> لوگو</h5>
           @foreach($productLogos as $logo)
            <div  class="col-md-12 mt-2" style="margin-top: 20px;display: flex;justify-content: center;align-items: center;">

            <div class="card modal-fancy-img" style="width: 8rem;" >
              <img class="card-img-top"  data-fancybox="gallery" src="{{asset($logo['logo'])}}" alt="" style="width: 800px;height: auto;display:block !important;">
            </div>
            </div>
            @endforeach
            </div>
       @endif 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
        {{-- <button type="submit" class="btn btn-primary">ویرایش</button> --}}
      </div>
    </div>
  </div>
