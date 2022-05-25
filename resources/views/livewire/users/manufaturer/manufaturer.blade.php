<div>
    @push('categoriesheader')
    @include('layouts.users.partials.underheader')
    @endpush             
    <div>
        <div id="overlay"></div>
          <div class="container">
            <div class="inner-block bg-white">
              <div class="display-align top-titr">
                <div class="col-lg-8 text center-align mx-auto top-margin2">
                  <h1><strong>فهرست سازنده</strong></h1>
                </div>
              </div>
      
              <div class="top-margin2 bottom-margin2">
                <div class="display-align">
                  <div class="col-lg-4 col-sm-10 col-9 text center-align mx-auto">
      
                    <form role="form-inline">
                      <label class="my-1 mr-2" for="manufacturer"><b>تولیدکنندگان در همه دسته‌ها:</b></label>
                      <select class="custom-select form-control my-1 mr-sm-2" id="manufacturer">
                        <option value="" selected="selected">لطفاً دسته را انتخاب کنید...</option>
                        <option value="">همه دسته ها</option>
                        <option value="">1. ماشین آلات فلزکاری</option>
                        <option value="">2. ماشین آلات چوب کاری</option>
                        <option value="">3. ماشین آلات پلاستیک</option>
                        <option value="">4. ماشین آلات بسته بندی</option>
                        <option value="">5. دفع زباله و بازیافت</option>
                        <option value="">6. ماشین آلات نساجی</option>
                        <option value="">7. ماشین آلات مواد غذایی</option>
                        <option value=".">9. ماشین آلات کشاورزی</option>
                        <option value="">10. ماشین آلات ساختمانی</option>
                        <option value="">11. ژنراتور برق، موتور، توربین، دیگ بخار</option>
                        <option value="">12. مهندسی فرآیند</option>
                        <option value="">13. ماشین های دیگر</option>
                        <option value="">14. تجهیزات جابجایی و ذخیره سازی مکانیکی</option>
                        <option value="">16. هواپیما، وسایل نقلیه راه آهن، کشتی</option>
                        <option value="">17. کامپیوتر و تجهیزات اداری</option>
                        <option value="">18. تجهیزات پزشکی</option>
                        <option value="">19. موجودی عمومی</option>
                        <option value="">22. کالاهای مازاد</option>
                        <option selected="selected" value="">همه دسته ها</option>
                       </select>
                    </form>
                  </div>
                </div>
              </div>
      
              <div class="top-margin2" style="background-color: #eee;">
                <div class="display-align">
                  <div class="col-12 mx-auto">
                    <div class="top-margin center-align">
                      <h2 style="font-size: 24px; font-weight: 600;">
                        <span class="text-danger">همه دسته بندی ها</span>
                      </h2>
                    </div>
      
            <div class="top-margin center-align">
              <div class="btn-group-sm top-words center-align" role="group" aria-label="keywords">
                <a href="#" class="btn btn-default abc"><span>الف</span></a>
                <a href="#" class="btn btn-default abc"><span>ب</span></a>
                <a href="#" class="btn btn-default abc"><span>پ</span></a>
                <a href="#" class="btn btn-default abc"><span>ت</span></a>
                <a href="#" class="btn btn-default abc"><span>ث</span></a>
                <a href="#" class="btn btn-default abc"><span>ج</span></a>
                <a href="#" class="btn btn-default abc"><span>چ</span></a>
                <a href="#" class="btn btn-default abc"><span>ح</span></a>
                <a href="#" class="btn btn-default abc"><span>خ</span></a>
                <a href="#" class="btn btn-default abc"><span>د</span></a>
                <a href="#" class="btn btn-default abc"><span>ذ</span></a>
                <a href="#" class="btn btn-default abc"><span>ر</span></a>
                <a href="#" class="btn btn-default abc"><span>ز</span></a>
                <a href="#" class="btn btn-default abc"><span>ژ</span></a>
                <a href="#" class="btn btn-default abc"><span>س</span></a>
                <a href="#" class="btn btn-default abc"><span>ش</span></a>
                <a href="#" class="btn btn-default abc"><span>ص</span></a>
                <a href="#" class="btn btn-default abc"><span>ض</span></a>
                <a href="#" class="btn btn-default abc"><span>ط</span></a>
                <a href="#" class="btn btn-default abc"><span>ظ</span></a>
                <a href="#" class="btn btn-default abc"><span>ع</span></a>
                <a href="#" class="btn btn-default abc"><span>غ</span></a>
                <a href="#" class="btn btn-default abc"><span>ف</span></a>
                <a href="#" class="btn btn-default abc"><span>ق</span></a>
                <a href="#" class="btn btn-default abc"><span>ک</span></a>
                <a href="#" class="btn btn-default abc"><span>گ</span></a>
                <a href="#" class="btn btn-default abc"><span>ل</span></a>
                <a href="#" class="btn btn-default abc"><span>م</span></a>
                <a href="#" class="btn btn-default abc"><span>ن</span></a>
                <a href="#" class="btn btn-default abc"><span>و</span></a>
                <a href="#" class="btn btn-default abc"><span>ه</span></a>
                <a href="#" class="btn btn-default abc"><span>ی</span></a>
              </div>
            </div>
                  </div>
                </div>
              </div>
      
              <div class="display-align top-margin2">
                <div class="col-lg-12 text center-align mx-auto hor-pad2">
                  <span>دستگاه مورد نظر خود را پیدا نکردید؟</span>
                  <a class="btn-all btn-all-small btn-green" href="send-inquiry.html">ارسال درخواست استعلام</a>
                    <span>به همه فروشندگان این دسته</span>
                    </div>
              </div>
      
          </div>
        </div>
      </div>
      @push('footer-scripts')
      <div class="parallax-background" >
        <img src="{{asset('frontend/background.jpg')}}" ></div>
  
      @endpush
</div>
