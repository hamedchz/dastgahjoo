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
              <li class="address-crumb-item"><a href="{{route('index')}}">
                <i class="fa fa-home" aria-hidden="true"></i>
              </a>
            </li>
              <li class="address-crumb-item">
                <a href="#">جستجوی ماشین آلات</a>
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
          
          <form action="{{route('user.search')}}" method="get"  >
            <input type="hidden" name="" value="">
            <input type="hidden" name="" value="">
          <div class="container search-bar">
            <div class="card ver-margin2" style="background: rgba(50, 54, 57, .5);">
              <div class="card-body">
                <div class="input-group">
                  <input class="form-control" name="name" placeholder="" maxlength="40" name="" type="text" required>
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
              {{-- <div class="col-lg-4 text center-align mx-auto">
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
              </div>    --}}
    
              <div class="col-lg-4 text center-align mx-auto" style="display:table;">  
              </div>
            </div>
          </div> 
    
    
      <div class="container" id="filter-row">
        <form class="p-2"  id="filter_form" method="get" action="{{route('user.search')}}" accept-charset="utf-8">
          <input type="hidden" name="" value="">
          <input type="hidden" name="" value="">
          <div class="form-row"> 
            <div class="col-md-6 mx-auto">
              <div class="align-form">
                <div class="input-group">
                  <span class="input-group-addon" style="min-width: 160px;"><small>دسته:</small></span>
                  <select name="category" class="url_params custom-select form-control" style="font-size: 0.8rem;">
                    <option value="" selected="">همه دسته ها</option>
                    @foreach($categories as $category)
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
                  <span class="input-group-addon" style="min-width: 160px;"><small>نو یا دست دوم:</small></span>
                  <select name="" class="custom-select form-control" style="font-size: 0.8rem;">
                    <option value="" selected="">همه پیشنهادها</option>
                    <option value="">فقط پیشنهادات استفاده شده</option>
                    <option value="">فقط پیشنهادهای جدید</option>
                      </select>
                </div>                        
              </div>   --}}
              
              {{-- <div class="align-form">
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
                                    --}}
            
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
              </div>              --}}
              
            </div> 
          </div>
          
          <div class="form-row">
            <div class="col-12 text center-align mx-auto">
              <button type="submit" class="btn-all btn-all-small btn-primary" id ="submitSearch" style="cursor: pointer; min-width: 200px;"> جستجو </button>
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
                  @foreach ($categories as $category )
          
                  <div class="col-lg-6 mx-auto">
                    <ul class="catlistall list-group">
                      <li class="list-group-item list-group-item-action">
                        <span style="color: #acacac;">{{$loop->iteration}}.</span>
                        <a href="{{route('product-list',$category->slug)}}">{{$category->title}} </a>
                        <span class="machine-no">({{$category->products->count()}})</span></li>
                       
                      </ul>
                    </div>
                 @endforeach
                </div>     
            </div>
          </div>   
          </div>     
{{--            
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
          </div>    --}}
          
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
                    <a class="btn-all btn-green" href="{{route('contact-us')}}" target="_blank">درخواست ارسال استعلام</a>
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
      @push('footer-scripts')
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
