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
                    <form action="{{ route('reset.password.change') }}" method="post">
                      @csrf
                      <fieldset style="display: block;">
                        <div class="form-top">
                          <div class="icon-form">
                            <h3> تغییر رمز عبور:</h3>
                          </div>
                          <div class="title-form">
                            {{-- <i class="fas fa-key"></i> --}}
                          </div>
                        </div>
                          <div class="form-bottom">
                            <div class="align-form email-form">
                                <label class="label-input" for="password">پسورد جدید </label>
                                <input type="text"   name="password" placeholder="پسورد جدید " id="password" class="form-email form-control @error('password') is-invalid @enderror" >
                                @error('password')<div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="align-form email-form">
                                <label class="label-input" for="password_confirmation">تکرار پسورد جدید  </label>
                                <input type="text" value="{{ old('code') }}"   name="password_confirmation" placeholder="تکرار پسورد جدید " id="password_confirmation" class="form-email form-control" >
                            </div>
                            <input type="hidden" name="id" value="{{$user->id}}">
                       
                          <button type="submit" class="btn-all btn-primary btn-next">
                             تغییر رمز عبور
                          </button>
                          
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

