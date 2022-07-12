<div>
    @push('header-scripts')
    <script src="/frontend/js/jssor.slider.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      jssor_1_slider_init = function() {
  
          var jssor_1_SlideshowTransitions = [
            {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
          ];
  
          var jssor_1_options = {
        $FillMode: 4,
        $AutoPlay: 1,
        $Cols: 1,
        $Align: 0,
        $SlideshowOptions: {
          $Class: $JssorSlideshowRunner$,
          $Transitions: {$Duration:2200,x:1,$Easing:{$Left:$Jease$.$InOutQuart},$Brother:{$Duration:2200,x:-1,$Easing:{$Left:$Jease$.$InOutQuart}}},
          $TransitionsOrder: 1
        },
        $ArrowNavigatorOptions: {
          $Class: $JssorArrowNavigator$
        },
        $ThumbnailNavigatorOptions: {
          $Class: $JssorThumbnailNavigator$,
          $Cols: 1,
          $Orientation: 2,
          $Align: 0,
          $NoDrag: true
        }
      };
          var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
  
          /*#region responsive code begin*/
  
          var MAX_WIDTH = 1110;
  
          function ScaleSlider() {
              var containerElement = jssor_1_slider.$Elmt.parentNode;
              var containerWidth = containerElement.clientWidth;
  
              if (containerWidth) {
  
                  var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);
  
                  jssor_1_slider.$ScaleWidth(expectedWidth);
              }
              else {
                  window.setTimeout(ScaleSlider, 30);
              }
          }
  
          ScaleSlider();
  
          $Jssor$.$AddEvent(window, "load", ScaleSlider);
          $Jssor$.$AddEvent(window, "resize", ScaleSlider);
          $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
          /*#endregion responsive code end*/
      };
  </script>
      @endpush
    @push('styles')
    <style>
      .question-hover{
        cursor:pointer;

      }
      .question-hover:hover{
        color:red;
      }
      .inner-bg {
        padding: 0;
    }
    
    .hide-desktop{
      display: none;
    }
    
    
    .btn .btn-sm .cost-buy{
      display: block;
    }
    
    @media (max-width: 490px) {
      .hide-desktop{
      display: block;
    }
    
    .cost-info .cost-buy {
      display: none;
    
    }
    }
    
    
    
    
    
    
    
    .table-title-sm{
      display: none;
    }
    
    /* .qbse{
        width: 20%;
     } */
     .qbo{
        width: 60%; 
     }
    
    
     .cost-info{
        width: 20%;padding: 5px 0px 15px 0px;border-bottom: 1px solid #CCC; }
    
    @media (max-width: 767px){
        .table-title-lg{
            display: none;
        }
    
        .table-title-sm{
            border: 1px solid #CCC;
        background-color: #f7f7f7;
        display: flex;
        justify-content: center;
        align-items: center; 
        padding: 10px;
     }
     .contact-info-col , .tl{
         display: none;
    
     }
     /* .qbse{
        width: 22.3%;
     } */
     .qbo{
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
     
     }
     .cost-info{
        border-bottom: none;
     }
     .table-row{
      border-right: 1px solid #CCC;
      border-left: 1px solid #CCC;
     }
     .cost-now{
      margin-top: 20px;
     }
     .cost-info{ 
      width: 33.33%;
     }
     .compare-heading{
      width: 33.33% !important;

     }
    }
    
     .onsale {
    display: block;
    text-decoration: line-through;
    font-size: 20px !important;
    color: #c03!important;
    font-weight: 400;
    line-height: 20px;
}
    
.mobile-row{
  border-left: 1px solid #CCC;
}
.table-row-mobile{
  display: flex; 
  justify-content: center;
   line-height: 4;
}
@media (max-width: 767px){
  .mobile-row{
  border-left: none;
}
.table-row-mobile{
  display: flex; 
  justify-content: space-between;
   line-height: 4;
   border-left: 1px solid #CCC;
}
}
.table-title-lg{
  position: relative;
}
    
span[data-title]:hover{
  cursor:pointer;
}
span[data-title]:hover::after, span[data-title]:focus::after {
    content: attr(data-title);
    position: absolute;
    left: 30px;
    bottom: 0;
    width: auto;
    white-space: nowrap;
    background-color: #1e1e1e;
    color: #fff;
    border-radius: 3px;
    box-shadow: 1px 1px 5px 0 rgb(0 0 0 / 40%);
    font-size: 14px;
    padding: 3px 5px;
    line-height:1;
}


    </style>
    @endpush
         <!-- بدنه محتوا -->
         <div class="top-content itemslist" style="min-height: 400px;">
          <div class="inner-bg">
            <div class="container" >
              <div class="display-align top-titr">
                <div class="col-lg-8 text center-align mx-auto">
                   {!!$membershipBody->first_part!!}
                    </div>
                </div>
              </div>
            </div>
    
        {{-- <div class=" top-margin">
              <div class="col-xl-8 text center-align mx-auto">
                      <p class="top-margin" style="color:#555555;" >سوالی دارید؟ 
                        <span style="color: Green;">
                        <i class="fas fa-phone"></i>
                      </span> 
                      <a href="tel:00989171175834" class="text-dark"> 09171175834</a></p>
                    </div>
        </div> --}}
    
        {{-- <div class="counters section">
          <div class="container">
            <div class="display-align">
              <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="honors">
                  <div class="icon">
                    <span class="fa-layers fa-fw fa-5x">
                      <svg class="svg-inline--fa fa-circle fa-w-16" style="color: #fff;" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg>
                      <svg class="svg-inline--fa fa-trophy fa-w-18 fa-inverse" data-fa-transform="shrink-7" style="color: #f0b000;transform-origin: 0.5625em 0.5em;" aria-hidden="true" data-prefix="fas" data-icon="trophy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><g transform="translate(288 256)"><g transform="translate(0, 0)  scale(0.5625, 0.5625)  rotate(0 0 0)"><path fill="currentColor" d="M552 64H448V24c0-13.3-10.7-24-24-24H152c-13.3 0-24 10.7-24 24v40H24C10.7 64 0 74.7 0 88v56c0 35.7 22.5 72.4 61.9 100.7 31.5 22.7 69.8 37.1 110 41.7C203.3 338.5 240 360 240 360v72h-48c-35.3 0-64 20.7-64 56v12c0 6.6 5.4 12 12 12h296c6.6 0 12-5.4 12-12v-12c0-35.3-28.7-56-64-56h-48v-72s36.7-21.5 68.1-73.6c40.3-4.6 78.6-19 110-41.7 39.3-28.3 61.9-65 61.9-100.7V88c0-13.3-10.7-24-24-24zM99.3 192.8C74.9 175.2 64 155.6 64 144v-16h64.2c1 32.6 5.8 61.2 12.8 86.2-15.1-5.2-29.2-12.4-41.7-21.4zM512 144c0 16.1-17.7 36.1-35.3 48.8-12.5 9-26.7 16.2-41.8 21.4 7-25 11.8-53.6 12.8-86.2H512v16z" transform="translate(-288 -256)"></path></g></g></svg>
                    </span>
                  </div>

                  <div class="benefits">
                    <h3>
                      <span class="counter">اصالت</span>
                    </h3>
                    <h4>از 1996</h4>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="honors">
                  <div class="icon">
                    <span class="fa-layers fa-fw fa-5x">
                      <svg class="svg-inline--fa fa-circle fa-w-16" style="color: #fff;" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg>
                      <svg class="svg-inline--fa fa-tachometer-alt fa-w-18 fa-inverse" data-fa-transform="shrink-6 up-1" style="color: #007412;transform-origin: 0.5625em 0.4375em;" aria-hidden="true" data-prefix="fas" data-icon="tachometer-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><g transform="translate(288 256)"><g transform="translate(0, -32)  scale(0.625, 0.625)  rotate(0 0 0)"><path fill="currentColor" d="M75.694 480a48.02 48.02 0 0 1-42.448-25.571C12.023 414.3 0 368.556 0 320 0 160.942 128.942 32 288 32s288 128.942 288 288c0 48.556-12.023 94.3-33.246 134.429A48.018 48.018 0 0 1 500.306 480H75.694zM512 288c-17.673 0-32 14.327-32 32 0 17.673 14.327 32 32 32s32-14.327 32-32c0-17.673-14.327-32-32-32zM288 128c17.673 0 32-14.327 32-32 0-17.673-14.327-32-32-32s-32 14.327-32 32c0 17.673 14.327 32 32 32zM64 288c-17.673 0-32 14.327-32 32 0 17.673 14.327 32 32 32s32-14.327 32-32c0-17.673-14.327-32-32-32zm65.608-158.392c-17.673 0-32 14.327-32 32 0 17.673 14.327 32 32 32s32-14.327 32-32c0-17.673-14.327-32-32-32zm316.784 0c-17.673 0-32 14.327-32 32 0 17.673 14.327 32 32 32s32-14.327 32-32c0-17.673-14.327-32-32-32zm-87.078 31.534c-12.627-4.04-26.133 2.92-30.173 15.544l-45.923 143.511C250.108 322.645 224 350.264 224 384c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-19.773-8.971-37.447-23.061-49.187l45.919-143.498c4.039-12.625-2.92-26.133-15.544-30.173z" transform="translate(-288 -256)"></path></g></g></svg>
                    </span>
                  </div>

                  <div class="benefits">
                    <h3><span class="counter">بیش از 100.000</span></h3>
                    <h4>ماشین آلات مورد استفاده و تجهیزات آنلاین</h4>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="honors">
                  <div class="icon">
                    <span class="fa-layers fa-fw fa-5x">
                      <svg class="svg-inline--fa fa-circle fa-w-16" style="color: #fff;" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <i class="fas fa-circle" style="color: #fff;"></i> -->
                      <svg class="svg-inline--fa fa-users fa-w-20 fa-inverse" data-fa-transform="shrink-6 up-1" style="color: #888;transform-origin: 0.625em 0.4375em;" aria-hidden="true" data-prefix="fas" data-icon="users" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><g transform="translate(320 256)"><g transform="translate(0, -32)  scale(0.625, 0.625)  rotate(0 0 0)"><path fill="currentColor" d="M320 64c57.99 0 105 47.01 105 105s-47.01 105-105 105-105-47.01-105-105S262.01 64 320 64zm113.463 217.366l-39.982-9.996c-49.168 35.365-108.766 27.473-146.961 0l-39.982 9.996C174.485 289.379 152 318.177 152 351.216V412c0 19.882 16.118 36 36 36h264c19.882 0 36-16.118 36-36v-60.784c0-33.039-22.485-61.837-54.537-69.85zM528 300c38.66 0 70-31.34 70-70s-31.34-70-70-70-70 31.34-70 70 31.34 70 70 70zm-416 0c38.66 0 70-31.34 70-70s-31.34-70-70-70-70 31.34-70 70 31.34 70 70 70zm24 112v-60.784c0-16.551 4.593-32.204 12.703-45.599-29.988 14.72-63.336 8.708-85.69-7.37l-26.655 6.664C14.99 310.252 0 329.452 0 351.477V392c0 13.255 10.745 24 24 24h112.169a52.417 52.417 0 0 1-.169-4zm467.642-107.09l-26.655-6.664c-27.925 20.086-60.89 19.233-85.786 7.218C499.369 318.893 504 334.601 504 351.216V412c0 1.347-.068 2.678-.169 4H616c13.255 0 24-10.745 24-24v-40.523c0-22.025-14.99-41.225-36.358-46.567z" transform="translate(-320 -256)"></path></g></g></svg>
                    </span>
                  </div>

                  <div class="benefits">
                    <h3><span class="counter">بیش از 20.000</span></h3>
                    <h4>فروشندگان ثبت نام شده</h4>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="honors">
                  <div class="icon">
                    <span class="fa-layers fa-fw fa-5x">
                      <svg class="svg-inline--fa fa-circle fa-w-16" style="color: #fff;" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <i class="fas fa-circle" style="color: #fff;"></i> -->
                      <svg class="svg-inline--fa fa-facebook-square fa-w-14 fa-inverse" data-fa-transform="shrink-6" style="color: #3b5998;transform-origin: 0.4375em 0.5em;" aria-hidden="true" data-prefix="fab" data-icon="facebook-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><g transform="translate(224 256)"><g transform="translate(0, 0)  scale(0.625, 0.625)  rotate(0 0 0)"><path fill="currentColor" d="M448 80v352c0 26.5-21.5 48-48 48h-85.3V302.8h60.6l8.7-67.6h-69.3V192c0-19.6 5.4-32.9 33.5-32.9H384V98.7c-6.2-.8-27.4-2.7-52.2-2.7-51.6 0-87 31.5-87 89.4v49.9H184v67.6h60.9V480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48z" transform="translate(-224 -256)"></path></g></g></svg><!-- <i class="fa-inverse fab fa-facebook-square" data-fa-transform="shrink-6" style="color: #3b5998;"></i> -->
                    </span>
                  </div>
                  <div class="benefits">
                    <h3><span class="counter">بیش از 10.000</span></h3>
                    <h4>مشترکین فیسبوک</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
    

<!-- table -->

                <div class="section" style="background-color: #323639;">
            <div class="container">
              <div class="comparison" style="border: 2px solid #ccc!important; border-radius: 5px;">
                <table >
                  <thead>
                    <div style="display: flex;justify-content: center;">
                      <div class="tl tl2 table-head1 table-head2" style="width: 20%;padding: 10px 0;"></div>
                      {{-- <div class="qbse t-head1" style="padding: 10px 0;">
                        برای فروشندگان مهمان                  </div> --}}
                      <div colspan="3" class="qbo t-head2" style="padding: 10px 0;">
                        برای فروشندگان ماشین آلات                  </div>
                    </div>
                    <div class="table-row table-row-mobile" >
                      <div class="tl table-head1" style="width: 20%;padding: 10px 0;border-right: 1px solid #CCC;">
                        <div class="contact-info" style="color: black;">ما با کمال میل به سوالات شما پاسخ خواهیم داد:</div>
                        {{-- <div class="contact-info" style="color: black;">  <a href="tel:00989171175834" class="text-dark"> 09171175834</a> <span style="color: green;">
                          <i class="fas fa-phone-square fa-lg"></i> </span></div> --}}
                      </div>
                      @foreach($packages as $package)
                      <div class="compare-heading mobile-row" style="width: 20%;">
                        {{$package->title}}  
                      </div>
                     @endforeach
                    </div>
                    <div class="table-row table-row-mobile">
                      <div class="contact-info-col " style="width: 20%;border-left: 1px solid #CCC;border-bottom: 1px solid #CCC;border-right: 1px solid #CCC;">
                        {{-- <div class="contact-info " style="margin-top: -10px;">
                          <button  class="px-2" style=" padding-right: 0.5rem!important; padding-left: 0.5rem!important;font-size: 0.8em; border: 2px solid #0888d3; border-radius: 10px; width: auto;height: 45px;  background-image: linear-gradient(#3ac0f3, #0888d3);color:white;">
                              post@resale.info
                            </button>
                               </div> --}}
                        <div class="contact-info" style="font-weight: 600; margin-top: 60px;padding: 0 7px;">بسته عضویت خود را انتخاب کنید 
                          <i class="fas fa-arrow-left"></i> </div>
                      </div>
                 
                       @foreach($packages as $package)
                      <div class="cost-info mobile-row" style="padding: 5px 0px 15px 0px;">
                        <div class="cost-now" style="line-height:1.2;display:flex;flex-direction:column;">
                          @if($package->discount->percentage <> 0)
                          <span class="onsale">
                            {{$package->price}}
                            </span>
                            <span class="onsale">
                           تومان
                          </span>
                          @else
                          <span class="onsale" style="opacity:0;">{{$package->price}}</span>
                          <span class="onsale" style="opacity:0;">
                             تومان
                          </span>
                          @endif
                          <span>{{($package->price)-(($package->price)*($package->discount->percentage/100))}}</span>
                          <span> تومان</span></div>
                        <div class="cost-try mb-2"><b>   ماهانه</b></div>
                        <div class="cost-try mb-2" style="line-height: 2;height: 75px;">({{($package->price)-(($package->price)*($package->discount->percentage/100))}} تومان در ماه)</div>
                       @auth
                       <div><a class="btn btn-sm cost-buy" href="{{route('payment.package',$package)}}">سفارش </a> <a class="hide-desktop" href="{{route('register')}}" > سفارش 
                      </a></div>

                       @endauth
                       @guest
                       <div><a class="btn btn-sm cost-buy" href="{{route('register')}}">سفارش </a> <a class="hide-desktop" href="{{route('register')}}" > سفارش 
                      </a></div>

                       @endguest

                        <div class="cost-try" style="margin-top: 10px;"><a href="#dealerstandard" data-toggle="modal" data-target="#dealerstandard"></a> </div>
                      </div>
                      @endforeach
                    </div>
                  </thead>
                  <div>
                    <div class="table-title-sm">
                      <div>تعداد   کالا</div>
                    </div>
                    <div class="table-row table-row-mobile">
                      <div class="table-title-lg" style="width: 20%;border-left: 1px solid #CCC;border-right: 1px solid #CCC;">تعداد   کالا <span data-title="تعداد کالاهای قابل آپلود هر پکیج" tabindex="0">
                        <i class="far fa-question-circle fa-sm question-hover" data-toggle="tooltip" data-placement="bottom"  ></i></span></div>
                        @foreach($packages as $package)
                      <div class="mobile-row" style="width: 20%;"><strong>{{$package->products}}</strong></div>
                    
                      @endforeach
                      {{-- <div style="width: 20%;"><strong></strong></div> --}}
                    </div>
                    <div class="table-title-sm">
                      <div> مدت زمان </div>
                    </div>
                    <div class="table-row table-row-mobile">
                    <div class="table-title-lg" style="width: 20%;border-left: 1px solid #CCC;line-height: 4;border-right: 1px solid #CCC;"> مدت زمان </div>
                    @foreach($packages as $package)
                    <div class="mobile-row" style="width: 20%;"><strong>{{$package->duration}} روز</strong></div>
                  
                    @endforeach
                      {{-- <div style="width: 20%;"></div> --}}
                    </div>

                    <div class="table-title-sm">
                      <div>  تعداد عکس</div>
                    </div>
                    <div class="table-row table-row-mobile">
                      <div class="table-title-lg" style="width: 20%;border-left: 1px solid #CCC;border-right: 1px solid #CCC;"> تعداد عکس </div>
                      @foreach($packages as $package)
                      <div class="mobile-row" style="width: 20%;"><strong>{{$package->images}} </strong></div>
                    
                      @endforeach
                    </div>
                    <div class="table-title-sm">
                      <div> ویدیو </div>
                    </div>
                    <div class="table-row table-row-mobile">
                      <div class="table-title-lg" style="width: 20%;border-left: 1px solid #CCC;border-right: 1px solid #CCC;">  ویدیو  <span data-title="تعداد ویدیوهای قابل آپلود هر پکیج" tabindex="0">
                                 <i class="far fa-question-circle fa-sm question-hover" ></i></span></div>
                                 @foreach($packages as $package)
                                 @if($package->video == 'YES')
                                 <div class="mobile-row" style="width: 20%;"><img alt="check" src="{{asset('frontend/img/check-mark-16.png')}}"></div>
                                @else
                                <div class="mobile-row" style="width: 20%;">-</div>
                                 @endif
                                 @endforeach         
              
                      {{-- <div style="width: 20%;"></div> --}}
                    </div>
                  
                
                   
                  
                    <div class="table-title-sm">
                      <div>ارتباط با سایت فروشنده</div>
                    </div>
                    <div class="table-row table-row-mobile">
                      <div class="table-title-lg" style="width: 20%;border-left: 1px solid #CCC;border-right: 1px solid #CCC;">ارتباط با سایت فروشنده  </div>
                      {{-- <div style="width: 20%;border-left: 1px solid #CCC;"></div> --}}
                      @foreach($packages as $package)
                      @if($package->site == 'YES')
                      <div class="mobile-row" style="width: 20%;"><img alt="check" src="{{asset('frontend/img/check-mark-16.png')}}"></div>
                     @else
                     <div class="mobile-row" style="width: 20%;">-</div>
                      @endif
                      @endforeach  
                    </div>
                    <div class="table-title-sm">
                      <div >امکان اضافه کردن لوگو</div>
                    </div>
                    <div class="table-row table-row-mobile">
                      <div class="table-title-lg" style="width: 20%;border-left: 1px solid #CCC;border-right: 1px solid #CCC;">امکان اضافه کردن لوگو  <span data-title="امکان اضافه کردن لوگوی فروشنده" tabindex="0">
                        <i class="far fa-question-circle fa-sm question-hover" style="cursor: pointer;" ></i></span></div>
                      {{-- <div style="width: 20%;border-left: 1px solid #CCC;"></div> --}}
                      @foreach($packages as $package)
                      @if($package->logo == 'YES')
                      <div class="mobile-row" style="width: 20%;"><img alt="check" src="{{asset('frontend/img/check-mark-16.png')}}"></div>
                     @else
                     <div class="mobile-row" style="width: 20%;">-</div>
                      @endif
                      @endforeach                     
                         {{-- <div style="width: 20%;border-left: 1px solid #CCC;"></div>
                      <div style="width: 20%;"></div> --}}
                    </div>
                  
                  </tbody>
                </table>
              </div>
            </div>
            </div>
    
<!-- end table -->


   <!-- بنر تبلیغات -->
   {{-- <div id="jssor_1" >
    <div class="slides" data-u="slides" >
        <div >
            <img data-u="image" src="img/logoPagus.jpg" />
            <div data-u="thumb">اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="img/bannerhoechsmann.gif" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="img/bannerIVW.jpg" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="img/logoMaynards.gif" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="img/logoUSEDMarket.jpg" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="img/banner_hamburg-machinery.jpg" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="img/logoKnauff.gif" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="img/bannerREWA.jpg" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="img/banner_dataTec.gif" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
        <div>
            <img data-u="image" src="img/bannerEPS.jpg" />
            <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
        </div>
     
    </div>
    <!-- متن تبلیغات اسلایدر -->
    <div class="jssor-thumbnavigator" data-u="thumbnavigator" >
        <div data-u="slides">
            <div class="jssor-prototype" data-u="prototype" >
                <div class="jssor-thumbnailtemplate" data-u="thumbnailtemplate" ></div>
            </div>
        </div>
    </div>
    <!-- فلش های اسلایدر -->
    <div data-u="arrowleft" class="jssora061" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
      <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
          <path class="a" d="M11949,1919L5964.9,7771.7c-127.9,125.5-127.9,329.1,0,454.9L11949,14079"></path>
      </svg>
  </div>
  <div data-u="arrowright" class="jssora061" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
      <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
          <path class="a" d="M5869,1919l5984.1,5852.7c127.9,125.5,127.9,329.1,0,454.9L5869,14079"></path>
      </svg>
  </div>
</div> --}}

<!-- آخر اسلایدر تبلیغات -->

<!-- نظرات کاربران -->
      {{-- <div class="user-comment">
            <div class="container">
              <div class="display-align">
                <div class="col-lg-6 text center-align mx-auto bottom-pad2">
             <div class="carousel" data-ride="carousel">
              <div class="carousel-inner">
               <h4>آنچه مشتریان ما در مورد ما می گویند:</h4>
              <div id="comment-quote" class="carousel-item ">
            <blockquote>

            <div id="wrapper">
              <div id="left"><img src="https://www.resale.de/flaggen/nl.gif" alt=""></div>
              <div id="right">
                <p> این باعث می شود حداقل بیست و پنجمین دستگاه به دلیل این وب سایت فروخته شود</p>
              </div>
            </div>
            </blockquote>
          </div>

        <div id="comment-quote" class="carousel-item ">
            <blockquote>
            <div id="wrapper">
              <div id="left"><img src="https://www.resale.de/flaggen/us.gif" alt=""></div>
              <div id="right">
                <p> خدمات خوب</p>
              </div>
            </div>
            </blockquote>
          </div>

        <div id="comment-quote" class="carousel-item ">
            <blockquote>
            <div id="wrapper">
              <div id="left"><img src="https://www.resale.de/flaggen/nl.gif" alt=""></div>
              <div id="right">
                <p> مایلیم از Resale-Marketplace، محل ملاقات بسیار موفق GOS با بسیاری از مشتریان جدید تا کنون تشکر کنیم.</p>       
                </div>
            </div>
            </blockquote>
          </div>

        <div id="comment-quote" class="carousel-item ">
            <blockquote>
            <div id="wrapper">
              <div id="left"><img src="https://www.resale.de/flaggen/nl.gif" alt=""></div>
              <div id="right">
                <p> بله، ما آن را از طریق وب سایت شما فروختیم. این در مورد دهمین دستگاهی است که مستقیماً از طریق وب سایت شما فروخته ایم.</p>
                   </div>
            </div>
            </blockquote>
          </div>
        <div id="comment-quote" class="carousel-item  active">
            <blockquote>
            <div id="wrapper">
              <div id="left"><img src="https://www.resale.de/flaggen/in.gif" alt=""></div>
              <div id="right">
                <p> با تشکر</p>
                   </div>
            </div>
            </blockquote>
          </div>
        <div id="comment-quote" class="carousel-item ">
            <blockquote>
            <div id="wrapper">
              <div id="left"><img src="https://www.resale.de/flaggen/fr.gif" alt=""></div>
              <div id="right">
                <p> من این ژنراتور را با وب سایت شما به هلند فروخته ام</p>
                   </div>
            </div>
            </blockquote>
          </div>
        <div id="comment-quote" class="carousel-item ">
            <blockquote>
            <div id="wrapper">
              <div id="left"><img src="https://www.resale.de/flaggen/nl.gif" alt=""></div>
              <div id="right">
                <p> فروش مجدد ثابت کرده است که بازار B2B بسیار قدرتمندی است.</p>
                   </div>
            </div>
            </blockquote>
          </div>
        <div id="comment-quote" class="carousel-item ">
            <blockquote>
            <div id="wrapper">
              <div id="left"><img src="https://www.resale.de/flaggen/au.gif" alt=""></div>
              <div id="right">
                <p> نتایج بسیار خوب، پرسش‌های فراوان، فروش‌های کمی.</p>
                   </div>
            </div>
            </blockquote>
          </div>
        <div id="comment-quote" class="carousel-item ">
            <blockquote>
            <div id="wrapper">
              <div id="left"><img src="https://www.resale.de/flaggen/it.gif" alt=""></div>
              <div id="right">
                <p> تعداد مشتریانی که در عرض چند روز به آگهی آزمایشی ما پاسخ دادند باورنکردنی است. سیستم شما واقعاً یک ابزار فروش عالی است!!</p>      
                 </div>
            </div>
            </blockquote>
          </div>
        <div id="comment-quote" class="carousel-item ">
            <blockquote>
            <div id="wrapper">
              <div id="left"><img src="https://www.resale.de/flaggen/nl.gif" alt=""></div>
              <div id="right">
                <p> سی و پنجمین دستگاه را از طریق وب سایت فروش مجدد فروخت.
                  گرانولاتور CMB 90 KW.</p>
                            </div>
                          </div>
                          </blockquote>
                        </div>
                      <div id="comment-quote" class="carousel-item ">
                          <blockquote>
                          <div id="wrapper">
                            <div id="left"><img src="https://www.resale.de/flaggen/fr.gif" alt=""></div>
                            <div id="right">
                              <p> وب سایت بسیار خوبی است، من از طریق RESALE سوالات زیادی دارم.
                  با تشکر</p>
                        </div>
                          </div>
                          </blockquote>
                        </div>
                      <div id="comment-quote" class="carousel-item ">
                          <blockquote>
                          <div id="wrapper">
                            <div id="left"><img src="https://www.resale.de/flaggen/se.gif" alt=""></div>
                            <div id="right">
                              <p> با تشکر از وب سایت بسیار خوب، ما چند هفته است که آن را با نتایج فوق العاده آزمایش کرده ایم، ما قبلاً برخی از تجهیزات را فروخته ایم و سوالات زیادی در مورد آن داریم. تجهیزات دیگر.</p>
                            </div>
                          </div>
                          </blockquote>
                        </div>
                      <div id="comment-quote" class="carousel-item ">
                          <blockquote>
                          <div id="wrapper">
                            <div id="left"><img src="https://www.resale.de/flaggen/ru.gif" alt=""></div>
                            <div id="right">
                              <p> ماشین تراش SKJ-12 از طریق تبلیغات در RESALE.INFO فروخته شد.</p>
                              </div>
                          </div>
                          </blockquote>
                        </div>
                      <div id="comment-quote" class="carousel-item ">
                          <blockquote>
                          <div id="wrapper">
                            <div id="left"><img src="https://www.resale.de/flaggen/us.gif" alt=""></div>
                            <div id="right">
                              <p> سایت جالب</p>
                          </div>
                        </div>
                    </blockquote>
                    </div>

        <div id="comment-quote" class="carousel-item ">
            <blockquote>
            <div id="wrapper">
              <div id="left"><img src="https://www.resale.de/flaggen/se.gif" alt=""></div>
              <div id="right">
                <p> دستگاه من بعد از دو روز فروخته شد. بسیار راضی.</p>
              </div>
            </div>
            </blockquote>
          </div>

        <div id="comment-quote" class="carousel-item ">
            <blockquote>
            <div id="wrapper">
              <div id="left"><img src="https://www.resale.de/flaggen/fr.gif" alt=""></div>
              <div id="right">
                <p> زمان برد اما همه چیز خوب است</p>
              </div>
            </div>
            </blockquote>
          </div>
               </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- توضیحات  -->
          <div class="grey-back section">
            <div class="container">
              <div class="comment more">
                  <h3 class="title-font" >ما اصیل هستیم</h3>
                  پس از چندین سال توسعه، RESALE در سال 1996 آنلاین شد. بنابراین ما قدیمی ترین و اولین بازار ماشین آلات مستعمل در سراسر جهان هستیم. از آن زمان ما رفت و آمد مداوم مقلدین مختلف را دنبال کردیم. آنها با نیروی کار عظیم خود توانستند اقلام ماشین آلات زیادی را از دلالان خریداری کنند.
                  در نهایت آنها از صحنه ناپدید شدند، اما به دلیل عدم تامین هزینه های زیاد.
                  <br><br>
                  در طی دو سال گذشته موج دومی از رقبا به وجود آمدند که کمتر در خرید اقلام ماشین آلات برای بازار خود مراقبت می کردند. آنها ترجیح می دهند فقط تبلیغات ما را بدون هیچ مجوزی کپی کنند. بنابراین ما از همه فروشندگان می خواهیم که مراقب باشند و یا حتی اجازه این روش را بدهند.
                  با توجه به نرم افزارهای خودکار که برای کپی استفاده می شود، نمی توان از کپی صحیح اطمینان حاصل کرد. اغلب جزئیات فنی کاملا نادرست منتشر می شود. این امر منجر به سردرگمی خریداران احتمالی می شود. اگر برخی از رقبا یک کمیسیون پنهان اضافه کنند، قیمت های متفاوتی برای یک ماشین وجود دارد.
                  بنابراین ما به همه خریداران احتمالی توصیه می کنیم که منحصراً از طریق RESALE با ارائه دهنده تماس بگیرند. به این ترتیب می توان از پرداخت کمیسیون پنهان یا هزینه اضافی سایر رقبا جلوگیری کرد.
                  <h3 class="title-font ver-margin" >وعده ما به شما</h3>
                  در مقایسه با مدعیانی که هدفشان کسب امتیاز بزرگ بود، هدف ما کارآمد بودن بوده است. از آنجایی که ما همیشه هزینه ها را پایین نگه می داریم، می توانیم به طور مداوم قیمت های مطلوبی را به شما ارائه دهیم. هزینه های مشتریان فعلی هرگز افزایش نیافته است. از نظر افزایش شدید قیمت ها نباید از غافلگیری ناخوشایند بترسید.
                  <br><br>
                  علاوه بر این، ما قول می دهیم که پلتفرم خود را به طور پیوسته توسعه دهیم. این جایی است که منابع ما در آن سرمایه گذاری می شود. ما همیشه مشغول بهبود دامنه عملکردها و نمایش بصری وب سایت هستیم. مهمتر از همه، بازار و به طور کلی توسعه تجارت موتور مبتنی بر وب، به قلب بنیانگذار و مدیر عامل شرکت ما که یک مهندس مکانیک است نزدیک است.
                               </div>
            </div>
          </div>
            </div>
        </div> --}}
 <!-- بنر تبلیغات -->
 {{-- <div id="jssor_1" >
  <div class="slides" data-u="slides" >
      <div >
          <img data-u="image" src="{{asset('frontend/img/logoPagus.jpg')}}" />
          <div data-u="thumb">اطلاعات بنری تبلیغاتی</div>
      </div>
      <div>
          <img data-u="image" src="{{asset('frontend/img/bannerhoechsmann.gif')}}" />
          <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
      </div>
      <div>
          <img data-u="image" src="{{asset('frontend/img/bannerIVW.jpg')}}" />
          <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
      </div>
      <div>
          <img data-u="image" src="{{asset('frontend/img/logoMaynards.gif')}}" />
          <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
      </div>
      <div>
          <img data-u="image" src="{{asset('frontend/img/logoUSEDMarket.jpg')}}" />
          <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
      </div>
      <div>
          <img data-u="image" src="{{asset('frontend/img/banner_hamburg-machinery.jpg')}}" />
          <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
      </div>
      <div>
          <img data-u="image" src="{{asset('frontend/img/logoKnauff.gif')}}" />
          <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
      </div>
      <div>
          <img data-u="image" src="{{asset('frontend/img/bannerREWA.jpg')}}" />
          <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
      </div>
      <div>
          <img data-u="image" src="{{asset('frontend/img/banner_dataTec.gif')}}" />
          <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
      </div>
      <div>
          <img data-u="image" src="{{asset('frontend/img/bannerEPS.jpg')}}" />
          <div data-u="thumb"> اطلاعات بنری تبلیغاتی</div>
      </div>
   
  </div>
  <!-- متن تبلیغات اسلایدر -->
  <div class="jssor-thumbnavigator" data-u="thumbnavigator" >
      <div data-u="slides">
          <div class="jssor-prototype" data-u="prototype" >
              <div class="jssor-thumbnailtemplate" data-u="thumbnailtemplate" ></div>
          </div>
      </div>
  </div>
  <!-- فلش های اسلایدر -->
  <div data-u="arrowleft" class="jssora061" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
        <path class="a" d="M11949,1919L5964.9,7771.7c-127.9,125.5-127.9,329.1,0,454.9L11949,14079"></path>
    </svg>
</div>
<div data-u="arrowright" class="jssora061" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
        <path class="a" d="M5869,1919l5984.1,5852.7c127.9,125.5,127.9,329.1,0,454.9L5869,14079"></path>
    </svg>
</div>
</div> --}}

<!-- آخر اسلایدر تبلیغات -->

<!-- نظرات کاربران -->
    {{-- <div class="user-comment">
          <div class="container">
            <div class="display-align">
              <div class="col-lg-6 text center-align mx-auto bottom-pad2">
           <div class="carousel" data-ride="carousel">
            <div class="carousel-inner">
             <h4>آنچه مشتریان ما در مورد ما می گویند:</h4>
            <div id="comment-quote" class="carousel-item ">
          <blockquote>

          <div id="wrapper">
            <div id="left"><img src="https://www.resale.de/flaggen/nl.gif" alt=""></div>
            <div id="right">
              <p> این باعث می شود حداقل بیست و پنجمین دستگاه به دلیل این وب سایت فروخته شود</p>
            </div>
          </div>
          </blockquote>
        </div>

      <div id="comment-quote" class="carousel-item ">
          <blockquote>
          <div id="wrapper">
            <div id="left"><img src="https://www.resale.de/flaggen/us.gif" alt=""></div>
            <div id="right">
              <p> خدمات خوب</p>
            </div>
          </div>
          </blockquote>
        </div>

      <div id="comment-quote" class="carousel-item ">
          <blockquote>
          <div id="wrapper">
            <div id="left"><img src="https://www.resale.de/flaggen/nl.gif" alt=""></div>
            <div id="right">
              <p> مایلیم از Resale-Marketplace، محل ملاقات بسیار موفق GOS با بسیاری از مشتریان جدید تا کنون تشکر کنیم.</p>       
              </div>
          </div>
          </blockquote>
        </div>

      <div id="comment-quote" class="carousel-item ">
          <blockquote>
          <div id="wrapper">
            <div id="left"><img src="https://www.resale.de/flaggen/nl.gif" alt=""></div>
            <div id="right">
              <p> بله، ما آن را از طریق وب سایت شما فروختیم. این در مورد دهمین دستگاهی است که مستقیماً از طریق وب سایت شما فروخته ایم.</p>
                 </div>
          </div>
          </blockquote>
        </div>
      <div id="comment-quote" class="carousel-item  active">
          <blockquote>
          <div id="wrapper">
            <div id="left"><img src="https://www.resale.de/flaggen/in.gif" alt=""></div>
            <div id="right">
              <p> با تشکر</p>
                 </div>
          </div>
          </blockquote>
        </div>
      <div id="comment-quote" class="carousel-item ">
          <blockquote>
          <div id="wrapper">
            <div id="left"><img src="https://www.resale.de/flaggen/fr.gif" alt=""></div>
            <div id="right">
              <p> من این ژنراتور را با وب سایت شما به هلند فروخته ام</p>
                 </div>
          </div>
          </blockquote>
        </div>
      <div id="comment-quote" class="carousel-item ">
          <blockquote>
          <div id="wrapper">
            <div id="left"><img src="https://www.resale.de/flaggen/nl.gif" alt=""></div>
            <div id="right">
              <p> فروش مجدد ثابت کرده است که بازار B2B بسیار قدرتمندی است.</p>
                 </div>
          </div>
          </blockquote>
        </div>
      <div id="comment-quote" class="carousel-item ">
          <blockquote>
          <div id="wrapper">
            <div id="left"><img src="https://www.resale.de/flaggen/au.gif" alt=""></div>
            <div id="right">
              <p> نتایج بسیار خوب، پرسش‌های فراوان، فروش‌های کمی.</p>
                 </div>
          </div>
          </blockquote>
        </div>
      <div id="comment-quote" class="carousel-item ">
          <blockquote>
          <div id="wrapper">
            <div id="left"><img src="https://www.resale.de/flaggen/it.gif" alt=""></div>
            <div id="right">
              <p> تعداد مشتریانی که در عرض چند روز به آگهی آزمایشی ما پاسخ دادند باورنکردنی است. سیستم شما واقعاً یک ابزار فروش عالی است!!</p>      
               </div>
          </div>
          </blockquote>
        </div>
      <div id="comment-quote" class="carousel-item ">
          <blockquote>
          <div id="wrapper">
            <div id="left"><img src="https://www.resale.de/flaggen/nl.gif" alt=""></div>
            <div id="right">
              <p> سی و پنجمین دستگاه را از طریق وب سایت فروش مجدد فروخت.
                گرانولاتور CMB 90 KW.</p>
                          </div>
                        </div>
                        </blockquote>
                      </div>
                    <div id="comment-quote" class="carousel-item ">
                        <blockquote>
                        <div id="wrapper">
                          <div id="left"><img src="https://www.resale.de/flaggen/fr.gif" alt=""></div>
                          <div id="right">
                            <p> وب سایت بسیار خوبی است، من از طریق RESALE سوالات زیادی دارم.
                با تشکر</p>
                      </div>
                        </div>
                        </blockquote>
                      </div>
                    <div id="comment-quote" class="carousel-item ">
                        <blockquote>
                        <div id="wrapper">
                          <div id="left"><img src="https://www.resale.de/flaggen/se.gif" alt=""></div>
                          <div id="right">
                            <p> با تشکر از وب سایت بسیار خوب، ما چند هفته است که آن را با نتایج فوق العاده آزمایش کرده ایم، ما قبلاً برخی از تجهیزات را فروخته ایم و سوالات زیادی در مورد آن داریم. تجهیزات دیگر.</p>
                          </div>
                        </div>
                        </blockquote>
                      </div>
                    <div id="comment-quote" class="carousel-item ">
                        <blockquote>
                        <div id="wrapper">
                          <div id="left"><img src="https://www.resale.de/flaggen/ru.gif" alt=""></div>
                          <div id="right">
                            <p> ماشین تراش SKJ-12 از طریق تبلیغات در RESALE.INFO فروخته شد.</p>
                            </div>
                        </div>
                        </blockquote>
                      </div>
                    <div id="comment-quote" class="carousel-item ">
                        <blockquote>
                        <div id="wrapper">
                          <div id="left"><img src="https://www.resale.de/flaggen/us.gif" alt=""></div>
                          <div id="right">
                            <p> سایت جالب</p>
                        </div>
                      </div>
                  </blockquote>
                  </div>

      <div id="comment-quote" class="carousel-item ">
          <blockquote>
          <div id="wrapper">
            <div id="left"><img src="https://www.resale.de/flaggen/se.gif" alt=""></div>
            <div id="right">
              <p> دستگاه من بعد از دو روز فروخته شد. بسیار راضی.</p>
            </div>
          </div>
          </blockquote>
        </div>

      <div id="comment-quote" class="carousel-item ">
          <blockquote>
          <div id="wrapper">
            <div id="left"><img src="https://www.resale.de/flaggen/fr.gif" alt=""></div>
            <div id="right">
              <p> زمان برد اما همه چیز خوب است</p>
            </div>
          </div>
          </blockquote>
        </div>
             </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}

        <!-- توضیحات  -->
        <div class="grey-back section">
          <div class="container">
            <div class="comment more">
              {!!$membershipBody->second_part!!}
            </div>
          </div>
        </div>
          </div>
      </div>
</div>
