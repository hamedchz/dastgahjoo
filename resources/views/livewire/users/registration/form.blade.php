<div >
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
                            اینجا وارد شوید:
                       <a class="btn-all btn-green btn-all-small" href="login-info.html">ورود  </a>                          
                      </p>
                  </div>
              </div>
            </div>

            <div class="display-align" wire:ignore.self>
              <div class="col-lg-6 form-box mx-auto">
                  <fieldset style="display: block;">

                    <div class="form-top">
                      <div class="icon-form">
                        <h3>جزئیات دسترسی</h3>
                        <p>حساب خود را تنظیم کنید:</p>
                      </div>
                      <div class="title-form">
                        <i class="fas fa-key"></i>
                      </div>
                    </div>
                    <form  wire:submit.prevent = "addNewUser" class="registration-form">
                    <div class="form-bottom">
                        <div class="align-form email-form">
                            <label class="label-input" for="form-name">نام و نام خانوادگی</label>
                            <input type="text"  placeholder="نام و نام خانوادگی..." id="form-name" class="form-email form-control @error('name') is-invalid @enderror"  wire:model.defer="state.name">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                      <div class="align-form email-form">
                        <label class="label-input" for="form-mobile">موبایل</label>
                        <input type="text"  placeholder="موبایل..." class="form-email form-control @error('mobile') is-invalid @enderror" id="form-mobile" wire:model.defer="state.mobile">
                        @error('mobile')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    
                      <div class="align-form">
                        <label class="label-input" for="form-password">رمز عبور</label>
                        <input type="password" name="password" placeholder="رمز عبور..." class="form-password form-control @error('password') is-invalid @enderror" id="form-password" wire:model.defer="state.password">
                        @error('password')<div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                      <div class="align-form password-group">
                        <label class="label-input" for="form-repeat-password">تایید رمز عبور</label>
                        <input type="password" name="password_confirmation" placeholder="تایید رمز عبور..." class="form-repeat-password form-control" id="form-repeat-password" wire:model.defer="state.password_confirmation">
                      </div>
                      <button type="submit" class="btn-all btn-primary btn-next">ادامه</button>
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
