<x-user-layout>
    <!-- بدنه محتوا -->
    <div class="top-content " style="margin-top: 100px;">
        <div id="overlay"></div>
        <div class="inner-bg">
          <div class="container">
            <div class="display-align">
              <div class="col-lg-6 form-box mx-auto">
               
                  
                    <div class="form-top">
                      <div class="icon-form">
                     <h2><strong>ورود</strong></h2>
                      <p><strong><a href="{{route('register')}}">اینجا ثبت نام کنید</a></strong></p>
                      <p><small class="text-dark">لطفاً دقت فرمایید رمز عبور به زبان فارسی و یا انگلیسی بودن کیبورد و بزرگ و کوچکی حروف حساس است</small></p>
                      </div>
                      <div class="title-form">
                        <i class="fas fa-key"></i>
                      </div>
                    </div>
                    <form method="POST" action="{{ route('post.login') }}">
                      @csrf
                    <div class="form-bottom">
                      <div class="align-form">
                        <div class="input-group bottom-margin mr-sm-2 mb-sm-0">
                          <div class="input-group-addon" style="width: 2.6rem; background-color: #65696C; color: white;">
                              <i class="fas fa-user-plus"></i>
                            </div>
                          <input type="number"  name="mobile"  class="form-control" id="loginMobile" placeholder="موبایل " required >
                          {{-- <input name="mobile" inputmode="numeric" class="input1" type="number" placeholder="موبایل" id="loginMobile"> --}}

                        </div>
                      </div>
                      <div class="align-form has-danger">
                        <div class="input-group bottom-margin mr-sm-2 mb-sm-0">
                          <div class="input-group-addon" style="width: 2.6rem; background-color: #65696C; color: white;">
                            <i class="fa fa-key"></i>
                          </div>
                          <input type="password" name="password" class="form-control" id="password" placeholder="رمز عبور" required >
                        </div>
                      </div>
                      <div class="display-align bottom-margin2">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6 text-left"><a href="{{ route('reset.password') }}"  rel="">
                          <strong>رمز عبور را فراموش کرده اید؟</strong>
                        </a>
                      </div>
                      </div>
                      @if(isset($error))
                           <div class="alert alert-danger" id="error">کلمه عبور یا نام کاربری اشتباه است</div>
                      @endif
                      @if(isset($errorActivity))
                          <div class="alert alert-danger" id="error">حساب شما غیرفعال است</div>
                      @endif
                      @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                      <div class="display-align" style="margin: 20px 0;">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8 center-align">
                          <button type="submit" class="btn-all btn-green">ورود</button>
                        </div>
                        <div class="col-sm-2"></div>
                      </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @push('after-footer')
      <div class="parallax-background" >
        <img src="{{asset('users/background.jpg')}}" ></div>
      @endpush
      @push('scripts')
      <script>
        const error = document.querySelector('#error')
        if(error){
          setTimeout(() => {
           error.classList.add('d-none')
          }, 3000);
        }
      </script>
      @endpush
</x-user-layout>

