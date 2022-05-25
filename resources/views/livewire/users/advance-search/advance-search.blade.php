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
              <li class="address-crumb-item"><a href="#">
                <i class="fa fa-home" aria-hidden="true"></i>
              </a>
            </li>
              <li class="address-crumb-item">
                <a href="advanced-search.html">جستجوی پیشرفته</a>
              </li>
              <li class="address-crumb-item">
                <a href="#" style="cursor: pointer;">بازگشت</a>
              </li>
            </ol>
          </nav>
    
          <div class="container">
            <div class="display-align ml-0">
                <div class="col-lg-4 text center-align mx-auto bottom-pad">
                <div class="hidden-mobile">
                  <form role="form-inline" style="text-align: center">
                    <select class="custom-select form-control" style="width: 82%; font-size: 0.8rem; font-weight: 600;">
                      <option selected="" value="">استاندارد</option>
                      <option value="">فاصله</option>
                      <option value="">سال ساخت نزولی</option>
                      <option value="">سال تولید</option>
                      <option value="">تاریخ ورود نزولی</option>
                      <option value="">تاریخ به روز رسانی نزولی</option>
                      <option value="">سازنده، مدل</option>
                      <option value="">کشور</option>
                      <option value="">نوع ماشین آلات</option>
                      <option value="">قیمت</option>
                      <option value="">قیمت نزولی</option>
                    </select>
                  </form>
                </div>
              </div>
                <div class="fields col-lg-4 text center-align mx-auto" >
                <span>
                  <small>فیلدها اجباری نیست!</small>
                </span>
              </div>
              </div>
          </div>
    
          <div class="container" id="filter-row">
            <form class="p-2" id="filter_form" method="get" action="" accept-charset="utf-8">
              <input type="hidden" name="" value="">
              <input type="hidden" name="" value="">
              <div class="form-row">
                <div class="col-md-6 mx-auto">
                  <div class="align-form">
                    <div class="input-group">
                      <span class="input-group-addon" style="min-width: 160px;"><small>دسته بندی:</small></span>
                      <select name="" class="custom-select form-control" style="font-size: 0.8rem;">
                        <option value="" selected="">همه دسته ها</option>
                        <option value="">1. فلز (33050)</option>
                        <option value="">2. چوب (8437)</option>
                        <option value="">3. پلاستیک (3986)</option>
                        <option value="">4. بسته بندی (2737)</option>
                        <option value="">5. بازیافت (1375)</option>
                        <option value="">6. پارچه (248)</option>
                        <option value="">7. غذا (11317)</option>
                        <option value="">8. چاپ (5624)</option>
                        <option value="">9. متفرقه (1130)</option>  
                      </select>
                    </div>
                  </div>
        
                  <div class="align-form">
                    <div class="input-group">
                      <span class="input-group-addon" style="min-width: 160px;">
                        <small>سازنده:</small>
                      </span>
                      <input type="text" name="" list="" value="" class="form-control form-control-sm" placeholder="" autocomplete="off">
                    </div>
                  </div>
        
                  <div class="align-form">
                    <div class="input-group">
                      <span class="input-group-addon" style="min-width: 160px;">
                        <small>مدل:</small>
                      </span>
                      <input type="text" id="modell-input" name="" list="" value="" class="form-control form-control-sm" placeholder="" autocomplete="off">
                    </div>
                  </div>
        
                  <div class="align-form">
                    <div class="input-group">
                      <span class="input-group-addon" style="min-width: 160px;">
                        <small>نوع ماشین آلات:</small>
                      </span>
                      <input type="text" name="" list="" value="" class="form-control form-control-sm" placeholder="" autocomplete="off">
                    </div>
                  </div>
        
                  <div class="align-form">
                    <div class="input-group">
                      <span class="input-group-addon" style="min-width: 160px;">
                        <small>مشخصات:</small>
                      </span>
                      <input type="text" name="" value="" class="form-control form-control-sm" placeholder="">
                    </div>
                  </div>
        
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
                  </div>
        
                  <div class="align-form">
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
                  </div>
        
        
                </div>
                <div class="col-md-6 mx-auto">
             
                  <div class="align-form">
                    <div class="input-group">
                      <span class="input-group-addon" style="min-width: 160px;">
                        <small>قیمت:</small>
                      </span>
                      <input type="text" name="" value="" class="form-control form-control-sm" placeholder="از">
                      <span class="input-group-addon" style="border-left: 0; border-right: 0;">
                        <small>-</small>
                      </span>
                      <input type="text" name="" value="" class="form-control form-control-sm" placeholder="تا">
                    </div>
                  </div>
        
                  <div class="align-form">
                    <div class="input-group">
                      <span class="input-group-addon" style="min-width: 160px;">
                        <small>سال تولید:</small>
                      </span>
                      <input type="text" name="" value="" class="form-control form-control-sm" placeholder="از ">
                      <span class="input-group-addon" style="border-left: 0; border-right: 0;">
                        <small>-</small>
                      </span>
                      <input type="text" name="" value="" class="form-control form-control-sm" placeholder="تا">
                    </div>
                  </div>
        
                  <div class="align-form">
                    <div class="input-group">
                      <span class="input-group-addon" style="min-width: 160px;">
                        <small>کد دستگاه:</small>
                      </span>
                      <input type="text" name="" value="" class="form-control form-control-sm" placeholder="...">
                    </div>
                  </div>
        
                  <div class="align-form">
                    <div class="input-group">
                      <span class="input-group-addon" style="min-width: 160px;"><small>کد فروشنده:</small></span>
                      <input type="text" name="" value="" class="form-control form-control-sm" placeholder="...">
                    </div>
                  </div>
        
                  <div class="align-form">
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
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-12 text center-align mx-auto">
                  <button type="submit" class="btn-all btn-all-small btn-primary" style="cursor: pointer; min-width: 200px;"> جستجو </button>
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
  
      @endpush
</div>
