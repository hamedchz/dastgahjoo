<x-user-layout>
    <div class="itemslist">
        <div class="top-content">
            <div id="overlay"></div>
            <div class="inner-bg">
              <div class="container top-titr">
                <div class="display-align">
                  <div class="col-lg-8 text center-align mx-auto">
                    <h1><strong>ثبت نام</strong>
                    </h1>
                    <div class="description">
                        <p>
                          <strong>شما قبلا ثبت نام کرده اید؟</strong>
                                 وارد شوید:
                           <a class="btn-all btn-green btn-all-small" href="{{route('login')}}">ورود  </a>                          
                          </p>
                      </div>
                  </div>
                </div>
    
                <div class="display-align">
                  <div class="col-lg-6 form-box mx-auto">
                      <fieldset style="display: block;">
    
                        <div class="form-top">
                          <div class="icon-form">
                            <h3>ثبت نام کاربر جدید</h3>
                          </div>
                          <div class="title-form">
                            <i class="fas fa-key"></i>
                          </div>
                        </div>
                        <form  method="POST" action="{{ route('post.register') }}">
                          @csrf
                          <div class="form-bottom">
                            <div class="align-form email-form">
                                <label class="label-input" for="form-name">نام و نام خانوادگی</label>
                                <input type="text"  name="name" placeholder="نام و نام خانوادگی..." id="form-name" class="form-email form-control @error('name') is-invalid @enderror" >
                                @error('name')<div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                          <div class="align-form email-form">
                            <label class="label-input" for="form-mobile">موبایل</label>
                            <input type="text" name="mobile" placeholder="موبایل..." class="form-email form-control @error('mobile') is-invalid @enderror" id="form-mobile">
                            @error('mobile')<div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                          <div class="align-form">
                            <label class="label-input" for="form-password">رمز عبور</label>
                            <input type="password" name="password" placeholder="رمز عبور..." class="form-password form-control @error('password') is-invalid @enderror" id="form-password" >
                            @error('password')<div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                          <div class="align-form password-group">
                            <label class="label-input" for="form-repeat-password">تایید رمز عبور</label>
                            <input type="password" name="password_confirmation" placeholder="تایید رمز عبور..." class="form-repeat-password @error('password_confirmation') is-invalid @enderror form-control" id="form-repeat-password">
                            @error('password_confirmation')<div class="invalid-feedback">{{ $message }}</div> @enderror

                          </div>
                          <div><input type="checkbox" id="policyCheck" name="policyCheck" value="1">
                            <label for="vehicle1">با<a href="" data-toggle="modal" data-target="#policy">   شرایط و قوانین </a> سایت موافقم </label><br></div>
                            @if(isset($errorPolicy))
                            <div class="alert alert-danger" id="error">لطفا  شرایط و قوانین سایت را تائید نمایید!</div>
                           @endif

                            @if(isset($error))
                          <div class="alert alert-danger" id="error">لطفا در سایت ثبت نام و موبایل خود را تائید نمایید!</div>
                         @endif
                         @if(isset($errorUnq))
                         <div class="alert alert-danger" id="error">این شماره قبلا ثبت  شده است</div>
                        @endif
                 
                          <button type="submit" class="btn-all btn-primary btn-next mt-2">ثبت نام</button>
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

    <!-- Modal -->
<x-policy-modal :policy="$policy"/>
</x-user-layout>

