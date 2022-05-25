<div>

    <div class="top-content">
      <div id="overlay"></div>
      <div class="inner-bg">
        <div class="container top-titr">
          <div class="display-align">
            <div class="col-lg-8 text center-align mx-auto">
                <h1><b>استعلام </b></h1>
                <div class="description">
                  <p>لطفاً برای هرگونه سؤالی با ما تماس بگیرید!</p>
              </div>
            </div>
          </div>

            <div class="display-align">
              <div class="col-lg-8 form-box mx-auto">
              <form id="mail_form" method="post" action="#"  wire:submit.prevent="store" accept-charset="utf-8">
                <fieldset>
                  <div class="form-top">
                    <div class="icon-form">
                      <h2>اطلاعات محصول</h2>
                      <p><b>شماره.:</b> {{$productInfo->itemNo}}</p>
                    </div>
                    <div class="title-form">
                      <i class="fas fa-envelope"></i>
                    </div>
                    <div class="form-top-description float-right">
                        <b>دستگاه:</b> 
                         ({{$productInfo->name}} )
                    </div>
                  </div>
                  <div class="form-middle ver-pad"></div>

                  <div class="form-bottom">
                    <div class="display-align">
                      <div class="col-lg-6">
                        {{-- <div class="align-form">
                          <label class="label-input" for="company-label">شرکت:</label>
                          <div class="input-group bottom-margin mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                              <i class="fas fa-building fa-lg"></i>
                            </div>
                            <input type="text" name="" wire:model.defer="state.company" class="form-control" placeholder="شرکت" required="">
                          </div>
                        </div> --}}
                        <div class="align-form">
                          <label class="label-input" for="company-label">نام:</label>
                          <div class="input-group bottom-margin mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                              <i class="fas fa-user fa-lg"></i>
                            </div>
                            <select name="" class="custom-select rounded-0">
                              <option value="Mr" selected="">آقا</option>
                              <option value="Ms">خانم</option>
                            </select>
                            <input type="text" name="" wire:model.defer="state.title" class="form-control" placeholder="نام" required="">
                          </div>
                        </div>
                        {{-- <div class="align-form">
                          <label class="label-input" for="company-label">آدرس:</label>
                          <div class="input-group bottom-margin mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                              <i class="fas fa-home fa-lg"></i>
                            </div>
                            <input type="text" name="" class="form-control" placeholder="آدرس" required="">
                          </div>
                        </div> --}}
                        {{-- <div class="align-form">
                          <label class="label-input" for="company-label">کد و شهر:</label>
                          <div class="input-group bottom-margin mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                              <i class="fas fa-home fa-lg"></i>
                            </div>
                            <input type="text" name="" class="form-control" placeholder="کد و شهر" required="">
                          </div>
                        </div> --}}
                      </div>
                      <div class="col-lg-6">
                        <div class="align-form">
                          <label class="label-input" for="company-label">ایمیل:</label>
                          <div class="input-group bottom-margin mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                              <i class="fas fa-at fa-lg"></i>
                            </div>
                            <input type="email" name="" wire:model.defer="state.email" class="form-control  @error('email') is-invalid @enderror" placeholder="ایمیل" required="">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div> @enderror

                          </div>
                        </div>
                        <div class="align-form">
                          <label class="label-input" for="company-label">تلفن:</label>
                          <div class="input-group bottom-margin mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                              <i class="fas fa-phone fa-lg"></i>
                            </div>
                            <input type="number" name="" wire:model.defer="state.phone" class="form-control  @error('phone') is-invalid @enderror" placeholder="تلفن" required="">
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div> @enderror

                          </div>
                        </div>  
                        {{-- <div class="align-form">
                          <label class="label-input" for="company-label">کشور:</label>
                          <div class="input-group bottom-margin mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                              <i class="fas fa-globe fa-lg"></i>
                            </div>
                            <input type="text" name="" class="form-control" placeholder="کشور" required="">
                          </div>
                        </div> --}}
                                   
                        {{-- <div class="align-form">
                          <p class="d-inline">فروشنده ماشین آلات؟</p>
                          <p class="d-inline ml-3">
                            <input type="radio" id="yes" name="" value="">
                            <label for="yes">بله</label>
                          </p>
                          <p class="d-inline ml-3">
                            <input type="radio" id="no" name="" value="">
                            <label for="no">خیر</label>
                          </p>
                        </div> --}}
                      </div>
                     </div>
                   {{--<div class="display-align">
                      <div class="col-lg-12">
                        <div class="align-form">
                          <p class="d-inline">لطفا با من تماس بگیرید:</p>
                          <div class="category-checkbox d-inline ml-4">
                                <label class="options">
                              <input type="checkbox" name="" value="">
                               <span class="label-text"></span>
                                      </label>
                                  </div>
                                </div>
                              </div>
                            </div> --}}
                    <div class="display-align">
                      <div class="col-lg-12">
                        <div class="align-form">
                          <p class="d-inline">لطفا نوع استعلام را انتخاب کنید:</p>
                              <div class="category-checkbox d-inline ml-4">
                                      <label class="options">
                              <input type="checkbox" name="" checked value=""  wire:model.defer="state.isPrice">
                               <span class="label-text">قیمت</span>
                                      </label>
                                  </div>
                                      <div class="category-checkbox d-inline ml-2">
                                      <label class="options">
                              <input type="checkbox" name="" value="" wire:model.defer="state.moreInformation">
                              <span class="label-text">اطلاعات بیشتر</span>
                                      </label>
                                  </div>
                                  <div class="category-checkbox d-inline ml-2">
                                      <label class="options">
                              <input type="checkbox" name="" value="" wire:model.defer="state.morePhotos">
                               <span class="label-text">عکسهای بیشتر</span>
                                      </label>
                                  </div>
                                  <div class="category-checkbox d-inline ml-2">
                                      <label class="options">
                                    <input type="checkbox" name="" value="" wire:model.defer="state.offer"> 
                                   <span class="label-text">تخفیف</span>
                                      </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                    <div class="display-align">
                      <div class="col-lg-12">
                        <div class="align-form">
                          <label class="label-input" for="msg-text">متن پیام</label>
                          <textarea  placeholder=" جناب {{$productInfo->vendor->user->name}} عزیز من به اطلاعاتی در مورد دستگاه شما نیاز مند هستم     . ..." wire:model.defer="state.comment" class="msg-text form-control" id="msg-text">
                           
                           </textarea>
                        </div>
                      </div>
                    </div>
                    {{-- <div class="display-align">
                      <div class="col-lg-12">
                        <div class="align-form mb-0">
                           <p class="d-inline">ارسال استعلام؟</p>
                          <p class="d-inline ml-3">
                            <input type="radio" id="request-yes" name="" value="">
                            <label for="request-yes">بله</label>
                          </p>

                          <p class="d-inline ml-3">
                            <input type="radio" id="request-no" name="" value="">
                            <label for="request-no">خیر</label>
                          </p>
                       </div>
                      </div>
                    </div> --}}

                    {{-- <div class="display-align mb-3">
                      <div class="col-lg-12">
                        <p class="d-inline text-muted" style="font-size: 14px;">(به همه فروشندگان برای چنین ماشینی)</p>
                      </div>
                    </div> --}}

                    {{-- <div class="display-align">
                      <div class="col-lg-8">
                        <div class="align-form mb-0">
                          <p class="d-inline">کپی کردن؟</p>
                          <p class="d-inline ml-3">
                            <input type="radio" id="copy-yes" name="" value="">
                            <label for="copy-yes">بله</label>
                          </p>
                          <p class="d-inline ml-3">
                            <input type="radio" id="copy-no" name="" value="">
                            <label for="copy-no">خیر</label>
                          </p>
                        </div>
                      </div>
                    </div> --}}
                    {{-- <div class="display-align mb-3">
                      <div class="col-lg-12">
                        <p class="d-inline text-muted" style="font-size: 14px;">(کپی درخواست شما به آدرس ایمیل شما ارسال خواهد شد)</p>
                      </div>
                    </div> --}}

                  {{-- <div class="display-align">
                    <div class="col-lg-8">
                      <div class="align-form mb-0">
                        <p class="d-inline">داده های ورودی ذخیره شود؟</p>
                        <p class="d-inline ml-3">
                          <input type="radio" id="save-yes" name="" value="" checked="">
                          <label for="save-yes">بله</label>
                        </p>

                        <p class="d-inline ml-3">
                          <input type="radio" id="save-no" name="" value="">
                          <label for="save-no">خیر</label>
                        </p>
                      </div>
                    </div>
                  </div> --}}

                  {{-- <div class="display-align">
                    <div class="col-lg-12">
                      <p class="d-inline text-muted" style="font-size: 14px;">(داده های ورودی را برای سوالات بیشتر ذخیره کنید)</p>
                    </div>
                  </div>                  --}}
                    <div class="display-align top-margin2">
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
