<nav class="navbar top-nav navbar-expand-lg navbar-light top-nav-2" id="navbar-top-2">
    <div class="container">
      <button class="all-cat-small navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navSmall2" aria-controls="navSmall2" aria-expanded="false" aria-label="Toggle navigation">
        همه دسته بندی ها
      </button>
      <div class="collapse navbar-collapse" id="navSmall2">
        <ul class="navbar-nav">
        
        @foreach ($categories as $key=>$category)
       
        <li class="nav-item dropdown hidden-mobile">
          <a class="nav-link" href="{{route('product-list',$category->slug)}}" id="navItem{{$loop->iteration}}">
            <div class="nav-item-text">{{$category->title}}</div>
            @if($category->parents->count() > 0)
            <svg class="svg-inline--fa fa-caret-down fa-w-10 fa-sm" aria-hidden="true" data-prefix="fas" data-icon="caret-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path></svg>
            @endif
          </a>
          @if($category->parents->count() > 0)
          <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navItem{{$loop->iteration}}">
            {{-- <a class="dropdown-item disabled" href="product-list.html">ماشین آلات فلزکاری (33,989)</a> --}}
            {{-- <div class="dropdown-divider"></div> --}}
            @foreach ($category->parents as $cat)
            <a class="dropdown-item" href="{{route('subcategory.product-list',$cat->slug)}}">{{$cat->title}}<b>({{$cat->subproducts->count()}})</b></a>
            @endforeach
          </div>
          @endif
        </li>
        <li class="nav-item hidden-desktop">
          <a class="nav-link" href="product-list.html">ماشین آلات فلزکاری (33,989)</a>
        </li>
  
          @endforeach
          {{-- <li class="nav-item dropdown hidden-mobile">
            <a class="nav-link dropdown-toggle" href="#" id="navItemweitere" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="nav-item-text" style="max-width: 80px;">دسته های بیشتر ...</div> 
              <svg class="svg-inline--fa fa-caret-down fa-w-10 fa-sm" aria-hidden="true" data-prefix="fas" data-icon="caret-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path></svg>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navItemweitere">
              <a class="dropdown-item" href="product-list.html">ماشین های نساجی <b>(334)</b> </a>
                <a class="dropdown-item" href="product-list.html">ماشین های کشاورزی <b>(578)</b> </a>
                <a id="EnergieKat" class="dropdown-item" href="product-list.html"> ژنراتورهای برق، موتورها، توربین‌ها، دیگ‌های بخار <b>(8652)</b></a>
                <a class="dropdown-item" href="product-list.html">ماشین‌ها و کارخانه‌های دیگر <b>(8686)</b></a>
                <a id="LagertechnikKat" class="dropdown-item" href="product-list.html ">دستگاه های مکانیکی، تجهیزات ذخیره سازی <b>(12829)</b></a>
                <a class="dropdown-item" href="product-list.html">لیفتراک، بالابر <b>(1202 )</b></a>
                <a class="dropdown-item" href="product-list.html">فناوری هوای فشرده <b>(804) </b></a>
                <a class="dropdown-item" href="product-list.html">کامپیوتر و تجهیزات اداری <b> (203)</b></a>
                <a class="dropdown-item" href="product-list.html">تجهیزات پزشکی <b>(407)</b></a>
                <a class="dropdown-item" href="product-list.html">موجودی عمومی <b>(2805)</b></a>
                <a class="dropdown-item" href="product-list.html">قطعات یدکی <b>(8710)</b></a>
                <a class="dropdown-item" href="product-list.html">قطعات الکتریکی <b>(370)</b> </a>
                <a class="dropdown-item" href="product-list.html">کالاهای مازاد <b>(742)</b> </a>
                <a class="dropdown-item" href="product-list.html">تجهیزات اتوماسیون <b>(9512)</b> </a>
                <a class="dropdown-item" href="product-list.html">وسایل نقلیه تجاری <b>(135)</b> </a>
                <a class="dropdown-item" href="product-list.html">متفرقه <b>(1,132)</b> </a>
                                  </div>
          </li> --}}
          <li class="nav-item hidden-desktop">
            <a class="nav-link" href="product-list.html">دسته های بیشتر ...</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>