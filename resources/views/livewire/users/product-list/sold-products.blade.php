<div>
    @push('categoriesheader')
    @include('layouts.users.partials.underheader')
    @endpush  
    @push('styles')
    <style>

        @media  (max-width: 991px) {
        
        .ribbon-wrapper-red {
          padding-top: 10px;
          padding-bottom: 150px;
        
        }}
        
        @media (min-width: 992px){
        .top-titr {
            margin-top: 26px;
        }}
        
        @media (max-width: 502px){
        .top-titr {
            margin-top: 39px;
        }}
        
        </style>
    @endpush
    
    <div>
        <div id="overlay"></div>
          <div class="container " id="page-container">
            <div class="inner-block bg-white">
            <div class="ads-search bottom-pad2" style="background-color: #e9ecef;">
              <header class="simple-search-header" style="min-height: 120px;">
         <div style="background-color: #fff;">
      
   <!-- بنر تبلیغات -->
   {{-- <div id="jssor_1" >
    <div class="slides" data-u="slides" >
        <div >
            <img data-u="image" src="img/logoPagus.jpg" />
            <div data-u="thumb">اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="img/bannerhoechsmann.gif" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="img/bannerIVW.jpg" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="img/logoMaynards.gif" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="img/logoUSEDMarket.jpg" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="img/banner_hamburg-machinery.jpg" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="img/logoKnauff.gif" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="img/bannerREWA.jpg" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="img/banner_dataTec.gif" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="img/bannerEPS.jpg" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
     
    </div>
    <!-- متن تبلیغات اسلایدر -->
    <div class="jssor-thumbnavigator" data-u="thumbnavigator" >
        <div data-u="slides">
            <div class="jssor-prototype" data-u="prototype" >
                <div class="jssor-thumbnailtemplate" data-u="thumbnailtemplate" ></div>
            </div>
        </div>
    </div>
    <!-- فلش های اسلایدر -->
    <div data-u="arrowleft" class="jssora061" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
      <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
          <path class="a" d="M11949,1919L5964.9,7771.7c-127.9,125.5-127.9,329.1,0,454.9L11949,14079"></path>
      </svg>
  </div>
  <div data-u="arrowright" class="jssora061" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
      <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
          <path class="a" d="M5869,1919l5984.1,5852.7c127.9,125.5,127.9,329.1,0,454.9L5869,14079"></path>
      </svg>
  </div>
</div> --}}
<!-- آخر اسلایدر تبلیغات -->
 </div>

             <div class="display-align top-titr mb-3">
               <div class="col-lg-8 text center-align mx-auto">
                <span class="text-muted" style="font-weight: 400;"> </span>
                 <span class="text-muted" style="font-weight: 600;">  </span>
                  <h1 class="center-align" style="font-size: 24px;">
                    <span class="text-danger"></span>
                     <span class="text-muted" style="font-weight: 600;">  محصولات فروخته شده </span>
                    </h1>
                   </div>         
                      </div>
      
            
              </header>
            </div>
      
            <!-- آدرس صفحه -->
        <nav aria-label="breadcrumb" class="">
          <ol class="address-crumb" style="border-radius: 0">
            <li class="address-crumb-item"><a href="{{route('index')}}">
               <i class="fa fa-home" aria-hidden="true">
               </i>
              </a>
            </li>
         
            <li class="address-crumb-item active" aria-current="page">
              <span>محصولات فروخته شده </span>
            </li>
           </ol>
        </nav>
           
        
        <div class="container top-margin2">
      
        
        </div>
      
        <hr>
      
      <div class="top-margin2">
        <div class="display-align">
          <div class="col-12 mx-auto">
        <div class="display-align mb-3">
          <div class="col-lg-8 text center-align mx-auto">
            <h2 style="font-size: 22px;">
              <span class="text-danger"> محصولات فروخته شده </span> 
             </h2>
          </div>
        </div>

        <!-- توضیحات -->
       @foreach($products as $product)
        <div class="container top-group" style="background-color: white;">
          <div class="display-align">
            <div class="col-lg-7 machine-top py-1">
              <span class="category-code">
                <a href="#" style="color: #5faeff;"> </a>
              </span>
            </div>
            <div class="col-lg-5 machine-top py-1">
              <span class="category-code">تاریخ: {{date('d-m-Y', strtotime($product->created_at))}}</span>
              <span style="float: left;">
                <a href="#" title=""  class="btn-all btn-light btn-all-small openPopup" style="font-weight: 600; font-size: 0.8rem;">
                  <i class="fas fa-star" style="color: #f0b000;"></i> 
                  کد دستگاه: {{$product->itemNo}} </a>
                </span>
                </div>
            {{-- <div class="col-lg-5 machine-top py-1">
              <span class="category-code">تاریخ: {{$product->created_at}}</span>
              <span style="float: left;">
                <a href="#" title=""  class="btn-all btn-light btn-all-small openPopup" style="font-weight: 600; font-size: 0.8rem;">
                  <i class="fas fa-star" style="color: #f0b000;"></i> 
                  {{$product->itemNo}}  کد دستگاه: </a>
                </span>
                </div> --}}
          </div>
          <div class="display-align top-group-verified">
                   <div class="ribbon-wrapper-red">
                <div class="ribbon-red">
                  <span>فروشنده</span>
                  <span>تایید شده</span>
                </div>
              </div>
                  <div class="col-md-12 col-lg-3">
              <div class="display-align picture-box">
                <div class="col-sm center-align fill">
                  <div class="picture">
                    <a href="{{route('product.detail',$product->id)}}">
                      <img src="{{asset($product->images[0]->image)}}" >                
                    </a>
    
                    <div class="bottom-center">
                      <button class="btn-all btn-all-small bg-danger" style="margin: 10px; ">   
                     <a href="" class="text-white">
                         فروخته شده
                       </a>
                      </button>
    
                      {{-- <a href="tel:{{$product->vendor->phone}}" class="btn-all btn-all-small btn-green text-white" style="margin: 10px;font-weight: 600;">
                        <i class="fas fa-phone"></i>
                      </a>    --}}
                                   
                    </div>
                  </div>
                </div>
              </div>
              <div class="display-align ver-pad my-auto">
                <div class=" center-align mx-auto my-auto">
                  <div class="production-year">
                      <i class="far fa-calendar-alt"></i>
                      <span>
                        سال تولید:
                      </span>
                      <span>
                        {{$product->year_of_manufacture}} 
                      </span>
                    </div>
                    <h6>
                      @if($product->isStock == 1)
                        نو
                      @else
                      دسته دوم
                      @endif 
                    </h6>
                </div>
              </div>
            </div>
    
            <div class="col-lg-9 col-md-12 ">
              <div class="display-align pr-2">
                  <div class="col-sm col-mobile ver-pad center-align-mobile">
                    <a href="{{route('product.detail',$product->id)}}">
                       <p class="mb-0" style="font-size: 20px;">
                        {{-- <b>OSTAS</b> 3R OHS 2570 x 25/30</p> --}}
                        {{$product->name}}
                       <b></b>
                       </a>
                </div>
              </div>
              <div class="display-align bottom-pad pr-2" style="line-height: 2;">
                <div class="col-sm-8 col-mobile right-align">
                  <div class="owner" style="font-size: 0.8rem; font-weight: 650;">
                    <span class="badge" style="background-color: #e35d6a; color: white;">رتبه بالا</span>
                     فروشنده: 
                     <img  style="height: 12px;"> {{$product->vendor->user->name}} 
               </div>
                  <div class="location" style="font-size: 0.9rem;">
               <b>موقعیت: {{$product->location}}</b>   
             </div>
                </div>
                <div class="col-sm-4 col-mobile right-align">
                  <div class="price">
                    {{-- <button class="btn-all btn-primary mazane">   
                      <a href="{{route('dealer-inquiry',$product->itemNo)}}" class="text-white">
                         درخواست مظنه
                       </a>
                      </button> --}}
                  </div>
                </div>
              </div>
    
              <div class="display-align hor-pad">
                <div class="col-sm col-mobile ver-pad">
                  <p class="prod-text">
                    {!!$product->description!!}                    
                   </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        
          {{$products->links()}}

       
            </div>
          </div>
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
