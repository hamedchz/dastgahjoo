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
                    <div><span> تاریخ :{{$date}}</span></div>
                    @else
                    <h1 class="text-success">پرداخت شما با موفقیت انجام شد</h1>
                    <div><span> شماره پیگیری :{{$receipt->getReferenceId()}}</span></div>
                    <div><span> تاریخ :{{$date}}</span></div>
                    @endif
                  </div>
              </div>
            </div>
              </div>
            </div>
          </div>
    </div>
    
</x-user-layout>