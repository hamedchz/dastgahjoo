<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>پنل مدیریت</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('admin/img/core-img/favicons.png')}}">
    @stack('before-styles')
    {{-- toast --}}
    <link rel="stylesheet" href="{{asset('admin/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @stack('styles')
    @livewireStyles

</head>

<body>
    <!-- Preloader -->
    @include('layouts.admin.partials.preloader')
    <!-- Preloader -->
    <div class="ecaps-page-wrapper">
        <!-- Sidemenu Area -->
            @include('layouts.admin.partials.aside')
        <!-- Page Content -->
        <div class="ecaps-page-content">
            <!-- Top Header Area -->
            
            @include('layouts.admin.partials.navbar')
            <!-- Main Content Area -->
            
            <div class="main-content">
                @if(auth()->user()->vendor)
                @if(Carbon\Carbon::now() > App\Models\PackageHistory::where('user_id',auth()->user()->id)->where('package_id',auth()->user()->vendor->package->id)->first()->endDate)
                <div class="notification_modal_access " style=" padding: 1rem 2rem;   box-shadow: 0 2px 7px rgb(0 0 0 / 25%);border-radius: 0.375rem;position: fixed;bottom: 1.25rem;margin: auto;z-index: 100;background-color: rgb(241, 119, 119);">
                    <div  style="display: flex;align-items: center;">
                        <p style="font-weight: 700;color: #000;margin-bottom:0;">  تاریخ پکیج شما به پایان رسیده است</p>
                        <div style="    margin-right: 1rem;">
                            <a href="{{route('user.packageorder')}}" id="accept_access_notification" class="hover ">تمدید</a>
                        </div>
                    </div>
                </div> 
                @endif
                @if(auth()->user()->vendor->isApproved == 1)
                <div class="notification_modal_access " style=" padding: 1rem 1rem;   box-shadow: 0 2px 7px rgb(0 0 0 / 25%);border-radius: 0.375rem;position: fixed;bottom: 1.25rem;margin: auto;z-index: 100;background-color: rgb(241, 119, 119);">
                    <div  style="display: flex;align-items: center;">
                        <p style="font-weight: 700;color: black;margin-bottom:0;">
                            حساب شما در انتظار تایید است
                        </p>
                        {{-- <div style="    margin-right: 1rem;">
                            <a href="{{route('user.packageorder')}}" id="accept_access_notification" class="hover ">تمدید</a>
                        </div> --}}
                    </div>
                </div>
                {{-- <div class="alert  fixed-bottom  text-dark bg-warning" role="alert" style="text-align: right; margin-bottom: 0;width:100% !important;font-size:18px;background-color:#000;">
                    
                </div> --}}
                @endif

                @if(App\Models\Product::whereBetween('created_at',[App\Models\PackageHistory::where('user_id',auth()->user()->id)->where('package_id',auth()->user()->vendor->package->id)->first()->startDate,App\Models\PackageHistory::where('user_id',auth()->user()->id)->where('package_id',auth()->user()->vendor->package->id)->first()->endDate])->count() >= App\Models\PackageHistory::where('user_id',auth()->user()->id)->where('package_id',auth()->user()->vendor->package->id)->first()->products)
                <div class="notification_modal_access " style=" padding: 1rem 2rem;   box-shadow: 0 2px 7px rgb(0 0 0 / 25%);border-radius: 0.375rem;position: fixed;bottom: 1.25rem;margin: auto;z-index: 100;background-color: rgb(241, 119, 119);">
                    <div  style="display: flex;align-items: center;">
                        <p style="font-weight: 700;color: black;margin-bottom:0;">
                            شما از تمام قابلیت آپلود محصول پکیج استفاده کرده اید 
                        </p>
                        <div style="    margin-right: 1rem;">
                            <a href="{{route('user.packageorder')}}" id="accept_access_notification" class="hover ">تمدید</a>
                        </div>
                    </div>
                </div> 
                {{-- <div class="alert  fixed-bottom  text-white" role="alert" style="text-align: right; margin-bottom: 0;width:100% !important;font-size:18px;background-color:#dc3545;">
                    <a class="btn btn-primary p-1 font-weight-bold text-white" href="{{route('user.packageorder')}}" style="width:70px;font-size:14px;">تمدید</a>
                </div> --}}
                @endif
                @endif
            
               {{$slot}}
            </div>
        </div>
      
    </div>
    @livewireScripts
    @include('layouts.admin.partials.footer')
    @stack('scripts')
    @stack('after-scripts')
  
</body>
</html>
