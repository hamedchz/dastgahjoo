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
    <link rel="icon" href="{{asset('admin/img/core-img/favicon.png')}}">
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
          
               {{$slot}}
            </div>
        </div>
        @if(auth()->user()->vendor)
        @if(Carbon\Carbon::now() > auth()->user()->vendor->package->packageHistories->endDate)
        <div class="alert  fixed-bottom  text-white" role="alert" style="text-align: right; margin-bottom: 0;width:100% !important;font-size:18px;background-color:#dc3545;">
            تاریخ پکیج شما به پایان رسیده است
            <a class="btn btn-primary p-1 font-weight-bold text-white" href="{{route('user.packageorder')}}" style="width:70px;font-size:14px;">تمدید</a>
        </div>
        @endif
        @if(auth()->user()->vendor->isApproved == 1)
        <div class="alert  fixed-bottom  text-dark bg-warning" role="alert" style="text-align: right; margin-bottom: 0;width:100% !important;font-size:18px;background-color:#000;">
           حساب شما در انتظار تایید است
            
        </div>
        @endif
        @if(App\Models\Product::whereBetween('created_at',[auth()->user()->vendor->package->packageHistories->startDate,auth()->user()->vendor->package->packageHistories->endDate])->count() >= auth()->user()->vendor->package->packageHistories->products)
        <div class="alert  fixed-bottom  text-white" role="alert" style="text-align: right; margin-bottom: 0;width:100% !important;font-size:18px;background-color:#dc3545;">
             شما از تمام قابلیت آپلود محصول پکیج استفاده کرده اید 
            <a class="btn btn-primary p-1 font-weight-bold text-white" href="{{route('user.packageorder')}}" style="width:70px;font-size:14px;">تمدید</a>
        </div>
        @endif
        @endif
    </div>
    @livewireScripts
    @include('layouts.admin.partials.footer')
    @stack('scripts')
    @stack('after-scripts')
 
</body>
</html>
