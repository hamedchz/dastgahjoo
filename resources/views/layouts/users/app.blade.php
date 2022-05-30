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
    <script>
       $(document).ready(function () {
 
 ConvertNumberToPersion();
});

function ConvertNumberToPersion() {
 persian = { 0: '۰', 1: '۱', 2: '۲', 3: '۳', 4: '۴', 5: '۵', 6: '۶', 7: '۷', 8: '۸', 9: '۹' };
 function traverse(el) {
     if (el.nodeType == 3) {
         var list = el.data.match(/[0-9]/g);
         if (list != null && list.length != 0) {
             for (var i = 0; i < list.length; i++)
                 el.data = el.data.replace(list[i], persian[list[i]]);
         }
     }
     for (var i = 0; i < el.childNodes.length; i++) {
         traverse(el.childNodes[i]);
     }
 }
 traverse(document.body);
}
    </script>
    @stack('footer-scripts')
    @livewireScripts

</body>
</html>