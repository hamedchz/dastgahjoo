<div class="itemslist">
    <div class="top-content">
        <div id="overlay"></div>
        <div>
          <div class="container">
            <div class="display-align top-titr">
              <div class="col-lg-8 text center-align mx-auto">
                <h1 class="text-white"><strong>قوانین و مقررات سایت</strong></h1>
                <div class="description">
                  <p>
                    <strong><a id="login" class="btn-all btn-green " href="{{route('contact-us')}}">تماس با ما</a>
                    </strong>
                  </p>
                </div>
              </div>
            </div>
            <div class="display-align">
              <div class="about-description">
                <!-- بخش اول -->
                <article class="about-entry">
                  <div class="about-entry-inner">
                    <div class="about-icon bg-primary">
                      <svg class="svg-inline--fa fa-building fa-w-14 fa-lg" aria-hidden="true" data-prefix="fas" data-icon="building" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M436 480h-20V24c0-13.255-10.745-24-24-24H56C42.745 0 32 10.745 32 24v456H12c-6.627 0-12 5.373-12 12v20h448v-20c0-6.627-5.373-12-12-12zM128 76c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12V76zm0 96c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40zm52 148h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12zm76 160h-64v-84c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v84zm64-172c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40zm0-96c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40zm0-96c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12V76c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40z"></path></svg>
                    </div>
                    <div class="about-label">
                       {!!$policy->body!!}
                    </div>
                  </div>
                </article>
                <article class="about-entry begin">
                  <div class="about-entry-inner">
                    <div class="about-icon" >
                      <svg class="svg-inline--fa fa-plus fa-w-14 fa-lg" aria-hidden="true" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M448 294.2v-76.4c0-13.3-10.7-24-24-24H286.2V56c0-13.3-10.7-24-24-24h-76.4c-13.3 0-24 10.7-24 24v137.8H24c-13.3 0-24 10.7-24 24v76.4c0 13.3 10.7 24 24 24h137.8V456c0 13.3 10.7 24 24 24h76.4c13.3 0 24-10.7 24-24V318.2H424c13.3 0 24-10.7 24-24z"></path></svg>
                      </div>
                  </div>
                </article>
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
