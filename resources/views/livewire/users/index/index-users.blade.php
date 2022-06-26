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
    @push('categoriesheader')
        @include('layouts.users.partials.underheader')
    @endpush
    @push('search-header')
    @include('layouts.users.partials.index-search')
    @endpush
    <div class="container" id="resale-market">
        <div class="display-align top-pad">
          <div class="col-lg-12">
  
              <div class="hide-mobile" style="margin-bottom:30px;">
                {!!$firstPage->first_part!!}
                <div class="display-align bottom-pad">
                  @if($categoriesFirsthalf->count() > 0)
                  <div class="col-lg-6 ">
                      <div class="table table-hover table-bordered table-sm tablecat" style="display:flex;flex-direction:column;">
                        @foreach ($categoriesFirsthalf as $category )
                        <div class="col-12" style="display:flex;border-bottom:1px solid #e9ecef;padding: 0.3rem;">
                              <span style="color: #acacac;">{{$category->id}}.</span>
                              <a href="{{route('product-list',$category->slug)}}"> {{$category->title}} </a>
                              <span class="badge badge-secondary" style="margin-right: auto;">{{$category->products->count()}}</span>
                            </div>
                            @endforeach 
                          </div>
                       </div>
                       @endif
                  @if($categoriesFirsthalf->count() > 0)
                  <div class="col-lg-6 ">
                      <div class="table table-hover table-bordered table-sm tablecat" style="display:flex;flex-direction:column;">
                        @foreach ($categoriesSecondhalf as $category )
                        <div class="col-12" style="display:flex;border-bottom:1px solid #e9ecef;padding: 0.3rem;">
                              <span style="color: #acacac;">{{$category->id}}.</span>
                              <a href="{{route('product-list',$category->slug)}}"> {{$category->title}} </a>
                              <span class="badge badge-secondary" style="margin-right: auto;">{{$category->products->count()}}</span>
                            </div>
                              @endforeach
                          </div>
                       </div>
                    @endif
                </div>
       
  
              <p>
                علاوه بر این، می توانید زیر شاخه های پویا ما را نیز مرور کنید. 
                <b>اگر آنچه را که در بازار ماشین آلات دست دوم ما به دنبال آن هستید کشف نکردید، می‌توانید درخواستی را نیز ارسال کنید:</b>      
                      </p>
              <div class="col-lg-12   text center-align mx-auto">
                 <a class="btn-all btn-green" href="{{route('contact-us')}}" >ارسال درخواست استعلام</a>
              </div>
        </div>
      </div>
        <hr>
  
        <!-- قسمت آمار -->
        {{-- <div class="display-align">
          <div class="col-lg-4 bottom-margin2">
            <div class="card center-align h-100">
              <h3 class="card-header custom-group">آمار
                <i class="fas fa-chart-line" aria-hidden="true" style="color:#008fff;"></i> </h3>
           <div class="card-body">
             <ul class="list-group list-group-flush">
               <li class="list-group-item">مورد جدید ماشین آلات این هفته<strong>4303</strong> </li>
               <li class="list-group-item">بازدید کننده ماهانه تا <strong>2 میلیون.</strong> </li>
               <li class="list-group-item">فروشنده ثبت شده<strong>51,141</strong>  </li>
               <li class="list-group-item">خریدار در سراسر جهان<strong>192654</strong>  </li>
               </ul>
              </div>
            </div>
          </div>

          <!-- قسمت درباره ما -->
          <div class="col-lg-4 bottom-margin2">
            <div class="card center-align h-100">
              <h3 class="card-header custom-group"><strong>درباره ما</strong>
                <i class="fas fa-trophy" aria-hidden="true" style="color:#f0b000;"></i> </h3>
            <div class="card-body">
              <p class="card-text"> در سال 1996 به صورت آنلاین راه اندازی شد و آن را به قدیمی ترین بازار ماشین های دست دوم در سراسر جهان تبدیل کرد.
                 از آن زمان ما دائماً در تلاش هستیم تا عملکرد و تجربه بصری وب سایت خود را افزایش دهیم.</p>
            </div>
            <div class="card-footer">
              <a href="#more" class="btn-all btn-all-small btn-primary show-more">بیشتر بخوانید</a>
              </div>
            </div>
          </div>

          <!-- قسمت خبرنامه -->
          <div class="col-lg-4 bottom-margin2">
            <div class="card center-align h-100">
              <h3 class="card-header custom-group">خبرنامه
                <i class="far fa-newspaper" aria-hidden="true"></i> </h3>
           <div class="card-body">
             <p class="card-text">از سرویس خبرنامه ما استفاده کنید</p>
             <p class="card-text">بدون تعهد در خبرنامه ما مشترک شوید و لیست های جدید هفتگی را از طریق ایمیل دریافت کنید.</p>
           </div>
           <div class="card-footer">
             <a href="newsletter.html" class="btn-all btn-all-small btn-primary">اشتراک</a>
              </div>
            </div>
          </div>
        </div> --}}
  
        
        <!-- قسمت حراج ها -->
        {{-- <div class="display-align">
          <div class="col-lg-4 bottom-margin2">
            <div class="card h-100">
  
              <h3 class="card-header custom-group center-align">حراج ها
                <i class="far fa-calendar-alt" aria-hidden="true" style="color:#e52d00;"></i> </h3>
           <div class="card-body">
             <p class="card-text center-align" style="font-size: 1.2em;"><strong>7821</strong>
               <a href="#">موارد حراج</a></p>
                <p class="card-text" style="font-size: 0.8em; padding: 0.2em 0;">
                   <strong>17.03.22 11:03</strong> <a href="#" target="TOP" rel="nofollow">Terex / Donati DMK 1</a><br>
                   <strong>17.03.22 19:03</strong> <a href="#" target="TOP" rel="nofollow">CTS Fahrzeug Dachsys</a><br>
                   <strong>22.03.22 14:03</strong> <a href="#" target="TOP" rel=" nofollow">Posiflex XT-5315 Mul</a><br>
                   <a href="#" rel="nofollow">موارد حراج بیشتر ...</a>
             </p>
             <p class="card-text center-align" style="font-size: 1.2em;"><strong><a href="#">تقویم مزایده ها</a>
             </strong>
            </p>
             <p class="card-text" style="font-size: 0.8em; padding: 0.2em 0;">
                   <a href="#">تاریخ های بیشتر حراج ...</a><br>
                    </p>
              </div>
            </div>
          </div> --}}
  
        <!-- قسمت مجله -->

          {{-- <div class="col-lg-4 bottom-margin2">
            <div class="card center-align h-100">
              <h3 class="card-header custom-group"><strong>مجله شرکت</strong> 
              </h3>
              <div class="card-body">
                <div class="center-align">
                  <a href="magazin.html">
                    <img class="img-fluid" style="width: 160px; height: 240px;" src="{{asset('frontend/img/frontcovermagazine.jpg')}}" alt=""></a>
                </div>
              </div>
            </div>
          </div> --}}

                  <!-- قسمت پرداخت ایمن -->

          {{-- <div class="col-lg-4 bottom-margin2">
            <div class="card center-align h-100">
              <h3 class="card-header custom-group">پرداخت سپرده ایمن 
                <img alt="check" src="{{asset('frontend/img/escrow-verified.png')}}" height="26" width="26">
              </h3>
              <div class="center-align mt-3">
                <p style="font-size: 0.8em;">اکنون می توان پرداخت را به صورت ایمن از طریق سرویس امانی یکپارچه ما انجام داد.</p>
              </div>
              <div class="right-align">
                <p style="font-size: 0.8em;" class="mr-3">
                  <strong>مزایا:</strong>
                </p>
                <ul>
                  <li><p style="font-size: 0.8em;">حداکثر امنیت برای خریداران و فروشندگان</p></li>
                  <li><p style="font-size: 0.8em;">محافظت در برابر ورشکستگی شریک تجاری</p></li>
                  <li><p style="font-size: 0.8em;">حفظ وجوه شما در حساب های امانی محافظت شده در برابر ورشکستگی</p></li>
                </ul>
              </div>
              <div class="card-footer">
                <a href="escrow-info.html" class="btn-all btn-all-small btn-primary" target="_blank">جزئیات بیشتر</a>
                 </div>
            </div>
          </div> --}}
        {{-- </div> --}}
  
         <hr>

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

      <div class="container des-text">
        <div class="display-align">
          <div class="col-md-12 mt-3">
            {!!$firstPage->second_part!!}
          </div>
        </div>
      </div>
  
        {{-- <!-- قسمت نظرات -->
        <div id="comments" class="display-align bottom-margin2" style="width:100%;">
          <div class="col-md-8 show-more" id="more">
            <div data-ride="carousel">
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item align-middle customer_quote">
          <blockquote>
          <div class="wrappers">
            <div class="left">
              <img class="user-comment-img" src="{{asset('frontend/https://www.resale.de/flaggen/nl.gif')}}" alt="">
            </div>
            <div class="right">
              <p> بله، ما آن را از طریق وب سایت شما فروختیم. این در مورد دهمین دستگاهی است که مستقیماً از طریق وب سایت شما فروخته ایم.</p>         
            </div>
          </div>
          </blockquote>
        </div>
      <div class="carousel-item align-middle customer_quote">
          <blockquote>
          <div class="wrappers">
            <div class="left">
              <img class="user-comment-img" src="{{asset('frontend/https://www.resale.de/flaggen/au.gif')}}" alt="">
            </div>
            <div class="right">
              <p> نتایج بسیار خوب، پرس و جوهای زیاد، برخی فروش ها.</p>
              <small>
             </small>
            </div>
          </div>
          </blockquote>
        </div>
      <div class="carousel-item align-middle customer_quote">
          <blockquote>
          <div class="wrappers">
            <div class="left">
              <img class="user-comment-img" src="{{asset('frontend/https://www.resale.de/flaggen/it.gif')}}" alt="">
            </div>
            <div class="right">
              <p> تعداد مشتریانی که در عرض چند روز به آگهی آزمایشی ما پاسخ دادند باورنکردنی است. سیستم شما واقعاً یک ابزار فروش عالی است!!</p>
            </div>
          </div>
          </blockquote>
        </div>
      <div class="carousel-item align-middle customer_quote">
          <blockquote>
          <div class="wrappers">
            <div class="left">
              <img class="user-comment-img" src="{{asset('frontend/https://www.resale.de/flaggen/fr.gif')}}" alt="">
            </div>
            <div class="right">
              <p> من این مجموعه را با وب سایت شما به هلند فروخته ام</p>
            </div>
          </div>
          </blockquote>
        </div>
      <div class="carousel-item align-middle customer_quote">
          <blockquote>
          <div class="wrappers">
            <div class="left">
              <img class="user-comment-img" src="{{asset('frontend/https://www.resale.de/flaggen/nl.gif')}}" alt="">
            </div>
            <div class="right">
              <p> مایلیم از فروشگاه ما یک مکان ملاقات بسیار موفق برای GOS با بسیاری از مشتریان جدید تا کنون تشکر کنیم.</p>
            </div>
          </div>
          </blockquote>
        </div>
      <div class="carousel-item align-middle customer_quote">
          <blockquote>
          <div class="wrappers">
            <div class="left">
              <img class="user-comment-img" src="{{asset('frontend/https://www.resale.de/flaggen/se.gif')}}" alt="">
            </div>
            <div class="right">
              <p> با تشکر از یک وب سایت بسیار خوب، ما چند هفته است که آن را با نتایج فوق العاده 
                آزمایش کرده ایم، قبلاً برخی از تجهیزات را فروخته ایم و سؤالات زیادی در مورد تجهیزات دیگر داریم.</p>     
            </div>
          </div>
          </blockquote>
        </div>
      <div class="carousel-item align-middle customer_quote">
          <blockquote>
          <div class="wrappers">
            <div class="left">
              <img class="user-comment-img" src="{{asset('frontend/https://www.resale.de/flaggen/fr.gif')}}" alt="">
            </div>
            <div class="right">
              <p> زمان برده است اما همه چیز خوب است</p>
            </div>
          </div>
          </blockquote>
        </div>
      <div class="carousel-item align-middle customer_quote">
          <blockquote>
          <div class="wrappers">
            <div class="left">
              <img class="user-comment-img" src="{{asset('frontend/https://www.resale.de/flaggen/se.gif')}}" alt="">
            </div>
            <div class="right">
              <p> دستگاه من بعد از دو روز فروخته شد. بسیار راضی.</p>
            </div>
          </div>
          </blockquote>
        </div>
      <div class="carousel-item align-middle customer_quote">
          <blockquote>
          <div class="wrappers">
            <div class="left">
              <img class="user-comment-img" src="{{asset('frontend/https://www.resale.de/flaggen/nl.gif')}}" alt="">
            </div>
            <div class="right">
              <p> دستگاه 35 را از طریق وب سایت فروش مجدد فروخت.
                گرانولاتور CMB 90 KW.</p>
            </div>
          </div>
          </blockquote>
        </div>
      <div class="carousel-item align-middle customer_quote">
          <blockquote>
          <div class="wrappers">
            <div class="left">
              <img class="user-comment-img" src="{{asset('frontend/https://www.resale.de/flaggen/nl.gif')}}" alt="">
            </div>
            <div class="right">
              <p> فروش مجدد ثابت کرده است که یک بازار B2B بسیار قدرتمند است.</p>
            </div>
          </div>
          </blockquote>
        </div>
      <div class="carousel-item align-middle customer_quote active">
          <blockquote>
          <div class="wrappers">
            <div class="left">
              <img class="user-comment-img" src="{{asset('frontend/https://www.resale.de/flaggen/us.gif')}}" alt="">
            </div>
            <div class="right">
              <p> سایت جالب</p>
            </div>
          </div>
          </blockquote>
        </div>
      <div class="carousel-item align-middle customer_quote">
          <blockquote>
          <div class="wrappers">
            <div class="left">
              <img class="user-comment-img" src="{{asset('frontend/https://www.resale.de/flaggen/nl.gif')}}" alt="">
            </div>
            <div class="right">
              <p> این باعث می شود حداقل بیست و پنجمین دستگاه به دلیل این وب سایت فروخته شود</p>
            </div>
          </div>
          </blockquote>
        </div>
      <div class="carousel-item align-middle customer_quote">
          <blockquote>
          <div class="wrappers">
            <div class="left">
              <img class="user-comment-img" src="{{asset('frontend/https://www.resale.de/flaggen/us.gif')}}" alt="">
            </div>
            <div class="right">
              <p> خدمات خوب</p>
            </div>
          </div>
          </blockquote>
        </div>
      <div class="carousel-item align-middle customer_quote">
          <blockquote>
          <div class="wrappers">
            <div class="left">
              <img class="user-comment-img" src="{{asset('frontend/https://www.resale.de/flaggen/in.gif')}}" alt="">
            </div>
            <div class="right">
              <p> با تشکر</p>
            </div>
          </div>
          </blockquote>
        </div>
      <div class="carousel-item align-middle customer_quote">
          <blockquote>
          <div class="wrappers">
            <div class="left">
              <img class="user-comment-img" src="{{asset('frontend/https://www.resale.de/flaggen/fr.gif')}}" alt="">
            </div>
            <div class="right">
              <p> وب سایت بسیار خوبی است، من سوالات زیادی از طریق  دارم.
                با تشکر</p>
            </div>
          </div>
          </blockquote>
        </div>
      <div class="carousel-item align-middle customer_quote">
          <blockquote>
          <div class="wrappers">
            <div class="left">
              <img class="user-comment-img" src="{{asset('frontend/https://www.resale.de/flaggen/ru.gif')}}" alt="">
            </div>
            <div class="right">
              <p> ماشین تراش SKJ-12 از طریق تبلیغات  فروخته شد.</p>
            </div>
          </div>
          </blockquote>
        </div>
       </div>
            </div>
          </div>
          <div class="col-md-4" id="register-btn">
            <a class="btn-all btn-green" href="{{route('membership')}}">عضویت</a>
          </div>
        </div> --}}
      </div>
      @push('footer-scripts')
      <script>jssor_1_slider_init();</script>
      @endpush
</div>
