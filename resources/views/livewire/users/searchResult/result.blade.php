<x-user-layout>
<div>
    @push('categoriesheader')
    @include('layouts.users.partials.underheader')
    @endpush  
    @push('styles')
    <style>
@media (max-width: 991px) {

.ribbon-wrapper-red {
  left: 15px;
  padding-top: 10px;
  padding-bottom: 150px;

}}
        </style>
    @endpush
    

    <!-- بدنه محتوا -->
    <div class="itemslist">
      <div id="overlay"></div>
      <div class="container top-titr">
        <div class="inner-block bg-white">
          <div class="ads-search" style="background-color: #e9ecef;">
          <header class="simple-search-header" style="min-height: 120px;">
            <div class="container title-bar">
              <div class="display-align top-margin2">
                <div class="col-lg-12 top-margin2">
                <h1 class="center-align">
                  <span class="text-danger">
                    @if(request()->name)
                    {{request()->name}}
                    @endif 
                </span>
                </h1>
          <h2 class="center-align" style="font-size:16px;"><span style="color: #888;">همه دسته بندی ها</span>
          </h2>       
               </div>
              </div>
            </div>

            <form action="{{route('user.search')}}" method="get" >
              <input type="hidden" name="" value="">
              <input type="hidden" name="" value="">
              <input type="hidden" name="" value="">
              <input type="hidden" name="" value="">
              <input type="hidden" name="" value="">
              <input type="hidden" name="" value="">

            <div class="container search-bar bottom-pad2">
              <div class="card" style="background-color: rgba(95, 174, 255, 0.2); margin-top: 10px;">
                <div class="card-body" style="padding: 0.5rem;">
                  <div class="input-group">
                    <input class="form-control"  maxlength="40" name="name" type="text" required="" title="" placeholder="دستگاه تزریق پلاستیک  ">
                    {{-- <select class="custom-select" name="category" style="border-radius: 0px; width: 120px;">
                      <option disabled value="" selected="selected">دسته بندی</option>
                      @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->title}}</option>
                      @endforeach
                    </select> --}}

                    <span class="input-group-btn">
                      <button id="search-button" class="btn-all btn-primary" type="submit" >
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

    <nav aria-label="address-crumb" class="">
      <ol class="address-crumb" style="border-radius: 0">
        <li class="address-crumb-item"><a href="#">
          <i class="fa fa-home" aria-hidden="true"></i>
        </a>
      </li>
         <li class="address-crumb-item">همه دسته بندی ها</li>
          <li class="address-crumb-item">
            @if(request()->name)
              {{request()->name}}
            @endif
          </li>
        <li class="address-crumb-item">نتایج</li>
      </ol>
    </nav>
  
    <div class="container">
      <div class="display-align">
  
        <div class="col-lg-5 text center-align mx-auto">
          <div class="hidden-moble">
            <form role="form-inline center-align" action="">
              <select class="custom-select form-control" id="arrange-by" style="width: 80%; font-size: 0.8rem; font-weight: 600;" name="sort">
                <option selected="selected" >موارد مرتب شده توسط: استاندارد</option>
                <option value="{{url()->full()}}?name={{request('name')}}&sort=price,desc">موارد مرتب شده بر اساس: قیمت صعودی</option>
                <option  value="{{url()->full()}}?name={{request('name')}}&sort=price,asc">موارد مرتب شده بر اساس: قیمت نزولی</option>
                <option  value="{{url()->full()}}?name={{request('name')}}&sort=created_at,desc">موارد مرتب شده بر اساس: تاریخ صعودی</option>
                <option  value="{{url()->full()}}?name={{request('name')}}&sort=created_at,asc">موارد مرتب شده بر اساس: تاریخ نزولی</option >
                <option  value="{{url()->full()}}?name={{request('name')}}&sort=year_of_manufacture,desc">اقلام به ترتیب: سال ساخت نزولی</option>
                <option  value="{{url()->full()}}?name={{request('name')}}&sort=year_of_manufacture,asc">اقلام سفارش داده شده بر اساس: سال ساخت صعودی</option> 
              </select>
            </form>
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
            {{-- <div class="align-form">
              <div class="input-group">
                <span class="input-group-addon" style="min-width: 120px;">
                  <small>آدرس :</small>
                </span>
                <input type="text" name="location"  class="url_params form-control form-control-sm" placeholder="">
              </div>
            </div> --}}
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

    <!-- توضیحات دستگاه -->
    @if($products->count() > 0)
    <div class="container top-group" style="background-color: white;">

    @forelse($products as $product)
      <div class="display-align">
        <div class="col-lg-7 machine-top py-1">
          <span class="category-code">{{$product->category->id}} 
            <a href="" style="color: #5faeff;">{{$product->category->title}}</a>
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
              </div>
      <div class="display-align top-group-verified">
      <div class="ribbon-wrapper-red">
            <div class="ribbon-red">
              <span>فروشنده </span>
              <span>تایید شده</span><br>
              
            </div>
          </div>     
                    
          <div class="col-md-3">
          <div class="display-align picture-box">
            <div class="col-sm center-align fill">
              <div class="picture">
                <a class="lightbox-image" data-fancybox="product" href="{{route('product.detail',$product->id)}}">
                  <img src="{{asset($product->images[0]->image)}}" >
                  <i class="fas fa-search-plus iconplus"></i>
                </a>
                <div class="bottom-center">
                  <a class="btn-all btn-all-small btn-green" href="{{route('dealer-inquiry',$product->itemNo)}}" target="TOP" style="margin: 10px; ">درخواست استعلام</a>
                  <a class="btn-all btn-all-small btn-green" href="tel:{{$product->vendor->phone}}" target="TOP" style="margin: 10px; font-weight: 600;">
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

        <div class="col-md-8 hor-margin bottom-margin">
          <div class="display-align">
              <div class="col-sm col-mobile top-pad bottom-pad center-align-mobile">
                <a href="{{route('product.detail',$product->id)}}">
               <p class="bottom-margin2" style="font-size: 20px;">  {{$product->name}}</p>
                </a>
            </div>
          </div>
          <div class="display-align bottom-pad" style="line-height: 2.5;">
            <div class="col-sm-8 col-mobile right-align">
              <div class="owner" style="font-size: 0.8rem; font-weight: 650;">
                 فروشنده: 
                 <span>
                  {{$product->vendor->user->name}} 
                 </span>
                  </div>
              <div class="location" style="font-size: 0.9rem;">
              </div>
            </div>
            <div class="col-sm-4 col-mobile right-align">
              <div class="price" style="font-size: 1.2rem; font-weight: 650;">
                  <a class="btn-all btn-primary mazane" href="{{route('dealer-inquiry',$product->itemNo)}}" target="TOP">درخواست مظنه</a>
              </div>
            </div>
          </div>
          <div class="display-align">
            <div class="col-sm col-mobile ver-pad">
              <p class="prod-text">
                {!!$product->description!!}  
              </p>
            </div>
          </div>
        </div>
      </div>
      @empty
      <span class="text-dark">دستگاهی پیدا نشد</span>
    

    @endforelse
  </div>
    @endif



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
  



      <div class="display-align ver-margin2">          
        <div class="col-lg-12 text center-align mx-auto">
          <a class="btn-all btn-primary align-middle" href="{{route('membership')}}" target="_blank">اضافه کردن پیشنهاد فروش</a>
        </div>
      </div>
      {{-- <div class="display-align ver-margin2">
        <div class="col-lg-12 text center-align mx-auto">
          <span>دستگاه مورد نظر خود را پیدا نکردید؟</span>
          <a class="btn-all btn-green" href="send-inquiry.html" target="_blank">ارسال درخواست استعلام</a>
          <span>به همه فروشندگان</span>
        </div>
      </div> --}}
  
     <div style="background-color: #fff;">
    <!-- صفحه بندی -->
         {{$products->links()}}
        </div>
      </div>
    </div>  
  </div>

      @push('footer-scripts')
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
      @endpush
</div>
</x-user-layout>