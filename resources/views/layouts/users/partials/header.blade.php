<nav class="navbar top-nav navbar-expand-lg navbar-dark  ">
    <div class="container">
      <a class="logo mb-3" href="{{route('index')}}"><img src="{{asset('admin\img\core-img\logo.png')}}" ></a>
      <a id="sell-machinary" href="{{route('membership')}}" class="btn-all btn-green mb-3" >دستگاه و ماشین آلات  خود را بفروشید 
        {{-- <i class="fas fa-check fa-sm"></i> --}}
      </a>
      <button class="navbar-toggler mb-3" type="button" data-toggle="collapse" data-target="#navSmall" aria-controls="navSmall" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navSmall">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item  hidden-mobile">
            <a class="nav-link mb-3"  href="{{route('search-machine')}}">جستجوی دستگاه</a>
          </li>
          <li class="nav-item " >
            <a class="nav-link" href="{{route('advance-search')}}">جستجوی پیشرفته</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('membership')}}">عضویت</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('register')}}">ثبت نام</a>
          </li>
          <li class="nav-item ">
            <a id="login" class="nav-link" href="{{route('login')}}">
            @auth
            {{ auth()->user()->name}}-{{auth()->user()->roles[0]->description}}
            @endauth
            @guest
            ورود<i class="fas fa-sign-in-alt" aria-hidden="true"></i>
            @endguest 
                  </a>
          </li>
         </ul>
      </div>
    </div>
  </nav>