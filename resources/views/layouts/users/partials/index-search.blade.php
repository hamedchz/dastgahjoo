<header class="page-head">
    <div class="overlay"></div>
    <div class="container head-title">
      <div class="display-align">
        <div class="col-lg-12 d-flex justify-content-center align-items-center" style="flex-direction: column;">
          <h1 class="center-align text-white">
            <strong></strong>
          </h1>
          <h2 class="center-align text-white" id="machine-number"><strong>
            <span class="text-white"></span>
             <span class="text-dark">     </span> 
            </strong>
          </h2>
        </div>
      </div>
    </div>

    <form action="{{route('user.search')}}" method="get" name="">
      <input type="hidden" name="" value="">
      <input type="hidden" name="" value="">
    <div class="container search-bar">
      <div class="card ver-margin2" style="background: rgba(50, 54, 57, .5);">
        <div class="card-body">
          <div class="input-group">
            <input class="form-control" placeholder="مثال: Maho MH 600" maxlength="40" name="name" type="text" required >
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

      <div class="container search-bar bottom-margin2 d-flex justify-content-center" style="margin-top: -10px;">
        <div class="display-align d-flex justify-content-between w-100">
        <div class="col-auto text" style="z-index:1000;">
          <strong style="font-size: 20px;"><a class="text-white" href="{{route('contact-us')}}" >ارسال درخواست استعلام</a>
          </strong>
        </div>
        <div class="col-auto right-align" style="z-index:1000;">
          <strong style="font-size: 20px;"><a class="text-white" href="{{route('advance-search')}}">جستجوی پیشرفته</a>
          </strong>
        </div>
      </div>
    </div>
    
    
    <div class="container search-bar d-flex justify-content-center" style="margin-top: -10px;">
      <div class="display-align d-flex justify-content-between w-100">
      <div class="col-auto text" style="z-index:1000;">
        {{-- <strong style="font-size: 20px;"><a class="text-white" href="{{route('manufacturer')}}" target="_blank">تولیدکنندگان</a></strong> --}}
        </div>
        <div class="col-auto right-align d-none d-lg-block" style="z-index:1000;">
          <img alt="check" src="{{asset('frontend/img/escrow-verified.png')}}" style="width: 40px; height: 40px;">
          <a class="text-white" href="#" > <strong> پرداخت سپرده ایمن</strong></a>
        </div>
      </div>
    </div>
       </header>