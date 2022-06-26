<div>
  @push('header-scripts')
  <script src="/frontend/js/jssor.slider.min.js" type="text/javascript"></script>
  <script type="text/javascript">
      jssor_1_slider_init = function() {
  
          var jssor_1_SlideshowTransitions = [
            {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
          ];
  
          var jssor_1_options = {
        $FillMode: 4,
        $AutoPlay: 1,
        $Cols: 1,
        $Align: 0,
        $SlideshowOptions: {
          $Class: $JssorSlideshowRunner$,
          $Transitions: {$Duration:2200,x:1,$Easing:{$Left:$Jease$.$InOutQuart},$Brother:{$Duration:2200,x:-1,$Easing:{$Left:$Jease$.$InOutQuart}}},
          $TransitionsOrder: 1
        },
        $ArrowNavigatorOptions: {
          $Class: $JssorArrowNavigator$
        },
        $ThumbnailNavigatorOptions: {
          $Class: $JssorThumbnailNavigator$,
          $Cols: 1,
          $Orientation: 2,
          $Align: 0,
          $NoDrag: true
        }
      };
          var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
  
          var MAX_WIDTH = 1110;
  
          function ScaleSlider() {
              var containerElement = jssor_1_slider.$Elmt.parentNode;
              var containerWidth = containerElement.clientWidth;
  
              if (containerWidth) {
  
                  var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);
  
                  jssor_1_slider.$ScaleWidth(expectedWidth);
              }
              else {
                  window.setTimeout(ScaleSlider, 30);
              }
          }
  
          ScaleSlider();
  
          $Jssor$.$AddEvent(window, "load", ScaleSlider);
          $Jssor$.$AddEvent(window, "resize", ScaleSlider);
          $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
      };
  </script>
  @endpush
  @push('styles')
  <style>
      
    .banner {
      position: relative;
      margin: 0px auto 0px;
      width: 1110px;
      height: 150px;
      overflow: hidden;
      border: 1px solid rgb(0, 69, 142);
      background-color: white;
      text-align: center;
      vertical-align: middle;
    }
    
    .bottom {
        position: absolute;
        bottom: 0px;
        width: 100%;
        background-color: #888;
        color: #ffffff;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }
  
    @media (max-width: 1200px) {
  
  .logo-brand{
  display: none;
  
    }
  }
  
  
  @media (min-width: 576px){
  .container {
    width: 100%;
  
  }}
  
  @media (max-width: 526px) {
  
  .city-brand{
  display: none;
    }
  }
  
  @media (max-width: 364px) {
  
  .country-brand{
  display: none;
    }
  }
  
    </style>
  @endpush
  <div class="top-content">
    <div id="overlay"></div>
    <div class="">
      <div class="container">
        <div class="display-align top-titr">
          <div class="col-lg-8  text center-align mx-auto">
            <h1><strong>لیست فروشندگان</strong>
            </h1>
            <h2 class="center-align" style="font-size: 32px;">
              <strong>
              <span class="text-danger"></span>
            </strong>
          </h2 >
            <div class="description">
              <p>
                شرکت خود را تبلیغ کنید: به سادگی 
                <a target="TOP" class="btn-all btn-all-small btn-green" href="{{route('register')}}">ثبت نام کنید</a>
                 به عنوان فروشنده لوگو و مشخصات شرکت خود را آپلود کنید.        </p>
            </div>
          </div>
        </div>
  
  


  
        <div class="display-align">
          <div class="col-lg-8  text center-align mx-auto">
            <h2>
              <strong style="color: white;font-weight: 500;font-size: 20px;">نتایج  لیست فروشندگان ({{$dealers->count()}})</strong>
            </h2>
          </div>
        </div>
                  <div style="background-color: #fff;">
             <div style="background-color: #fff;">
      <!-- بنر تبلیغات -->
      @if($advertises->count() > 0)
              <div id="jssor_1" >
          <div class="slides" data-u="slides" >
            @foreach($advertises as $advertise)
            <div >
                <img data-u="image" src="{{asset($advertise->banner)}}" />
                <div data-u="thumb">{{$advertise->description}}</div>
            </div>
            @endforeach
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
      </div>
      @endif
  <!-- آخر اسلایدر تبلیغات -->
        
  <!-- جدول اطلاعات شرکتها -->
  <!-- تیتر جدول -->
  <table class="table table-striped bg-white">
    <thead class="thead-dark center-align">
      <tr>
        <th scope="col">نام</th>
        <th scope="col" class="city-brand">شهر</th>
        <th scope="col" class="country-brand">کشور</th>
        <th scope="col" class="logo-brand">لوگوی شرکت</th>
      </tr>
    </thead>
    <tbody>
      {{-- @foreach ($dealers as $dealer)
      <tr class="company-cells">
      <td class="company-brand">
        <a  target="TOP" name="" href="{{$dealer->slug}}">{{$dealer->user->name}}</a>
        </td>
        <td class="country-brand"> {{$dealer->province->title}} </td>
        <td class="city-brand">{{$dealer->city->title}}</td>
        <td class="logo-brand"><a target="TOP" name="" href="{{$dealer->slug}}" >
          <img src="{{asset('storage/logos/'.$dealer->logo)}}" alt="" align="middle" border="0"></a></td>
      </tr>
    @endforeach --}}
  <!-- خانه های جدول -->
        @forelse ($dealers as $dealer)
          <tr class="company-cells">
           <td class="company-brand ">
             <a  target="TOP" name="" href="{{route('vendor-detail',$dealer->slug)}}">{{$dealer->user->name}}re</a>
            </td>
             <td class="city-brand">{{$dealer->city->title}}</td>
             <td class="country-brand"> {{$dealer->province->title}} </td>
             <td class="logo-brand"><a target="TOP" name="" href="{{route('vendor-detail',$dealer->slug)}}" >
               <img src="{{asset('storage/logos/'.$dealer->logo)}}" alt="" align="middle" border="0"></a></td>
          @empty
          <td  align="center" colspan="4">فروشنده ای وجود ندارد</td>     
          </tr>
          @endforelse
         



    
 
    </tbody>
  </table>
   </div>
    </div>
  </div>
    @push('footer-scripts')
    <script>jssor_1_slider_init();</script>
    @endpush
    @push('footer-scripts')
    <div class="parallax-background" >
      <img src="{{asset('frontend/background.jpg')}}" ></div>

    @endpush
</div>
