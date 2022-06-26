<nav class="navbar top-nav navbar-expand-lg navbar-light top-nav-2" id="navbar-top-2">
    <div class="container">
      <button class="all-cat-small navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navSmall2" aria-controls="navSmall2" aria-expanded="false" aria-label="Toggle navigation">
        همه دسته بندی ها
      </button>
      <div class="collapse navbar-collapse" id="navSmall2">
        <ul class="navbar-nav" style="width: 100%;display: flex;">
        
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
     
  
          @endforeach
          @if($categories_second)
          <li class="nav-item dropdown hidden-mobile">
            <a class="nav-link dropdown-toggle" href="#" id="navItemweitere" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="nav-item-text" >دسته های بیشتر ...</div> 
              <svg class="svg-inline--fa fa-caret-down fa-w-10 fa-sm" aria-hidden="true" data-prefix="fas" data-icon="caret-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path></svg>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navItemweitere">
              @foreach ($categories_second as $key=>$category)
              <a class="dropdown-item" href="{{route('product-list',$category->slug)}}">{{$category->title}}<b></b> ({{$category->parents->count()}}) </a>
              @endforeach
         
               </div>
          </li>
          @endif
          <li class="nav-item hidden-desktop">
            @foreach($categoriesCount as $category)
            <a class="nav-link" href="{{route('product-list',$category->slug)}}">{{$category->title}}<b></b> ({{$category->parents->count()}}) </a>
            @endforeach
          </li>
        </ul>
      </div>
    </div>
  </nav>