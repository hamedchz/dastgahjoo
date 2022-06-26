<footer id="footer">
    <div class="second-bar">
       <div class="container">
            <div class="social-icons">
                <span>از فروشگاه ما بازدید کنید: </span>
                <a href="#" class="social" target="_blank" >
                  <i class="fab fa-facebook-square" ></i>
                 </a>
                 <a href="#" class="social" target="_blank">
                   <i class="fab fa-linkedin " ></i> 
                    </a>
            </div>
        </div>
    </div>
    <div class="container">
      <div class="display-align">
          <div class="col-sm-3">
              <h5>شرکت</h5>
              <ul>
                  <li><a href="{{route('contact-us')}}">ارتباط با ما</a></li>                
                  <li><a href="{{route('about-us')}}">درباره ما</a></li>
                  {{-- <li><a href="{{route('sitemap')}}l">نقشه سایت</a></li> --}}
              </ul>
          </div>
          <div class="col-sm-3">
              <h5>برای فروشندگان</h5>
              <ul>
                  <li><a href="{{route('membership')}}">عضویت</a></li>
                  <li><a href="{{route('register')}}">ثبت نام</a></li>
                  <li><a href="{{route('login')}}">ورود</a></li>
              </ul>
          </div>
          <div class="col-sm-3">
              <h5>برای خریداران</h5>
              <ul>
                  <li><a href="{{route('search-machine')}}">جستجوی ماشین آلات</a></li>
                  {{-- <li><a href="watchlist.html" target="TOP"> فهرست دلخواه </a></li>             --}}
                  {{-- <li><a href="newsletter.html">خبرنامه</a></li> --}}
                  {{-- <li><a href="manufacturers.html">تولیدکنندگان</a></li> --}}
                  {{-- <li><a href="{{route('dealers')}}">فروشندگان</a></li> --}}
                  <li><a href="{{route('sold-products')}}">    محصولات فروخته شده</a></li>
              </ul>
          </div>
          <div class="col-sm-3">
              <h5>پشتیبانی</h5>
              <ul>
                  <li><a href="{{route('faq')}}">سوالات متداول و شرایط کسب و کار</a></li>
                  {{-- <li><a href="#">چاپ کردن</a></li> --}}
                  <li><a href="{{route('contact-us')}}">تماس با ما</a></li>
              </ul>
          </div>
      </div>
     <!-- کپی رایت -->
      <div class="container">
        <p id="copyright" >
          Copyright 2022 All rights reserved</p>
      </div>
    </div>
  </footer>  