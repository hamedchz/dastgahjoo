<div>
    @push('categoriesheader')
    @include('layouts.users.partials.underheader')
    @endpush 
      <!-- بدنه اصلی -->
      <div class="itemslist">
        <div id="overlay"></div>
          <div class="container">
          <div class="inner-block bg-white">
            <div class="display-align top-titr ml-0">
              <div class="col-lg-8 text center-align mx-auto top-margin2 top-pad2">
                <h2>جستجوی پیشرفته</h2>
              </div>
            </div>
     
          <nav aria-label="breadcrumb" class="address-bar">
            <ol class="address-crumb" >
              <li class="address-crumb-item"><a href="{{url('/')}}">
                <i class="fa fa-home" aria-hidden="true"></i>
              </a>
            </li>
              <li class="address-crumb-item">
                جستجوی پیشرفته
              </li>
           
            </ol>
          </nav>
    
          <div class="container">
            <div class="display-align ml-0">
                {{-- <div class="col-lg-4 text center-align mx-auto bottom-pad">
                <div class="hidden-mobile">
                  <form role="form-inline" style="text-align: center">
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
              </div> --}}
                <div class="fields col-lg-4 text center-align mx-auto" >
                <span>
                  <small>فیلدها اجباری نیست!</small>
                </span>
              </div>
              </div>
          </div>
    
          <div class="container" id="filter-row">
            <form class="p-2" id="filter_form" method="get" action="{{route('user.search')}}" accept-charset="utf-8">
              <input type="hidden" name="" value="">
              <input type="hidden" name="" value="">
              <div class="form-row">
                <div class="col-md-6 mx-auto">
                  <div class="align-form">
                    <div class="input-group">
                      <span class="input-group-addon" style="min-width: 160px;"><small>دسته بندی:</small></span>
                      <select name="category" class="url_params custom-select form-control" style="font-size: 0.8rem;">
                        <option value="" selected="">همه دسته ها</option>
                        @foreach($categoriesCount as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
        
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
{{--         
                  <div class="align-form">
                    <div class="input-group">
                      <span class="input-group-addon" style="min-width: 160px;">
                        <small>دست دوم یا نو:</small>
                      </span>
                      <select name="" class="custom-select form-control" id="" style="font-size: 0.8rem;">
                        <option value="0" selected="">همه پیشنهادها</option>
                        <option value="1">فقط پیشنهادات استفاده شده</option>
                        <option value="2">فقط پیشنهادهای جدید</option>
                    </select>
                    </div>
                  </div> --}}
        
                  {{-- <div class="align-form">
                    <div class="input-group">
                      <span class="input-group-addon" style="min-width: 160px;">
                        <small>جستجو براساس شعاع:</small>
                      </span>
                      <select name="" class="custom-select form-control" id="" style="font-size: 0.8rem;">
                        <option value="0" selected="">...</option>
                        <option value="10">10 کیلومتر</option>
                        <option value="20">20 کیلومتر</option>
                        <option value="50">50 کیلومتر</option>
                        <option value="100">100 کیلومتر</option>
                        <option value="200">200 کیلومتر</option>
                        <option value="300">300 کیلومتر</option>
                        <option value="500">500 کیلومتر</option>
                        <option value="1000">1000 کیلومتر</option>
                      </select>
                    </div>
                  </div> --}}
        
        
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
                      <span class="input-group-addon" style="min-width: 160px;"><small>کد فروشنده:</small></span>
                      <input type="text" name="" value="" class="form-control form-control-sm" placeholder="...">
                    </div>
                  </div> --}}
        
                  {{-- <div class="align-form">
                    <div class="input-group">
                      <span class="input-group-addon" style="min-width: 160px;">
                        <small>فروشنده:</small>
                      </span>
                      <select name="" class="custom-select form-control" id="" style="font-size: 0.8rem;">
                        <option value="" selected="">همه پیشنهادها</option>
                        <option value="">فقط از نمایندگی های مجاز ماشین آلات</option>
                        <option value="">از همه فروشندگان ماشین آلات</option>
                        <option value="">فقط از غیر فروشنده</option>
                        </select>
                    </div>
                  </div> --}}
                </div>
              </div>
              <div class="form-row">
                <div class="col-12 text center-align mx-auto">
                  <button type="submit" id ="submitSearch"  class="btn-all btn-all-small btn-primary" style="cursor: pointer; min-width: 200px;"> جستجو </button>
                </div>
              </div>
            </form>
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
       
      @endpush
</div>
