

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>عدم دسترسی</title>
 <link rel="icon" href="{{asset('admin/img/core-img/favicons.jpg')}}">
<link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('frontend/style.css')}}" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
</head>

<style>
  html, body {
    height: 100%;
    background-color: #fff;
    font-family: 'IRANSans-Medium';
}


.return-btn{
  color: #fff;
  background-color: #28a745;
  border-color: #28a745;
  font-weight: 700;
  text-align: center;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 0.25rem;
  box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
cursor: pointer;
transition: ease-in-out;
transform: scale(1);
}

.return-btn:hover{
  transform: scale(1.02);
  background-color: #4bd36b;


}
</style>
<body>

  <div class="page-wrapper rtl" >
      <div class="container " style="height: 100vh;">
      <div class="col-12 contact-form" style="height: 100%;display: flex;justify-content: center;align-items: center;width: 100%;background-color:white;border:none; ">
                  <div class="d-flex justify-content-center" style="display: flex; flex-direction:column;align-items: center;">
                 
                  <div class="col-12" >
                    <h3 class="p-2" style="color: #721c24;margin-bottom: 50px;text-align: center;background-color: #f8d7da;border-color: #f5c6cb;border: 1px solid transparent;border-radius: 0.25rem;">شما اجازه دسترسی به این قسمت را ندارید</h3>
                  </div>
  
                  <div class="d-flex justify-content-center">
                    <div class="col-lg-12 text-center">
                     <button  onclick="window.location.href='{{url('/')}}'" type="button" class="btn btn-primary">بازگشت</button>

                    </div>
                  </div>
                </div>
                </div>
                   </div>

      <!-- اسکریپت ها -->
<script src="/frontend/js/jquery.js"></script> 
<script src="/frontend/js/bootstrap.min.js"></script>

</body>
</html>