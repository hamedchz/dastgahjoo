<div>
  @push('categoriesheader')
  @include('layouts.users.partials.underheader')
  @endpush  
  @push('styles')
  <style>
    p, .text {
       color:#fff ;
   } 

   @media (min-width: 992px) {

.top-titr{
 margin-top: 186px;

}}

@media (max-width: 502px) {

 .top-titr{
   margin-top: 80px;
 
 }}
   
 @media (max-width: 767px) {
 .inner-bg {
    padding: 40px 3px 110px 38px; 
 }}



.paginate{
  display:flex;
  justify-content: center;
  padding-top:50px;
}
</style>
  @endpush
     <!-- بدنه محتوا -->
     <div class="top-content">
      <div id="overlay"></div>
      <div class="display-align top-titr">
        <div class="col-lg-8 text center-align mx-auto">
          <h1><strong>بازار ماشین آلات نو و دسته دوم</strong></h1>
          <div class="description">
            <p><strong>{{$cat->title}}</strong></p>
          </div>
        </div>
      </div>

      <div class="inner-bg">
        <div class="container">
        @if($subcategories->count() > 0)
        @foreach ($subcategories as $sub)
        <div class="display-align">
          <div class="col-lg-6 center-align mx-auto">
            <div class="machine-category p-0">
              <div class="display-align category-row">
                <div class="col-10 right-align">
                  <p>{{$loop->iteration}}.
                     <a href="{{route('product-list',$sub->slug)}}">{{$sub->title}}</a>
                    </p>
                </div>
                <div class="col-2 right-align">
                  <p>({{count($sub->subcategoryproducts)}})</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @else
        <div class="display-align">
          <div class="col-lg-6 center-align mx-auto">
            <div class="machine-category p-0">
              <div class="display-align category-row">
                <div class="col-10 right-align">
                  <p>
                    زیر دسته ای وجود ندارد
                    </p>
                </div>
                {{-- <div class="col-2 right-align">
                  <p>({{count($sub->subcategoryproducts)}})</p>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
        @endif
    
<div class="paginate">

  {{$subcategories->links()}}
</div>
   
     
          </div>
        </div>
      </div>
         @push('footer-scripts')
      <div class="parallax-background" >
        <img src="{{asset('frontend/background.jpg')}}" ></div>
      <script>jssor_1_slider_init();</script>
      @endpush
</div>