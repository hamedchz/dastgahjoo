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
                <span class="text-muted" style="font-weight: 400;">سطح دسته اول: </span>
                 <span class="text-muted" style="font-weight: 600;">رده 100 </span>
                  <h1 class="center-align" style="font-size: 24px;">
                    <span class="text-danger"></span>
                     <span class="text-muted" style="font-weight: 600;"> مورد استفاده برای فروش</span>
                    </h1>
                   </div>         
                      </div>
      
              {{-- <form action="" method="get" name="">
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
                      <input class="form-control" placeholder="جستجو در دسته " value="" maxlength="40" name="search" type="text" required="" title="">
      
                      <select class="custom-select hide-mobile" name="" style="border-radius: 0px; width:50%;">
                        <option value="" selected="selected">رده</option>
                        <option value="" selected="">1. فلز (33991)</option>
                        <option value="">2. چوب (8688)</option>
                        <option value="">3. پلاستیک (4156)</option>
                        <option value="">4. بسته بندی (2909)</option>
                        <option value="">5. بازیافت (1381)</option>
                        <option value="">6. پارچه (334)</option>
                        <option value="">7. مواد غذایی (11614)</option>
                        <option value="">8. چاپ (5676)</option>
                        <option value="">9. کشاورزی (578)</option>
                        <option value="">10. ساخت و ساز (1534)</option>
                        <option value="">11. متفرقه (1131)</option>
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
              </form> --}}
              </header>
            </div>
      
            <!-- آدرس صفحه -->
        <nav aria-label="breadcrumb" class="">
          <ol class="address-crumb" style="border-radius: 0">
            <li class="address-crumb-item"><a href="#">
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
        </nav>
           
        
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
        <div class="display-align mb-3">
          <div class="col-lg-8 text center-align mx-auto">
            <h2 style="font-size: 22px;">
              <span class="text-danger">محصولات فروخته شده</span> 
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
              <span class="category-code">تاریخ: {{$product->created_at}}</span>
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
