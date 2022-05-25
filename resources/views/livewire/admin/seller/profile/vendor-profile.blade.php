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
                            
                            @switch($user[0]->isApproved)
                                @case(1)
                                <span class="badge badge-warning" style="float:left;" >در حال بررسی</span>
                                    @break
                                @case(2)
                                <span class="badge badge-success" style="float:left;" >تایید شده</span>
                                    @break
                                @case(3)
                                <span class="badge badge-danger" style="float:left;" >تایید نشده </span>
                                @break
                                @default
                            @endswitch
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="post" wire:submit.prevent = updateVendor>
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                            <label for="name">نام :</label>
                                            <input type="text" class="form-control" id="name" wire:model.defer="state.name">
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6">
                                            <label for="mobile">موبایل  :</label>
                                            <input type="text" class="form-control" id="mobile" wire:model.defer="state.mobile" readonly >
                                        </div>
                                    
                                       
                                        <div class="form-group col-lg-6 col-md-6">
                                            <label for="package">پکیج ها  :</label>
                                            @forelse($user[0]->user->historyPackages as $package)
                                            <input type="text" class="form-control mt-2" id="package" value="{{$package->package->title}}" readonly>
                                            @empty
                                            <input type="text" class="form-control mt-2" id="package" value="پکیج خریداری شده وجود ندارد" >
                                            @endforelse
                                        </div>
                                            <div class="form-group col-lg-6 col-md-6"></div>
                                            <div class="form-group col-lg-6 col-md-6">
                                                <label for="province">استان  :</label>
                                                <input class="form-control" type="text" value="{{$user[0]->province->title}}" readonly>
                                                {{-- <select class="form-select form-select-sm form-control" aria-label=".form-select-sm example"  readonly>
                                                    @foreach ($provinces as $province)
                                                      <option value="{{$province->id}}" {{ $province->id == $user[0]->province_id ? 'selected' : ''}}>{{$province->title}}</option>
                                                    @endforeach
                                                  </select> --}}
                                                  <select class="form-select form-select-sm form-control mt-2" aria-label=".form-select-sm example" wire:change="getCity(event.target.value)" id="province">
                                                    <option selected> انتخاب کنید</option>
                                                    @foreach ($provinces as $province)
                                                      <option value="{{$province->id}}" >{{$province->title}}</option>
                                                    @endforeach
                                                  </select>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6">
                                                <label for="city">شهر  :</label>
                                                <input class="form-control" type="text" value="{{$user[0]->city->title}}" readonly>

                                                  <select class="form-select form-select-sm form-control mt-2" aria-label=".form-select-sm example" id="city">
                                                    <option selected> انتخاب کنید</option>
                                                    @foreach ($cities as $city)
                                                      <option value="{{$city->id}}" >{{$city->title}}</option>
                                                
                                                   @endforeach
                                                  </select>
                                            
                                            </div>
                                            {{-- <div class="form-group col-lg-6 col-md-6">
                                                
                                                <select class="form-select form-select-sm form-control" aria-label=".form-select-sm example" wire:change="getCity(event.target.value)">
                                                    @foreach ($provinces as $province)
                                                      <option value="{{$province->id}}" >{{$province->title}}</option>
                                                    @endforeach
                                                  </select>
                                            </div> --}}
                                            {{-- <div class="form-group col-lg-6 col-md-6">
                                                <label for="city">شهر  :</label>
                                              
                                            </div> --}}
                                            <div class="form-group col-lg-6 col-md-6">
                                                <label for="address">آدرس  :</label>
                                                <input type="text" class="form-control mt-2" id="address"  wire:model.defer="address">
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6">
                                                <label for="address">فکس  :</label>
                                                <input type="text" class="form-control mt-2" id="address"  wire:model.defer="fax">
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6">
                                                <label for="address">ایمیل  :</label>
                                                <input type="text" class="form-control mt-2" id="address"  wire:model.defer="email">
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6">
                                                <label for="phone">تلفن  :</label>
                                                <input type="text" class="form-control mt-2" id="phone"  wire:model.defer="phone">
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6">
                                                <label for="address">نماینده  :</label>
                                                <input type="text" class="form-control mt-2" id="address" value="{{$user[0]->contactPerson}}" wire:model.defer="contactPerson">
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6"></div>
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
                                                <input class="form-control form-control-sm" id="avatar" type="file" wire:model.defer="avatar">
                                                <input type="hidden" value="{{$oldAvatar}}" wire:model.defer="oldAvatar">
                                                @error('avatar')<div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>
                                       
                                                  {{-- @can('pro-seller')
                                                  <div class="form-group col-lg-6 col-md-6">
                                                    <label for="address">لوگو  :</label>
                                                    <input class="form-control form-control-sm" id="avatar" type="file" wire:model.defer="logo">
                                                    <input type="hidden" value="{{$oldLogo}}" wire:model.defer="oldLogo">
                                                    </div>
                                                @endcan --}}

                                        <div class="form-group col-12">
                                            <label for="about"> درباره من:</label>
                                            <textarea class="form-control" id="about" rows="5" wire:model.defer="state.about"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-outline-success mb-2 mr-2" style="float:right;"><i class="fa fa-save"></i> ویرایش</button>

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
@push('scripts')
    <script>
        
        $(document).ready(function(){
            $(document).on('change', '#province',function(){
                @this.set('province',$(this).val());
            });
            $(document).on('change', '#city',function(){
                @this.set('city',$(this).val());
            });
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