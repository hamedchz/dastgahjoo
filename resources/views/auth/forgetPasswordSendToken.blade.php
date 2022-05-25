<x-user-layout>
    <div>
        <div class="top-content">
            <div id="overlay"></div>
            <div class="inner-bg">
              <div class="container top-titr">
                <div class="display-align">
                  {{-- <div class="col-lg-8 text center-align mx-auto">
                    <h1><strong>ثبت نام</strong>
                    </h1>
                    <div class="description">
                        <p>
                          <strong>شما قبلا ثبت نام کرده اید؟</strong>
                                اینجا وارد شوید:
                           <a class="btn-all btn-green btn-all-small" href="login-info.html">ورود  </a>                          
                          </p>
                      </div>
                  </div> --}}
                </div>
    
                <div class="display-align">
                  <div class="col-lg-6 form-box mx-auto">
                    <form action="{{ route('reset.password.check') }}" method="post">
                      @csrf
                      <fieldset style="display: block;">
                        <div class="form-top">
                          <div class="icon-form">
                            <h3>کد تائید را وارد کنید:</h3>
                          </div>
                          <div class="title-form">
                            {{-- <i class="fas fa-key"></i> --}}
                          </div>
                        </div>
                          <div class="form-bottom">
                            <div class="align-form email-form">
                                <label class="label-input" for="code">کد تائید</label>
                                <input type="number" inputmode="numeric" value="{{ old('code') }}" name="code" placeholder="کد تائید" id="code" class="form-email form-control @error('code') is-invalid @enderror" >
                                @error('code')<div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <input type="hidden" name="id" value="{{$user->id}}">
                            @if(isset($error))
                            <div class="alert alert-danger" id="error">لطفا کد پیامک شده وارد نمائید</div>
                           @endif
                         @if(isset($codeSend) && $codeSend==0)
                         <div class="alert alert-warning" id="error">کاربری با این شماره موبایل وجود ندارد</div>
                          @elseif(isset($errorCode) && $errorCode==1)
                              <div class="alert alert-warning" id="error">کد وارد شده صحیح نمی باشد</div>
                          @elseif(isset($errorSend))
                              <div class="alert alert-warning" id="error">کد تائیدیه مجدد برای شما پیامک شد</div>
                          @elseif(isset($errorNull))
                              <div class="alert alert-success" id="error">کد تائیدیه برای شما پیامک شد</div>
                          {{-- @elseif(isset($errorTime))
                              <div class="alert alert-warning">کد تائیدیه قبلا برای شما ارسال شده است.<br>
                                  در صورت نیاز به درخواست مجددا تا 10 دقیقه منتظر بمانید</div> --}}
                          @endif
                          <button type="submit" class="btn-all btn-primary btn-next">تائید</button>
                          
                        </div>
                      
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    @push('after-footer')
        <!-- عکس پس زمینه -->
        <div class="parallax-background" >
        <img src="{{asset('users/background.jpg')}}" ></div>
    @endpush
    @push('scripts')
    <script>
      const error = document.querySelector('#error')
      if(error){
        setTimeout(() => {
         error.classList.add('d-none')
        }, 5000);
      }
    </script>
    @endpush
</x-user-layout>

