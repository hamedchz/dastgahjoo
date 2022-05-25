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
                                        <div class="mb-3">
                                            <label for="avatar" class="form-label">عکس پروفایل</label>
                                            <input class="form-control form-control-sm" id="avatar" type="file" wire:model.defer="avatar">
                                            <input type="hidden" value="{{$oldAvatar}}" wire:model.defer="oldAvatar">
                                            @error('avatar')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="about"> درباره من:</label>
                                            <textarea class="form-control @error('about') is-invalid @enderror" id="about" rows="5" wire:model.defer="state.about"></textarea>
                                            @error('about')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>

                                </div>
                                <button type="submit" class="btn btn-outline-success mb-2 mr-2" style="float:right;"><i class="fa fa-save"></i> ویرایش</button>

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