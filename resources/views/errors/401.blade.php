<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>خطا</title>
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">
</head>
<body>
    <div class="container" style="width:100vw; height:100vh;display: flex;justify-content: center;align-items: center;position: relative;text-align: center; overflow:hidden;">
        <p style=" border-radius:5px;position: absolute;bottom:50%; padding:3vmin 12vmin 3vmin 3vmin; font-weight:600; font-size: 20px; color: #721c24; background-color: #f8d7da; padding: 1rem 2.5rem;">پکیج شما به پایان رسیده است</p>
        <a href="{{route('admin.dashboard.index')}}" style=" margin-top:40px;color: #fff;background-color: #10db4d;border-color: #dc3545;display: inline-block;font-weight: 500;text-align: center; border: 1px solid transparent;
        padding: 0.375rem 0.75rem;border-radius: 0.25rem;  font-size: 15px;">برگشت</a>
      </div>
</body>
</html>




  