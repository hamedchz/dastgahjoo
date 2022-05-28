<div>
      <!-- بدنه محتوا -->
      <div class="top-content">
        <div id="overlay"></div>
        <div class="inner-bg">
          <div class="container top-titr">
            <div class="display-align bottom-margin2">
              <div class="col-lg-8 text center-align mx-auto">
                <h1><strong>استعلام ماشین آلات درخواستی</strong></h1>
              </div>
            </div>
     
            <div class="display-align">
              <div class="col-lg-8 form-box mx-auto">
              <form method="post" name="" action="" wire:submit.prevent = "store" accept-charset="utf-8">
                <input type="hidden" name="" value="">
                <input type="hidden" name="" value="">
      
                <fieldset>
                  <div class="form-top">
                    <div class="title-form">
                      <svg class="svg-inline--fa fa-envelope fa-w-16" style="color: #1A92DB;" aria-hidden="true" data-prefix="fas" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg>
                    </div>
                    <div class="icon-form">
                      <h2>استعلام</h2>
                      {{-- <p>به همه فروشندگان این دسته</p> --}}
  
                  </div>
                    {{-- <div class="form-top-description">
                      <select name="" size="1" class="custom-select form-control my-1 mr-sm-2" required="">
                        <option value=""> لطفاً دسته را انتخاب کنید:</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}"> {{$category->title}}</option>
                        @endforeach
                      </select>
                    </div> --}}
                  </div>
  
                  <div class="form-middle"></div>
  
                   <div class="form-bottom">
                    <div class="display-align">
                      <div class="col-lg-6">
                        <div class="align-form">
                          <label class="label-input" for="company-label">نام:</label>
                          <div class="input-group bottom-margin mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                              <i class="fas fa-user fa-lg"></i>
                            </div>
                            <select name="" class="custom-select rounded-0">
                              <option value="" selected="">آقا</option>
                              <option value="">خانم</option>
                            </select>
                            <input type="text" wire:model = "state.name" name="" class="form-control  @error('name') is-invalid @enderror" placeholder="نام شما" required="">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div> @enderror
                          </div>
                        </div>
                        <div class="align-form">
                          <label class="label-input" for="company-label">موضوع:</label>
                          <div class="input-group bottom-margin mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                              <i class="fas fa-comment-dots fa-lg"></i>
                            </div>
                            <input type="text" name="" wire:model = "state.subject" class="form-control  @error('subject') is-invalid @enderror" placeholder="موضوع">
                            @error('subject')<div class="invalid-feedback">{{ $message }}</div> @enderror
                          </div>
                        </div>
                        <div class="align-form">
                          <label class="label-input" for="company-label">آدرس:</label>
                          <div class="input-group bottom-margin mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                              <i class="fas fa-home fa-lg"></i>
                            </div>
                            <input type="text" name="" wire:model = "state.address" class="form-control @error('address') is-invalid @enderror" placeholder="آدرس">
                            @error('address')<div class="invalid-feedback">{{ $message }}</div> @enderror

                          </div>
                        </div>
  
                        {{-- <div class="align-form">
                          <label class="label-input" for="company-label">  کدپستی:</label>
                          <div class="input-group bottom-margin mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                              <i class="fas fa-home fa-lg"></i>
                            </div>
                            <input type="number" name="" class="form-control  @error('postal') is-invalid @enderror" wire:model = "state.postal" placeholder="  کدپستی" required="">
                            @error('postal')<div class="invalid-feedback">{{ $message }}</div> @enderror

                          </div>
                        </div> --}}
                      </div>
  
                      <div class="col-lg-6">
                        {{-- <div class="align-form">
                          <label class="label-input" for="company-label">کشور:</label>
                          <div class="input-group bottom-margin mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                              <i class="fas fa-globe fa-lg"></i>
                            </div>
                            <input type="text" name="" class="form-control" placeholder="کشور">
                          </div>
                        </div> --}}
                        <div class="align-form">
                          <label class="label-input" for="company-label">ایمیل:</label>
                          <div class="input-group bottom-margin mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                              <i class="fas fa-at fa-lg"></i>
                            </div>
                            <input type="email" wire:model = "state.email" name="" class="form-control  @error('email') is-invalid @enderror" placeholder="ایمیل" required="">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div> @enderror

                          </div>
                        </div>
  
                        <div class="align-form">
                          <label class="label-input" for="company-label">موبایل:</label>
                          <div class="input-group bottom-margin mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                              <i class="fas fa-phone fa-lg"></i>
                            </div>
                            <input type="number" name="" wire:model = "state.mobile" class="form-control  @error('mobile') is-invalid @enderror" placeholder="تلفن" required="">
                            @error('mobile')<div class="invalid-feedback">{{ $message }}</div> @enderror

                          </div>
                        </div>
                        <div class="align-form">
                          <label class="label-input" for="company-label">  کدپستی:</label>
                          <div class="input-group bottom-margin mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                              <i class="fas fa-home fa-lg"></i>
                            </div>
                            <input type="number" name="" class="form-control  @error('postal') is-invalid @enderror" wire:model = "state.postal" placeholder="  کدپستی" required="">
                            @error('postal')<div class="invalid-feedback">{{ $message }}</div> @enderror

                          </div>
                        </div>
                      </div>
                    </div>
  
                    {{-- <div class="display-align right-align">
                      <div class="col-lg-8">
                        <div class="align-form">
                          <p class="d-inline">فروشنده ماشین آلات؟</p>
                          <p class="d-inline ml-3">
                            <input type="radio" id="yes" name="" value="">
                            <label for="yes">بله</label>
                          </p>
                          <p class="d-inline ml-3">
                            <input type="radio" id="no" name="" value="">
                            <label for="no">خیر</label>
                          </p>
                        </div>
                      </div>
                    </div> --}}
                    <div class="align-form">
                        <label class="label-input" for="msg-text">متن پیام</label>
                        <textarea name="msg" wire:model = "state.description" placeholder="متن پیام" class="msg-text form-control  @error('description') is-invalid @enderror" id="msg-text" required=""></textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div> @enderror

                    </div>
                
                    <div class="display-align">
                      <div class="col-lg-12 center-align">
                        @error('storeMessage')
                        <div class="alert alert-success text-right success-error" role="alert">
                          {{$message}}
                        </div>
                        <script>
                          setTimeout(() => {
                            document.querySelector('.success-error').classList.add('d-none');
                           
                          }, 3000);
                        </script>
                        @enderror
                          <button type="submit" name="" value="" class="btn-all btn-green " style="cursor: pointer;">ارسال درخواست</button>
                      </div>
                    </div>
                  </div>
                </fieldset>
              </form>
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