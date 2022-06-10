<div>
    @push('categoriesheader')
    @include('layouts.users.partials.underheader')
    @endpush  
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
    
          /*#region responsive code begin*/
    
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
          /*#endregion responsive code end*/
      };
    </script>
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
        }
        .inner-block{
          padding-top: 126px;
        }

      }
        
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
    

   <!-- بنر تبلیغات -->
   {{-- <div id="jssor_1" >
    <div class="slides" data-u="slides" >
        <div >
            <img data-u="image" src="{{asset('frontend/img/logoPagus.jpg')}}" />
            <div data-u="thumb">اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src={{asset('frontend/"img/bannerhoechsmann.gif')}}" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="{{asset('frontend/img/bannerIVW.jpg')}}" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="{{asset('frontend/img/logoMaynards.gif')}}" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="{{asset('frontend/img/logoUSEDMarket.jpg')}}" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="{{asset('frontend/img/banner_hamburg-machinery.jpg')}}" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="{{asset('frontend/img/logoKnauff.gif')}}" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="{{asset('frontend/img/bannerREWA.jpg')}}" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="{{asset('frontend/img/banner_dataTec.gif')}}" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="{{asset('frontend/img/bannerEPS.jpg')}}" />
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
    </div> --}}
    <!-- فلش های اسلایدر -->
    {{-- <div data-u="arrowleft" class="jssora061" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
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

             <div class="display-align top-titr mb-3">
               <div class="col-lg-8 text center-align mx-auto">
                <span class="text-muted" style="font-weight: 400;">سطح دسته اول: </span>
                 <span class="text-muted" style="font-weight: 600;">رده 100 </span>
                  <h1 class="center-align" style="font-size: 24px;">
                    <span class="text-danger"></span>
                     <span class="text-muted" style="font-weight: 600;"> مورد استفاده برای فروش</span>
                    </h1>
                   </div>         
                      </div>
      
              <form action="{{route('user.search')}}" method="get" >
                <input type="hidden" name="" value="">
                <input type="hidden" name="" value="">
                <input type="hidden" name="" value="">
                <input type="hidden" name="" value="">
                <input type="hidden" name="" value="">
                <input type="hidden" name="" value="">
              <div class="container search-bar">
                <div class="card" style="background-color: rgba(95, 174, 255, 0.2); margin-top: 10px;">
                  <div class="card-body" style="padding: 0.5rem;">
                    <div class="input-group">
                      <input class="form-control" placeholder="جستجو در دسته " value="" maxlength="40" name="name" type="text" required="" title="">
      
                      <select class="custom-select" name="category" style="border-radius: 0px; width: 120px;">
                        <option disabled value="" selected="selected">دسته بندی</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                      </select>
                      <span class="input-group-btn">
                        <button id="search-button" class="btn-all btn-primary" type="submit" name="">
                           <i class="fas fa-search"></i>
                            <span class="search-word">جستجو</span>
                          </button>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              </form>
              </header>
            </div>
      
            <!-- آدرس صفحه -->
        {{-- <nav aria-label="breadcrumb" class="">
          <ol class="address-crumb" style="border-radius: 0">
            <li class="address-crumb-item"><a href="{{}}">
               <i class="fa fa-home" aria-hidden="true">
               </i>
              </a>
            </li>
            <li class="address-crumb-item"><a href="search.html">
              <span class="cut-text"></span>
            </a>
          </li>
            <li class="address-crumb-item active" aria-current="page">
              <span>انتخاب زیر مجموعه ها</span>
            </li>
           </ol>
        </nav> --}}
           
        
        <div class="container top-margin2">
      
          {{-- <div class="display-align hide-mobile my-3">
            <div class="col-12 mx-auto center-align top-margin">
              <h3 class="center-align product-title2"><span class="text-muted">زیر مجموعه ها</span>
                 <span> </span>
                </h3>
            </div>
          </div> --}}
      
      
        {{-- <table class="table table-hover table-sm tablecat">
          <thead>
            <tr>
              <th>شماره دسته بندی</th>
              <th>سطح دسته دوم</th>
              <th class="right-align">نتایج</th>
           </tr>
          </thead>
          <tbody>
                <tr class="gray-bg-plus">
                    <td>
                      <span style="color: #acacac;" class="product-title">110</span>
                    </td>
                    @forelse ($category->parents as $category)
                    <li class="list-group-item">
                      <a href="search.html"><b></a> ({{$category->subproducts->count()}})</li>
                    @empty
                  
                    @endforelse
                    <td>
                      <span class="product-title">
                        <a href="search.html">{{$category}}</a>
                      </span>
                      <button class="btn-all btn-all-small plus-icon-btn" type="button" data-toggle="collapse" data-target="#category-coll-110" aria-expanded="false" aria-controls="category-coll-110">
                         <i class="fas fa-plus"></i> 
                      </button>

                      <div class="collapse py-1" id="category-coll-110">
                        <ul class="list-group">
                          <li class="list-group-item">
                            <a href="search.html">لوازم جانبی</a> (93)</li>
                            <li class="list-group-item">
                              <a href="search.html">سرهای زاویه</a> 13)</li>
                            <li class="list-group-item">
                              <a href="search.html">جدول زاویه</a> (10)</li>
                            <li class="list-group-item">
                              <a href="search.html">نوار تغذیه</a> (8)</li>
                            <li class="list-group-item">
                              <a href="search.html">باربرها</a> (30)</li>
                            <li class="list-group-item">
                              <a href="search.html" rel=""nofollow""> بیشتر</a></li>                                         
                        </ul>
                      </div>
                    </td>
                    <td class="right-align">
                      <span class="badge badge-secondary product-title2">1,415</span>
                    </td>
                </tr>

                <tr>
                    <td>
                      <span style="color: #acacac;" class="product-title">112</span>
                    </td>

                    <td>
                      <span class="product-title">
                        <a href="search.html">ماشین آلات برش و حباب دنده</a>
                      </span>
                      <button class="btn-all btn-all-small plus-icon-btn" type="button" data-toggle="collapse" data-target="#category-coll-112" aria-expanded="false" aria-controls="category-coll-112">
                        <i class="fas fa-plus"></i>
                      </button>
                      <div class="collapse py-1" id="category-coll-112">
                        <ul class="list-group">
                          <li class="list-group-item">
                            <a href="search.html">دستگاه های برش دنده</a> (5)</li>
                          <li class="list-group-item">
                            <a href="search.html">ماشین‌های دنده تخلیه</a> (3)</li>
                          <li class="list-group-item">
                            <a href="search.html">سنگ زنی کناره های چرخ دنده ماشین ها</a> (2)</li>
                          <li class="list-group-item">
                            <a href="search.html">ماشین‌های سنگ‌زنی چرخ دنده</a> (13)</li>
                          <li class="list-group-item">
                            <a href="search.html">ماشین‌های حباب چرخ دنده</a> (37)</li>
                          <li class="list-group-item">
                            <a href="search.html">دستگاه های فرز چرخ دنده</a> (8)</li>
                         <li class="list-group-item">
                           <a href="search.html" rel=""nofollow""> بیشتر</a> (264)</li>
                        </ul>
                      </div>
                    </td>

                    <td class="right-align">
                      <span class="badge badge-secondary product-title2">386</span>
                    </td>
                </tr>

                <tr>
                    <td>
                      <span style="color: #acacac;" class="product-title">104</span>
                    </td>
                    <td>
                      <span class="product-title">
                        <a href="search.html">ماشین های سنگ زنی</a>
                      </span>
                      <button class="btn-all btn-all-small plus-icon-btn" type="button" data-toggle="collapse" data-target="#category-coll-104" aria-expanded="false" aria-controls="category-coll-104">
                        <i class="fas fa-plus"></i>
                      </button>
                      <div class="collapse py-1" id="category-coll-104">
                        <ul class="list-group">
                          <li class="list-group-item">
                            <a href="search.html">ماشین های برش ساینده</a> (4)</li>
                            <li class="list-group-item">
                              <a href="search.html">ماشین های پولیش خودکار</a> (4)</li>
                            <li class="list-group-item">
                              <a href="search.html"> ماشین آلات سنگ زنی و لپینگ</a> (1)</li>
                            <li class="list-group-item">
                              <a href="search.html">دستگاه آسیاب نواری</a> (58)</li>
                            <li class="list-group-item">
                              <a href="search.html"> ماشین های سنگ زنی تیغه اره</a> (2)</li>
                          <li class="list-group-item">
                            <a href="search.html" rel=""nofollow""> بیشتر</a></li>
                       </ul>
                      </div>
                    </td>

                    <td class="right-align">
                      <span class="badge badge-secondary product-title2">2,433</span>
                    </td>
                </tr>

                <tr>
                    <td><span style="color: #acacac;" class="product-title">102</span>
                    </td>
                    <td>
                      <span class="product-title">
                        <a href="search.html">ماشین های تراش</a></span>
                      <button class="btn-all btn-all-small plus-icon-btn" type="button" data-toggle="collapse" data-target="#category-coll-102" aria-expanded="false" aria-controls="category-coll-102">
                        <i class="fas fa-plus"></i>
                      </button>
                      <div class="collapse py-1" id="category-coll-102">
                        <ul class="list-group">
                          <li class="list-group-item">
                            <a href="search.html">اتوماتیک (تراش ) برای میله ها</a> (5)</li>
                          <li class="list-group-item">
                            <a href="search.html">ماشین تراش برای مکانیک دقیق نیمکت  </a> (19)</li>
                          <li class="list-group-item">
                            <a href="search.html">ماشین های چرخ و فلک تراشکاری (تراش)</a> (56)</li>
                          <li class="list-group-item">
                            <a href="search.html"> ماشین های تراش مرکز درایو</a> (1)</li>
                          <li class="list-group-item">
                            <a href="search.html" rel=""nofollow""> بیشتر</a></li>
                        </ul>
                      </div>
                    </td>

                    <td class="right-align">
                      <span class="badge badge-secondary product-title2">3,139</span>
                    </td>
                </tr>
                <tr>
      
                    <td>
                      <span style="color: #acacac;" class="product-title">103</span>
                    </td>
                    <td>
                      <span class="product-title">
                        <a href="search.html">ماشین های فرز</a>
                      </span>
                      <button class="btn-all btn-all-small plus-icon-btn" type="button" data-toggle="collapse" data-target="#category-coll-103" aria-expanded="false" aria-controls="category-coll-103">
                        <i class="fas fa-plus"></i>
                      </button>
                      <div class="collapse py-1" id="category-coll-103">
                        <ul class="list-group">
                          <li class="list-group-item">
                            <a href="search.html">ماشین های فرز تخت</a> (144)</li>
                            <li class="list-group-item">
                              <a href="search.html">ماشین های فرز تخت  </a> (49)</li>
                            <li class="list-group-item">
                              <a href="search.html">مراکز فرز </a> (203)</li>
                            <li class="list-group-item">
                              <a href="search.html">دستگاه های فرز </a> (196)</li>
                            <li class="list-group-item">
                              <a href="search.html">ماشین های فرز پورتال  </a> (27)</li>
                          <li class="list-group-item">
                            <a href="search.html" rel=""nofollow""> بیشتر</a></li>
                        </ul>
                      </div>
                    </td>

                    <td class="right-align">
                      <span class="badge badge-secondary product-title2">2,241</span></td>
                </tr>
                <tr>
      
                    <td>
                      <span style="color: #acacac;" class="product-title">109</span>
                    </td>
                    <td>
                      <span class="product-title">
                        <a href="search.html">دیگر ماشین آلات فلزکاری</a></span>
                      <button class="btn-all btn-all-small plus-icon-btn" type="button" data-toggle="collapse" data-target="#category-coll-109" aria-expanded="false" aria-controls="category-coll-109">
                        <i class="fas fa-plus"></i>
                      </button>
                      <div class="collapse py-1" id="category-coll-109">
                        <ul class="list-group">
                          <li class="list-group-item">
                            <a href="search.html">چاپگرهای سه بعدی</a> (3)</li>
                          <li class="list-group-item">
                            <a href="search.html">جدول مونتاژ</a> (23)</li>
                          <li class="list-group-item">
                            <a href="search.html">ماشین های متعادل کننده</a> (11)</li>
                          <li class="list-group-item">
                            <a href="search.html">نوار تغذیه</a> (26)</li>
                          <li class="list-group-item">
                            <a href="search.html">ماشین آلات خمکاری</a> (27)</li>
                          <li class="list-group-item">
                            <a href="search.html">روی دنده مخروطی ماشین‌ها</a> (1)</li>
                          <li class="list-group-item">
                            <a href="search.html" rel=""nofollow""> بیشتر</a></li>
                       </ul>
                      </div>
                    </td>

                    <td class="right-align">
                      <span class="badge badge-secondary product-title2">10,216</span>
                    </td>
                </tr>
                <tr>
      
                    <td>
                      <span style="color: #acacac;" class="product-title">106</span>
                    </td>
                    <td>
                      <span class="product-title">
                        <a href="search.html">ماشین پرس</a></span>
                      <button class="btn-all btn-all-small plus-icon-btn" type="button" data-toggle="collapse" data-target="#category-coll-106" aria-expanded="false" aria-controls="category-coll-106">
                        <i class="fas fa-plus"></i>
                      </button>
                      <div class="collapse py-1" id="category-coll-106">
                        <ul class="list-group">
                          <li class="list-group-item">
                            <a href="search.html">پرس های توپ</a> ( 2)</li>
                          <li class="list-group-item">
                            <a href="search.html">پرس های غیرعادی رومیزی</a> (3)</li>
                          <li class="list-group-item">
                            <a href="search.html">خم شدن و صاف کردن فشار</a> (4)</li>
                          <li class="list-group-item">
                            <a href="search.html">پرس خمش</a> ( 115)</li>
                          <li class="list-group-item">
                            <a href="search.html">پرس های خالی</a> ( 15)</li>
                          <li class="list-group-item">
                            <a href="search.html">پرس بدنه خودرو</a> (8)</li>
                          <li class="list-group-item">
                            <a href="search.html" rel=""nofollow""> بیشتر</a></li>
                       </ul>
                      </div>
                    </td>

                    <td class="right-align">
                      <span class="badge badge-secondary product-title2">1,903</span></td>
                </tr>

                <tr>
                    <td>
                      <span style="color: #acacac;" class="product-title">105</span>
                    </td>

                    <td>
                      <span class="product-title">
                        <a href="search.html">اره ها</a>
                      </span>
                      <button class="btn-all btn-all-small plus-icon-btn" type="button" data-toggle="collapse" data-target="#category-coll-105" aria-expanded="false" aria-controls="category-coll-105">
                        <i class="fas fa-plus"></i>
                      </button>
                      <div class="collapse py-1" id="category-coll-105">
                        <ul class="list-group">
                          <li class="list-group-item">
                            <a href="search.html">اره نواری خودکار</a> (48)</li>
                            <li class="list-group-item">
                              <a href="search.html">باند اره خودکار</a> (70)</li>
                            <li class="list-group-item">
                              <a href="search.html">ماشین اره نواری</a> (52)</li>
                            <li class="list-group-item">
                              <a href="search.html">تیز کردن اره نواری ماشین ها</a> (3)</li>
                            <li class="list-group-item">
                              <a href="search.html">اره نواری</a> ( 94)</li>
                            <li class="list-group-item">
                              <a href="search.html">بی -تیغه های اره نواری فلزی</a> (1)</li>
                          <li class="list-group-item">
                            <a href="search.html" rel=""nofollow""> بیشتر</a></li>
                        </ul>
                      </div>
                    </td>

                    <td class="right-align">
                      <span class="badge badge-secondary product-title2">1,335</span>
                    </td>
                </tr>

                <tr>
                    <td>
                      <span style="color: #acacac;" class="product-title">107</span>
                    </td>
                    <td>
                      <span class="product-title">
                        <a href="search.html">ورق کاری</a></span>
                      <button class="btn-all btn-all-small plus-icon-btn" type="button" data-toggle="collapse" data-target="#category-coll-107" aria-expanded="false" aria-controls="category-coll-107">
                         <i class="fas fa-plus"></i>
                      </button>
                      <div class="collapse py-1" id="category-coll-107">
                        <ul class="list-group">
                          <li class="list-group-item">
                            <a href="search.html">3 -ماشین های خم گرد غلتکی</a> (27)</li>
                          <li class="list-group-item">
                            <a href="search.html">پردازش لیزر محوری تجهیزات</a> (1)</li>
                          <li class="list-group-item">
                            <a href="search.html">ماشین‌های مهره‌زنی</a> ( 39)</li>
                          <li class="list-group-item">
                            <a href="search.html">خم شدن و صاف کردن ماشین ها</a> (1)</li>
                          <li class="list-group-item">
                            <a href="search.html">ماشین آلات خمکاری</a> ( 264)</li>
                          <li class="list-group-item">
                            <a href="search.html">پورتال </a> ( 1)</li>
                          <li class="list-group-item">
                            <a href="search.html" rel=""nofollow""> بیشتر</a></li>
                       </ul>
                      </div>
                    </td>

                    <td class="right-align">
                      <span class="badge badge-secondary product-title2">3,787</span>
                    </td>
                </tr>

                <tr>
                    <td>
                      <span style="color: #acacac;" class="product-title">111</span>
                    </td>
                    <td>
                      <span class="product-title">
                        <a href="search.html">قطعات یدکی ماشین ابزار</a>
                      </span>
                      <button class="btn-all btn-all-small plus-icon-btn" type="button" data-toggle="collapse" data-target="#category-coll-111" aria-expanded="false" aria-controls="category-coll-111">
                         <i class="fas fa-plus"></i>
                      </button>
                      <div class="collapse py-1" id="category-coll-111">
                        <ul class="list-group">
                          <li class="list-group-item">
                            <a href="search.html">کاورهای محور</a> ( 2)</li>
                          <li class="list-group-item">
                            <a href="search.html">تبدیل‌های گشتاور توپ</a> (4)</li>
                          <li class="list-group-item">
                            <a href="search.html">ماشین‌های </a> ( 3)</li>
                          <li class="list-group-item">
                            <a href="search.html">موتورها</a> (10)</li>
                          <li class="list-group-item">
                            <a href="search.html">واحدهای پمپ</a> ( 2)</li>
                          <li class="list-group-item">
                            <a href="search.html">کنترل کننده های سرو</a> ( 2)</li>
                          <li class="list-group-item">
                            <a href="search.html">ماژول های سرو</a> ( 2)</li>
                          <li class="list-group-item">
                            <a href="search.html">قطعات یدکی</a> ( 155)</li>
                          <li class="list-group-item">
                            <a href="search.html" rel=""nofollow""> بیشتر</a> (110)</li>                                         
                        </ul>
                      </div>
                    </td>

                    <td class="right-align">
                      <span class="badge badge-secondary product-title2">290</span>
                    </td>
                </tr>
      
                    <tr>
                      <td>
                      <span style="color: #acacac;" class="product-title">100</span>
                    </td>
                    <td>
                      <span class="product-title">
                        <a href="#">همه ماشین آلات فلزکاری</a>
                    </span>
                  </td>
                    <td class="right-align">
                      <span class="badge badge-secondary product-title2">33,991</span>
                    </td>
                    <td class="center-align"></td>
                    </tr>
                  </tbody>
                  </table> --}}

                    {{-- <div class="bottom-pad2" style="background-color: #e9ecef;">
                      <header class="simple-search-header" style="min-height: 80px;">
                <div class="display-align ver-margin">
                  <div class="col-10 mx-auto center-align top-margin">
                    <h3><span class="text-danger product-title2">تولیدکنندگان</span>
                      <span class="product-title2"> ماشین آلات فلزکاری</span>
                    </h3>
                  </div>
                </div>
      
                  <div class="col-lg-12 text center-align mx-auto">
                      <a class="btn-all btn-lg btn-green" href="manufacturer-directory.html" title="" target="_blank">فهرست سازنده</a>
                  </div>
              </header>
            </div> --}}
        </div>
      
        <hr>

      <div class="top-margin2">
        <div class="display-align">
          <div class="col-12 mx-auto">
            @if($advertise->count()>0)
            <div style="background-color: #fff;">
          
              <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1110px;height:150px;overflow:hidden;visibility:hidden;">
                <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1110px;height:150px;overflow:hidden;object-fit: cover;">
                    @foreach($advertise as $ad)
                    <div>
                        <img data-u="image" src="{{asset($ad->banner)}}" />
                        <div data-u="thumb">{{$ad->description}}</div>
                    </div>
                    @endforeach
                   
                 
                </div>
                <!-- Thumbnail Navigator -->
                <div data-u="thumbnavigator" style="position:absolute;bottom:0px;left:0px;width:1110px;height:25px;color:#FFF;overflow:hidden;cursor:default;background-color:rgba(0,0,0,.5);">
                    <div data-u="slides">
                        <div data-u="prototype" style="position:absolute;top:0;left:0;width:1110px;height:25px;">
                            <div data-u="thumbnailtemplate" style="position:absolute;top:0;left:0;width:100%;padding-right:15px;height:100%;font-family:verdana;font-weight:normal;line-height:25px;font-size:16px;padding-left:10px;box-sizing:border-box;"></div>
                        </div>
                    </div>
                </div>
                <!-- Arrow Navigator -->
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
            </div>
            @endif
            <nav aria-label="address-crumb" class="">
              <ol class="address-crumb" style="border-radius: 0">
                <li class="address-crumb-item"><a href="{{route('index')}}">
                  <i class="fa fa-home" aria-hidden="true"></i>
                </a>
              </li>
                 {{-- <li class="address-crumb-item">همه دسته بندی ها</li> --}}
                
                  <li class="address-crumb-item">
                    
                      {{$cat->title}}
                   
                  </li>
                 
                {{-- <li class="address-crumb-item">نتایج</li> --}}
              </ol>
            </nav>
          
            <div class="container">
              <div class="display-align">
          
                <div class="col-lg-5 text center-align mx-auto">
                  <div class="hidden-moble">
                    {{-- <form role="form-inline center-align" action="">
                      <select class="custom-select form-control" id="arrange-by" style="width: 80%; font-size: 0.8rem; font-weight: 600;" name="sort">
                        <option selected="selected" >موارد مرتب شده توسط: استاندارد</option>
                        <option value="{{url()->full()}}?name={{request('name')}}&sort=price,desc">موارد مرتب شده بر اساس: قیمت صعودی</option>
                        <option  value="{{url()->full()}}?name={{request('name')}}&sort=price,asc">موارد مرتب شده بر اساس: قیمت نزولی</option>
                        <option  value="{{url()->full()}}?name={{request('name')}}&sort=created_at,desc">موارد مرتب شده بر اساس: تاریخ صعودی</option>
                        <option  value="{{url()->full()}}?name={{request('name')}}&sort=created_at,asc">موارد مرتب شده بر اساس: تاریخ نزولی</option >
                        <option  value="{{url()->full()}}?name={{request('name')}}&sort=year_of_manufacture,desc">اقلام به ترتیب: سال ساخت نزولی</option>
                        <option  value="{{url()->full()}}?name={{request('name')}}&sort=year_of_manufacture,asc">اقلام سفارش داده شده بر اساس: سال ساخت صعودی</option> 
                      </select>
                    </form> --}}
                  </div>
                </div>
        
                <div class="col-lg-2 text center-align mx-auto">
                  <h3 class="ver-margin mr-2">
                    پیشنهادات <span class="text-danger">{{$products->count()}}
                    </span> </h3>
                </div>
          
                <div class="col-lg-5 text center-align mx-auto">
                  <button class="btn-all btn-all-small btn-green" onclick="selectFilters()" style="cursor: pointer; min-width: 120px;"> فیلتر </button>
                </div>
          
              </div>
            </div>
          
            <div class="container"  id="filter-display-align" style="display: none;">
              <form class="p-2" id="filter_form" method="get" action="{{route('user.search')}}" accept-charset="utf-8">
                <input type="hidden" name="" value="">
                <input type="hidden" name="" value="">
                <input type="hidden" name="" value="">
                <input type="hidden" name="" value="">
                <input type="hidden" name="" value="">
                <input type="hidden" name="" value="">
          
                <div class="form-row">
                  <div class="col-md-6 mx-auto">
                    <div class="align-form">
                      <div class="input-group">
                        <span class="input-group-addon" style="min-width: 120px;">
                          <small>قیمت:</small>
                        </span>
                        <input type="text" name="pricemin" value="" class="url_params  form-control form-control-sm" placeholder="از">
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;">
                          <small>-</small>
                        </span>
                        <input type="text" name="pricemax" value="" class="url_params form-control form-control-sm" placeholder="تا">
                      </div>
                    </div>
          
                    {{-- <div class="align-form">
                      <div class="input-group">
                        <span class="input-group-addon" style="min-width: 120px;">
                          <small>جدید در:</small>
                        </span>
                        <input type="text" name="" value="" class="form-control form-control-sm" placeholder="از">
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;">
                          <small>-</small>
                        </span>
                        <input type="text" name="" value="" class="form-control form-control-sm" placeholder="تا">
                      </div>
                    </div> --}}
                    <div class="align-form">
                      <div class="input-group">
                        <span class="input-group-addon" style="min-width: 120px;">
                          <small>آدرس :</small>
                        </span>
                        <input type="text" name="location"  class="url_params form-control form-control-sm" placeholder="">
                      </div>
                    </div>
                    <div class="align-form">
                      <div class="input-group">
                        <span class="input-group-addon" style="min-width: 120px;">
                          <small>تولید کننده:</small>
                        </span>
                        <input type="text" name="manufacturer"  class="url_params form-control form-control-sm" placeholder="">
                      </div>
                    </div>
          
                    <div class="align-form">
                      <div class="input-group">
                        <span class="input-group-addon" style="min-width: 120px;">
                          <small>مدل:</small>
                        </span>
                        <input type="text" name="model" value="" class="url_params form-control form-control-sm" placeholder="">
                      </div>
                    </div>
          
                    {{-- <div class="align-form">
                      <div class="input-group">
                        <span class="input-group-addon" style="min-width: 120px;">
                          <small>نوع ماشین:</small>
                        </span>
                        <input type="text" name="" value="" class="form-control form-control-sm" placeholder="">
                      </div>
                    </div>--}}
                  </div> 
        
                  <div class="col-md-6 mx-auto">
                    <div class="align-form">
                      <div class="input-group">
                        <span class="input-group-addon" style="min-width: 120px;">
                          <small>کد دستگاه:</small>
                        </span>
                        <input type="text" name="itemNo" value="" class="url_params form-control form-control-sm" placeholder="">
                      </div>
                    </div>
          
                    <div class="align-form">
                      <div class="input-group">
                        <span class="input-group-addon" style="min-width: 120px;">
                          <small>کد فروشنده:</small>
                        </span>
                        <input type="text" name="dealer" value="" class="url_params form-control form-control-sm" placeholder="">
                      </div>
                    </div>
          
                    <div class="align-form">
                      <div class="input-group">
                        <span class="input-group-addon" style="min-width: 120px;">
                          <small>دست دوم یا نو:</small>
                        </span>
                        <select name="stock" class="url_params custom-select form-control" style="font-size: 0.8rem;">
                          <option   value="" >همه پیشنهادات</option>
                          <option value="1">نو</option>
                          <option value="0">دست دوم  </option>
                        </select>
                      </div>
                    </div>
          
                    {{-- <div class="align-form">
                      <div class="input-group">
                        <span class="input-group-addon" style="min-width: 120px;">
                          <small>جستجوی شعاع:</small>
                        </span>
                        <select name="" class="custom-select form-control" style="font-size: 0.8rem;">
                          <option value="" selected="">...</option>
                          <option value="">10 کیلومتر</option>
                          <option value="">20 کیلومتر</option>
                          <option value="">50 کیلومتر</option>
                          <option value="">100 کیلومتر</option>
                          <option value="">200 کیلومتر</option>
                          <option value="">300 کیلومتر</option>
                          <option value="">500 کیلومتر</option>
                          <option value="">1000 کیلومتر</option>
                        </select>
                      </div>
                    </div> --}}
                  </div>
                </div>
          
                <div class="form-row">
                  <div class="col-12 text center-align mx-auto">
                    <button type="submit" id ="submitSearch" class="btn-all btn-all-small btn-primary" style="cursor: pointer;"> فیلتر کردن نتایج </button>
                  </div>
                </div>
              </form>
            </div>
        
                <div class="container">
                  <div class="display-align">
                    <div class="col-lg-2 text center-align mx-auto">
                    </div>
                    <div class="col-lg-8 text center-align mx-auto">
            <!-- صفحه بندی -->
                      {{$products->links()}}
              </div>
              @auth
                    <div class="col-lg-2 text center-align mx-auto ver-margin">
                       <a class="btn-all btn-all-small btn-danger" href="{{route('watch-list')}}" style="cursor: pointer; min-width: 100px;" target="TOP">
                         <i class="fas fa-star" style="color: #f0b000;"></i> 
                         لیست دلخواه </a>
                    </div>
              @endauth
                  </div>
                </div>

      {{-- @dump(Session::get('watchList')->count()) --}}
        <!-- توضیحات -->
       @foreach($products as $product)
        <div class="container top-group" style="background-color: white;">
          <div class="display-align">
            <div class="col-lg-7 machine-top py-1">
              <span class="category-code">{{$product->category->id}} 
                <a href="{{route('product-list',$product->category->slug)}}" style="color: #5faeff;">{{$product->category->title}} </a>
              </span>
            </div>
            <div class="col-lg-5 machine-top py-1">
              <span class="category-code">تاریخ: {{$product->created_at}}</span>
           
              <span style="float: left;">
                @auth
                {{-- @if($product->favorites->user_id == auth()->user()->id) --}}
                @if(in_array(auth()->user()->id,$product->favorites()->pluck('user_id')->toArray()))
                <a   class="btn-all btn-light btn-all-small " style="font-weight: 600; font-size: 0.8rem;">
                  <i class="fas fa-star" style="color: #f0b000;"></i> 
                  کد دستگاه: {{$product->itemNo}} </a>
            
                @else
                <a  wire:click="storeWatchList({{$product}})"  class="btn-all btn-light btn-all-small " style="font-weight: 600; font-size: 0.8rem;cursor:pointer;">
                  <i class="far fa-star" style="color: #f0b000;"></i> 
                  
                  کد دستگاه: {{$product->itemNo}} </a>
                @endif
                  @endauth
                  @guest
                  کد دستگاه: {{$product->itemNo}} 
                  @endguest
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
            @if($product->vendor->isQualified == 1)
                   <div class="ribbon-wrapper-red">
                <div class="ribbon-red">
                  <span>فروشنده</span>
                  <span>تایید شده</span>
                </div>
              </div>
            @endif  
                  <div class="col-md-12 col-lg-3">
              <div class="display-align picture-box">
                <div class="col-sm center-align fill">
                  <div class="picture">
                    <a href="{{route('product.detail',$product->id)}}">
                      <img src="{{asset($product->images[0]->image)}}" >                
                    </a>
    
                    <div class="bottom-center">
                      <button class="btn-all btn-all-small btn-green" style="margin: 10px; ">   
                     <a href="{{route('dealer-inquiry',$product->itemNo)}}" class="text-white">
                         درخواست استعلام
                       </a>
                      </button>
    
                      <a href="tel:{{$product->vendor->phone}}" class="btn-all btn-all-small btn-green text-white" style="margin: 10px;font-weight: 600;">
                        <i class="fas fa-phone"></i>
                      </a>   
                                   
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
                    @if($product->vendor->isQualified == 1)
                    <span class="badge" style="background-color: #e35d6a; color: white;">رتبه بالا</span>
                    @endif
                     فروشنده: 
                     <img  style="height: 12px;"> {{$product->vendor->user->name}} 
               </div>
                  <div class="location" style="font-size: 0.9rem;">
               <b>موقعیت: {{$product->location}}</b>   
             </div>
                </div>
                <div class="col-sm-4 col-mobile right-align">
                  <div class="price">
                    <button class="btn-all btn-primary mazane">   
                      <a href="{{route('dealer-inquiry',$product->itemNo)}}" class="text-white">
                         درخواست مظنه
                       </a>
                      </button>
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
       
        <div class="parallax-background" >
          <img src="{{asset('frontend/background.jpg')}}" ></div>
          <script>
             $(document).ready(function () {
          $("#submitSearch").on("click", function(e) {
              e.preventDefault();
              var url = '{{ url("/result") }}?';
              var total = $(".url_params").length;
              $(".url_params").each(function (index) {
                  if ($(this).val().trim().length) {
                         if (index === total - 1) {
                            url += $(this).attr('name') + '=' + $(this).val();
                         } else {
                            url += $(this).attr('name') + '=' + $(this).val() + "&"; 
                         }                        
                  }
              });
              window.location.href = url;
          });
      });
          </script>
          <script>
            $(function(){
                 // bind change event to select
               
                 $('#arrange-by').on('change', function () {
                 
                     var url = $(this).val(); // get selected value
                     if (url) { // require a URL
                         window.location = url; // redirect
                     }
                     return false;
                 });
               });
           
                 </script>
        <script>
            function selectFilters() {
      var x = document.getElementById("filter-display-align");
      if (x.style.display === "none") {
          x.style.display = "block";
      } else {
          x.style.display = "none";
      }
      }
     
        // jssor_1_slider_init();
        </script>
        <script src="/frontend/js/addfavorite.js"></script>
        @endpush
</div>
