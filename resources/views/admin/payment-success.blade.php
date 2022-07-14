<x-user-layout>
    <div>
        <div class="itemslist" style="min-height: 400px;">
            <div id="overlay"></div>
            <div class="container top-titr">
              <div class="inner-block bg-white">
            <div class="container" style="min-height: 200px;">
              <div class="display-align">
                <div class="col-6 text center-align top-margin2 mx-auto">
                    @if($status == 'FREE')
                    <h1 class="text-success">پرداخت شما با موفقیت انجام شد</h1>
                    <div class="mt-2"><span>  نام پکیج :{{$package_title}}</span></div>
                    <div class="mt-2"><span> تاریخ پرداخت :{{$date}}</span></div>
                    <a class="btn btn-primary mt-3" href="{{route('admin.dashboard.index')}}">پنل کاربری</a>
                    @else
                    <h1 class="text-success">پرداخت شما با موفقیت انجام شد</h1>
                    <div class="mt-2"><span>  نام پکیج :{{$package_title}}</span></div>
                    <div class="mt-2"><span> شماره پیگیری :{{$reciept->getReferenceId()}}</span></div>
                    <div class="mt-2"><span> تاریخ پرداخت :{{$date}}</span></div>
                    <a class="btn btn-primary mt-3" href="{{route('admin.dashboard.index')}}">پنل کاربری</a>

                    @endif
                  </div>
              </div>
            </div>
              </div>
            </div>
          </div>
    </div>
    
</x-user-layout>