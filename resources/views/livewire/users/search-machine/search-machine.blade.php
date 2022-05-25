<div>
    @push('categoriesheader')
    @include('layouts.users.partials.underheader')
    @endpush
    <div class="itemslist">
        <div id="overlay"></div>
        <div class="container" id="page-container">
          <div class="inner-block bg-white">
                <div class="display-align top-titr">
              <div class="col-lg-8 text center-align mx-auto top-margin2">
                <h1>
                  <strong style="font-weight: 700;">جستجوی ماشین آلات</strong>
                </h1>
              </div>
            </div>

            <!-- آدرس صفحه -->
          <nav aria-label="breadcrumb" class="address-bar">
            <ol class="address-crumb style="border-radius: 0">
              <li class="address-crumb-item"><a href="#">
                <i class="fa fa-home" aria-hidden="true"></i>
              </a>
            </li>
              <li class="address-crumb-item">
                <a href="machine-search.html">جستجوی ماشین آلات</a>
              </li>
              <li class="address-crumb-item">
                <a href="#" style="cursor: pointer;">بازگشت</a>
              </li>
            </ol>
          </nav>  
          
           
          <div class="container">   
          <div class="display-align">
            <div class="col-md-12">
              <h2 class="center-align"> ماشین‌های مورد استفاده در  اما چگونه آنها را پیدا کنیم؟</h2>
              <p>
                 گزینه های مختلفی را برای جستجوی ماشینی به شما ارائه می دهد تا در صورت ارائه، بتوانید ماشین دست دوم مورد نظر خود را پیدا کنید.
                  اگر نمی توانید دستگاه دست دوم مورد نظر خود را پیدا کنید، این فرصت را دارید که یک 
                 <a href="#" target="">درخواست</a> به همه فروشندگان ماشین های کارکرده در یک دسته ماشین،
                  همچنین در پایین لیست گزینه های جستجو در زیر ببینید. </p>
              <h3 class="center-align" style="color: #888;">
                می‌توانید ماشین‌ها را در  به روش‌های زیر جستجو کنید:</h3>
            </div>
          </div>      
          </div>
          
          <div class="container head-title">
            <div class="display-align">
              <div class="col-lg-12">
            <h2 class="right-align">
              <strong style="font-weight: 700;">1. جستجوی ماشینی با کلمه کلیدی</strong>
            </h2>
                 <p>
              می توانید حداکثر سه عبارت جستجو (کلمات یا قسمت هایی از کلمات) را در قسمت جستجوی زیر وارد کنید.
               این جستجو به ویژه در صورتی مناسب است که دقیقاً بدانید به دنبال چه هستید، نام دقیق سازنده و مدل را بدانید. </p>
          </div>
            </div>
          </div>
          
          <form action="" method="get" name="">
            <input type="hidden" name="" value="">
            <input type="hidden" name="" value="">
          <div class="container search-bar">
            <div class="card ver-margin2" style="background: rgba(50, 54, 57, .5);">
              <div class="card-body">
                <div class="input-group">
                  <input class="form-control" placeholder="" maxlength="40" name="" type="text" required="" title="">
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
          
          <div class="container head-title">
            <div class="display-align">
              <div class="col-lg-12">
                <h2 class="right-align">
                  <strong style="font-weight: 700;">2. جستجوی ماشینی با جستجوی پیشرفته</strong>
                </h2>
                <p>
           این گزینه جستجوی ماشینی مناسب است، اگر با گزینه 1 در بالا تعداد بازدیدهای زیادی بدست آورید یا خیلی نادقیق باشید. می توانید عبارات جستجوی خود را به فیلدهای جداگانه (تولیدکننده، مدل، نوع ماشین و غیره) اختصاص دهید و در نتیجه نتایج جستجو را محدود کنید. شما همچنین گزینه های انتخاب دیگری دارید. عیب این گزینه جستجو این است که زمان بیشتری می برد. </p>
          </div>
            </div>
          </div>              
          <div class="container">
            <div class="display-align">
              <div class="col-lg-4 text center-align mx-auto">     
              </div>   
              <div class="col-lg-4 text center-align mx-auto">
                <div class="hidden-mobile">
                  <form role="form-inline" style="text-align: center">
                    <select class="custom-select form-control" id="arrange-by" style="width: 82%; font-size: 0.8rem; font-weight: 600;">
                      <option value="#">استاندارد</option>
                      <option value="#">فاصله</option>
                      <option value="#">سال ساخت نزولی</option>
                      <option value="#">سال ساخت</option>
                      <option selected="" value="#">تاریخ ورود نزولی</option>
                      <option value="#">به روز رسانی تاریخ نزولی</option>
                      <option value="#">سازنده، مدل</option>
                      <option value="#">کشور</option>
                      <option value="#">نوع ماشین آلات</option>
                      <option value="#">قیمت</option>
                      <option value="#">قیمت نزولی</option>
                    </select>
                  </form>
                </div>  
              </div>   
    
              <div class="col-lg-4 text center-align mx-auto" style="display:table;">  
              </div>
            </div>
          </div> 
    
    
      <div class="container" id="filter-row">
        <form class="p-2" method="get" id="filter_form" action="" accept-charset="utf-8">
          <input type="hidden" name="" value="">
          <input type="hidden" name="" value="">
          <div class="form-row"> 
            <div class="col-md-6 mx-auto">
              <div class="align-form">
                <div class="input-group">
                  <span class="input-group-addon" style="min-width: 160px;"><small>دسته:</small></span>
                  <select name="" class="custom-select form-control" style="font-size: 0.8rem;">
                          <option value="0" selected="">همه دسته ها</option>
                          <option value="1">1. فلز (33319)</option>
                          <option value="2">2. چوب (8586)</option>
                          <option value="3">3. پلاستیک (3996)</option>
                          <option value="4">4. بسته بندی (2736)</option>
                          <option value="5">5. بازیافت (1373)</option>
                          <option value="6">6. پارچه (248)</option>
                          <option value="7">7. غذا (11297)</option>
                          <option value="8">8. چاپ (5624)</option>
                          <option value="9">9. کشاورزی (575)</option>
                          <option value="10">10. ساخت و ساز (1456)</option>
                          <option value="11">11. انرژی &amp; موتور (8524)</option>
                          <option value="12">12. مهندسی فرآیند (5916)</option>
                          <option value="13">13. ماشین های دیگر (8430)</option>
                          <option value="14">14. هندلینگ &amp; ذخیره سازی (12810)</option>
                          <option value="15">15. لیفتراک (1200)</option>
                          <option value="16">16. فن آوری هوای فشرده (818)</option>
                          <option value="17">17. کامپیوتر &amp; دفتر (202)</option>
                          <option value="18">18. پزشکی (408)</option>
                          <option value="19">19. موجودی (2805)</option>
                          <option value="20">20. شرکت ها (8692)</option>
                          <option value="21">21. قطعات الکتریکی (370)</option>
                          <option value="22">22. کالاهای مازاد (742)</option>
                          <option value="23">23. تجهیزات اتوماسیون (9503)</option>
                          <option value="24">24. وسایل نقلیه تجاری (133)</option>
                          <option value="25">25. متفرقه (1129)</option>                    
                  </select>
                </div>
              </div>          
            
              <div class="align-form">
                <div class="input-group">
                  <span class="input-group-addon" style="min-width: 160px;"><small>سازنده:</small></span>
                  <input type="text" id="maker-input" onchange="ajax_change(this.value)" name="" list="maker" value="" class="form-control form-control-sm" placeholder="" autocomplete="off">
                </div> 
              </div> 
                       
              <div class="align-form">
                <div class="input-group">
                  <span class="input-group-addon" style="min-width: 160px;">
                    <small>مدل:</small>
                  </span>                
                  <input type="text" id="modell-input" name="" list="modell" value="" class="form-control form-control-sm" placeholder="" >
                </div> 
              </div> 
              
              <div class="align-form">
                <div class="input-group">
                  <span class="input-group-addon" style="min-width: 160px;"><small>مشخصات:</small></span>
                  <input type="text" name="beschreibungstext" value="" class="form-control form-control-sm" placeholder="">
                </div> 
              </div> 
              
              <div class="align-form">
                <div class="input-group">
                  <span class="input-group-addon" style="min-width: 160px;"><small>نو یا دست دوم:</small></span>
                  <select name="" class="custom-select form-control" style="font-size: 0.8rem;">
                    <option value="" selected="">همه پیشنهادها</option>
                    <option value="">فقط پیشنهادات استفاده شده</option>
                    <option value="">فقط پیشنهادهای جدید</option>
                      </select>
                </div>                        
              </div>  
              
              <div class="align-form">
                <div class="input-group">
                  <span class="input-group-addon" style="min-width: 160px;"><small>جستجو براساس شعاع:</small></span>
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
              </div>                                 
                                   
            
            </div>  
            <div class="col-md-6 mx-auto">
              <div class="align-form">
                <div class="input-group">     
                  <span class="input-group-addon" style="min-width: 160px;"><small>قیمت:</small></span>
                  <input type="text" name="" value="" class="form-control form-control-sm" placeholder="از">
                  <span class="input-group-addon" style="border-left: 0; border-right: 0;"><small>-</small></span>
                  <input type="text" name="" value="" class="form-control form-control-sm" placeholder="تا">
                </div>
              </div>
              
              <div class="align-form">
                <div class="input-group">
                  <span class="input-group-addon" style="min-width: 160px;"><small>سال تولید:</small></span>
                  <input type="text" name="yearmin" value="" class="form-control form-control-sm" placeholder="از">
                  <span class="input-group-addon" style="border-left: 0; border-right: 0;"><small>-</small></span>
                  <input type="text" name="yearmax" value="" class="form-control form-control-sm" placeholder="تا">
                </div> 
              </div>                              
                      
              <div class="align-form">
                <div class="input-group">
                  <span class="input-group-addon" style="min-width: 160px;"><small>کد دستگاه:</small></span>
                  <input type="text" name="itemsnr" value="" class="form-control form-control-sm" placeholder="...">
                </div> 
              </div>
              
              <div class="align-form">
                <div class="input-group">
                  <span class="input-group-addon" style="min-width: 160px;"><small>کد فروشنده:</small></span>
                  <input type="text" name="refnr" value="" class="form-control form-control-sm" placeholder="...">
                </div> 
              </div>
                               
              <div class="align-form">
                <div class="input-group">
                  <span class="input-group-addon" style="min-width: 160px;"><small>فروشنده:</small></span>
                  <select name="deal" class="custom-select form-control" id="filterAK" style="font-size: 0.8rem;">
                    <option value="0" selected="">همه پیشنهادها</option>
                    <option value="1">فقط از نمایندگی های مجاز ماشین</option>
                    <option value="2">از همه فروشندگان ماشین</option>
                    <option value="3">فقط از غیر فروشنده</option>
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
      
          <div class="container head-title">
            <div class="display-align">
              <div class="col-lg-12">
                <h2 class="right-align">
                  <strong style="font-weight: 700;">3. جستجوی ماشین بر اساس دسته بندی</strong></h2>
                <p>
                  این گزینه جستجوی ماشینی ایده آل است 
                  اگر به سازنده و مدل محدود نیستید یا می خواهید دید کلی از پیشنهادات دستگاه داشته باشید. 25 دسته اصلی، بیش از 250 زیرمجموعه و بیش از 
                  <b>2500 دسته ماشین</b> در سطح دسته 3 وجود دارد.
                      </p>            
              </div>
            </div>
          </div>              
    
          <div class="container">      
          <div class="display-align top-pad">
            <div class="col-lg-12">
                <div class="display-align bottom-pad">
                  <div class="col-lg-6 mx-auto">
                    <ul class="catlistall list-group">
                      <li class="list-group-item list-group-item-action">
                        <span style="color: #acacac;">100.</span>
                        <a href="product-list.html">ماشین آلات فلزکاری</a>
                        <span class="machine-no">(33319)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">200.</span>
                        <a href="product-list.html">ماشین آلات کار چوب</a>
                        <span class="machine-no">(8586)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">300.</span>
                        <a href="product-list.html">ماشین‌های پلاستیک</a>
                        <span class="machine-no">(3996)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">400.</span>
                        <a href="product-list.html">ماشین آلات بسته بندی</a>
                        <span class="machine-no">(2736)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">500.</span>
                        <a href="product-list.html">ماشین آلات دفع زباله و بازیافت</a>
                        <span class="machine-no">(1373)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">600.</span>
                        <a href="product-list.html">ماشین‌های نساجی</a>
                        <span class="machine-no">(248)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">700.</span>
                        <a href="product-list.html">ماشین‌های غذا</a>                       
                      <span class="machine-no">(11297)</span></li>
                      <li class="list-group-item list-group-item-action">
                        <span style="color: #acacac;">800.</span>
                        <a href="product-list.html">ماشین‌های چاپ</a>
                        <span class="machine-no">(5624)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">900.</span>
                        <a href="product-list.html">ماشین‌های کشاورزی</a>
                        <span class="machine-no">(575)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">1000.</span>
                        <a href="product-list.html">ماشین آلات ساختمانی</a>
                        <span class="machine-no">(1456)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">1100.</span>
                        <a href="product-list.html">مولدهای برق، موتورها، توربین ها، بویلر</a>
                        <span class="machine-no">(8524)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">1200.</span>
                        <a href="product-list.html">مهندسی فرآیند</a>                       
                      <span class="machine-no">(5916)</span></li>
                      <li class="list-group-item list-group-item-action">
                        <span style="color: #acacac;">1300.</span>
                        <a href="product-list.html">ماشین‌ها و کارخانه‌های دیگر</a>
                        <span class="machine-no">(8430)</span></li>
                      </ul>
                    </div>

                    <div class="col-lg-6   mx-auto">
                      <ul class="catlistall list-group">
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">1400.</span>
                        <a href="product-list.html">ماشین‌های جابجایی مکانیکی، تجهیزات ذخیره‌سازی</a>
                        <span class="machine-no">(12810)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">1500.</span>
                        <a href="product-list.html">لیفتراک، بالابر</a>
                        <span class="machine-no">(1200)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">1600.</span>
                         <a href="product-list.html">فناوری هوای فشرده</a>
                        <span class="machine-no">(818)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">1700.</span>
                        <a href="product-list.html">کامپیوتر و تجهیزات اداری</a>                       
                        <span class="machine-no">(202)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">1800.</span>
                        <a href="product-list.html">تجهیزات پزشکی</a>
                        <span class="machine-no">(408)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">1900.</span>
                        <a href="product-list.html">موجودی عمومی</a>
                        <span class="machine-no">(2805)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">2000.</span>
                        <a href="product-list.html">قطعات یدکی</a>
                        <span class="machine-no">(8692)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">2100.</span>
                        <a href="product-list.html">قطعات الکتریکی</a>
                        <span class="machine-no">(370)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">2200.</span>
                        <a href="product-list.html">کالاهای مازاد</a>
                        <span class="machine-no">(742)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">2300.</span>
                        <a href="product-list.html">تجهیزات اتوماسیون</a>
                        <span class="machine-no">(9503)</span></li>
                        <li class="list-group-item list-group-item-action">
                          <span style="color: #acacac;">2400.</span>
                        <a href="product-list.html">وسایل نقلیه تجاری</a>                       
                      <span class="machine-no">(133)</span></li>
                      <li class="list-group-item list-group-item-action">
                        <span style="color: #acacac;">2500.</span>
                      <a href="product-list.html">متفرقه</a>
                      <span class="machine-no">(1129)</span></li>
                    </ul>
                  </div>
                </div>     
            </div>
          </div>   
          </div>     
           
          <div class="container head-title">
            <div class="display-align">
              <div class="col-lg-12">
                <h2 class="right-align">
                  <strong style="font-weight: 700;">4. جستجوی ماشین بر اساس سازنده</strong>
                </h2>
                <p>
                  این گزینه جستجوی ماشینی مفید است اگر سازنده را بشناسید اما مدل را نه. یا اگر می خواهید دیدی کلی از ماشین های ارائه شده توسط یک سازنده داشته باشید.
                   اگر فقط چند ماشین از یک سازنده وجود داشته باشد، این گزینه جستجو مناسب نیست، زیرا حداقل تعداد ماشین‌های سازنده برای فهرست در فهرست سازنده لازم است.
                </p>            
              </div>
            </div>
          </div>              
                   
      
          <div class="display-align top-pad">
            <div class="col-lg-12">
                <div class="display-align bottom-pad">
                  <div class="col-lg-6 mx-auto">
                    <ul class="catlistall list-group">
                      <li class="center-align list-group-item list-group-item-action">
                        <a href="manufacturers.html">فهرست سازنده</a></li>
                    </ul>
                  </div>
                </div>        
            </div>
          </div>   
          
          <div class="container head-title">
            <div class="display-align">
              <div class="col-lg-12">
                <h2 class="right-align">
                  <strong style="font-weight: 700;">5. درخواست استعلام</strong>
                </h2>
                <p>
                  اگر هنوز نتوانستید ماشین مورد نظر خود را پیدا کنید، می توانید درخواست ماشین یا سیستم دست دوم خود را ارسال کنید.
                   فروشندگان ماشین های دسته ماشینی که می توان درخواست ماشین شما را به آنها اختصاص داد این را دریافت خواهند کرد. برنامه <b>رایگان</b> است. </p>
              </div>
            </div>
          </div>              
          
          <div class="display-align top-pad">
            <div class="col-lg-12">            
                <div class="col-lg-12 text center-align mx-auto">
                    <a class="btn-all btn-green" href="send-inquiry.html" target="_blank">درخواست ارسال استعلام</a>
                </div>          
            </div>
          </div>    
          
          
          <div class="container head-title">
            <div class="display-align">
              <div class="col-lg-12">
                <h3 class="right-align" style="font-weight: 700;">یادداشت های بیشتر:</h3>
                <p>
                  اگر در مورد ماشین های ارائه شده سوالی دارید، لطفا فقط با ارائه دهنده دستگاه مربوطه تماس بگیرید.
                   لطفاً درک کنید که ما نمی‌توانیم اطلاعاتی در مورد اینکه آیا ماشین‌های خاصی در پلتفرم ما هستند یا نه ارائه کنیم و نمی‌توانیم در جستجو به شما کمک کنیم.
              </p>           
              </div>
            </div>
          </div>                    
          </div>
        </div>
      </div>
</div>
