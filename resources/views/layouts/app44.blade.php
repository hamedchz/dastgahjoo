<!doctype html>
<html lang="en">

<head>
    @include('layouts.admin.partials.head')
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
    </div>
    @livewireScripts
    @stack('scripts')
   @include('layouts.admin.partials.footer')
</body>
</html>
