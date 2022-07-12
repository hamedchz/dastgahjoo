<div class="itemslist">
      <!-- بدنه محتوا -->
      <div class="container top-titr">
        <!-- آدرس صفحه -->
        <h1 class="top-margin2 mb-3 center-align">سؤالات متداول و شرایط کسب و کار</h1>        
        <ol class="address-crumb">
          <li class="address-crumb-item">
            <a href="{{route('index')}}">خانه</a>
          </li>
          <li class="address-crumb-item active ">سؤالات متداول شرایط </li>
        </ol>
        <div class="bottom-margin2" id="accordion" role="" aria-multiselectable="true">
          @forelse ($faqs as $faq)
          <div class="card">
            <div class="card-header" role="" id="question{{$loop->iteration}}">
              <h5 class="mb-0">
                <a data-toggle="collapse" data-parent="#accordion" href="#reply{{$loop->iteration}}" aria-expanded="true" aria-controls="reply{{$loop->iteration}}">{{$faq->body}}</a>
              </h5>
            </div>
            <div id="reply{{$loop->iteration}}" class="collapse show" role="tabpanel" aria-labelledby="question{{$loop->iteration}}">
              <div class="card-body">
                {{$faq->answer}}
              </div>
            </div>
            </div>
          @empty
          <div class="card">
            سوالی وجود ندارد!
          </div>
          @endforelse
    
        </div>
      </div>
  
 
          

      <hr>
      {{-- @push('footer-scripts')
      <div class="parallax-background" >
        <img src="{{asset('frontend/background.jpg')}}" ></div>
  
      @endpush --}}
</div>
