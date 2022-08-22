<div>
    <nav aria-label="خرده نان" class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">پروفایل کاربری   </li>
        </ol>
    </nav>

    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-12 box-margin height-card">
                    <div class="card card-body">
                        <div class="row" style="display: flex;align-items: center;justify-content: space-around;">
                            <h4 class="card-title mb-2">پروفایل کاربری  </h4>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="post" wire:submit.prevent = "updateUser">
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label for="name">نام :</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  wire:model.defer="state.name" >
                                            @error('name')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6">
                                            <label for="mobile">موبایل  :</label>
                                            <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" wire:model.defer="state.mobile" readonly>
                                            @error('mobile')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6">
                                            <label for="password">کلمه عبور  :</label>
                                            <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" wire:model.defer="state.password" >
                                            @error('password')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6">
                                            <label for="password_confirmation">تایید کلمه عبور  :</label>
                                            <input type="text" class="form-control" id="password_confirmation" wire:model.defer="state.password_confirmation" >
                                        </div>
                                         <div class="form-group col-lg-6 col-md-6">
                                            
                                                <label for="avatar" class="form-label">عکس پروفایل</label>
                                                <div class="input-group cust-file-button mb-3">
                                                    <div class="custom-file">
                                                        <input type="file" id="avatar" class="custom-file-input form-control  @error('video') is-invalid @enderror" wire:model.defer="avatar">
                                                        <input type="hidden" value="{{$oldAvatar}}" wire:model.defer="oldAvatar">
                                                        <label class="custom-file-label" for="inputGroupFile03"> عکس پروفایل </label>
                                                      </div>
                                                </div>
                                                @error('avatar')<div class="text-danger">{{ $message }}</div> @enderror
                                            </div>
                                                <div class="col-md-12 mt-2">
                                                @if ($avatar)
                                                  <div class="mt-5 justify-content-center align-items-center">
                                                 
                                                  <img src="{{$avatar->temporaryUrl() }}"  class='pr-2 mb-1 shadow mr-3' style='width:70px;height:70px;' >
                                                 
                                                  </div>
                                                @endif
                                              </div>
                                        <div class="form-group col-12">
                                            <label for="about"> درباره من:</label>
                                            <textarea class="form-control @error('about') is-invalid @enderror" id="about" rows="5" wire:model.defer="state.about"></textarea>
                                            @error('about')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>

                                </div>
                                <button type="submit" class="btn btn-outline-success mb-2 mr-2" style="float:right;"  wire:loading.class="d-none"><i class="fa fa-save"></i> ویرایش</button>
                                 <div class="la-ball-beat la-dark la-sm " wire:loading  style="float:right;">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row-->

        </div>
    </div>

</div>
@push('styles')
<style>
    .la-ball-beat,
.la-ball-beat > div {
  position: relative;
  -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
          box-sizing: border-box;
}
.la-ball-beat {
  display: block;
  font-size: 0;
  color: #fff;
}
.la-ball-beat.la-dark {
  color: #333;
}
.la-ball-beat > div {
  display: inline-block;
  float: none;
  background-color: currentColor;
  border: 0 solid currentColor;
}
.la-ball-beat {
  width: 54px;
  height: 18px;
}
.la-ball-beat > div {
  width: 10px;
  height: 10px;
  margin: 4px;
  border-radius: 100%;
  -webkit-animation: ball-beat .7s -.15s infinite linear;
    -moz-animation: ball-beat .7s -.15s infinite linear;
      -o-animation: ball-beat .7s -.15s infinite linear;
          animation: ball-beat .7s -.15s infinite linear;
}
.la-ball-beat > div:nth-child(2n-1) {
  -webkit-animation-delay: -.5s;
    -moz-animation-delay: -.5s;
      -o-animation-delay: -.5s;
          animation-delay: -.5s;
}
.la-ball-beat.la-sm {
  width: 26px;
  height: 8px;
}
.la-ball-beat.la-sm > div {
  width: 4px;
  height: 4px;
  margin: 2px;
}
.la-ball-beat.la-2x {
  width: 108px;
  height: 36px;
}
.la-ball-beat.la-2x > div {
  width: 20px;
  height: 20px;
  margin: 8px;
}
.la-ball-beat.la-3x {
  width: 162px;
  height: 54px;
}
.la-ball-beat.la-3x > div {
  width: 30px;
  height: 30px;
  margin: 12px;
}
/*
* Animation
*/
@-webkit-keyframes ball-beat {
  50% {
      opacity: .2;
      -webkit-transform: scale(.75);
              transform: scale(.75);
  }
  100% {
      opacity: 1;
      -webkit-transform: scale(1);
              transform: scale(1);
  }
}
@-moz-keyframes ball-beat {
  50% {
      opacity: .2;
      -moz-transform: scale(.75);
          transform: scale(.75);
  }
  100% {
      opacity: 1;
      -moz-transform: scale(1);
          transform: scale(1);
  }
}
@-o-keyframes ball-beat {
  50% {
      opacity: .2;
      -o-transform: scale(.75);
        transform: scale(.75);
  }
  100% {
      opacity: 1;
      -o-transform: scale(1);
        transform: scale(1);
  }
}
@keyframes ball-beat {
  50% {
      opacity: .2;
      -webkit-transform: scale(.75);
        -moz-transform: scale(.75);
          -o-transform: scale(.75);
              transform: scale(.75);
  }
  100% {
      opacity: 1;
      -webkit-transform: scale(1);
        -moz-transform: scale(1);
          -o-transform: scale(1);
              transform: scale(1);
  }
}
  </style> 
@endpush
@push('scripts')
    <script>
        
        $(document).ready(function(){
            toastr.options ={
               
               "progressBar": true,
               "positionClass": "toast-bottom-right",
          
           }
            window.addEventListener('hide-newAdmin', event =>{
            
            if(event.detail['action'] == 'success'){ 
                toastr.success(event.detail.message,'عملیات موفق!')
            }else{
                 toastr.error(event.detail.message,'عملیات ناموفق!')
                }
        })
      
        })
        
    </script>
@endpush