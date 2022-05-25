<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! SEO::generate(true) !!}
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/style.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @stack('styles')
    @stack('header-scripts')
    @livewireStyles
</head>
<body>
    <div class="page-wrapper rtl">
        @stack('categoriesheader')
        @include('layouts.users.partials.header')
        @stack('search-header')
        {{$slot}}
        @include('layouts.users.partials.footer')
        @stack('after-footer')
    </div>
    <script src="/frontend/js/jquery.js"></script> 
    <script src="/frontend/js/bootstrap.min.js"></script>
    @livewireScripts
    @stack('footer-scripts')
</body>
</html>