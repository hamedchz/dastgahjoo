<div>
    <div class="itemslist" style="min-height: 400px;">
        <div id="overlay"></div>
        <div class="container top-titr">
          <div class="inner-block bg-white">
        <div class="container" style="min-height: 200px;">
          <div class="display-align">
          
            <div class="col-12 text center-align top-margin2 mx-auto">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">دسته</th>
                        <th scope="col">عکس</th>
                        <th scope="col">نوع ماشین</th>
                        <th scope="col">سازنده</th>
                        <th scope="col">مدل</th>
                        <th scope="col">سال ساخت</th>
                        <th scope="col">آیدی فروشنده</th>
                        <th scope="col">آیدی کالا</th>

                      </tr>
                    </thead>
                    <tbody>
                     @foreach(Session::get('watchList') as $product)
                      <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="col-6 text center-align top-margin2 mx-auto">
                {{-- <h1>هیچ موردی در لیست  دلخواه شما وجود ندارد!</h1> --}}
                
              </div>
          </div>
        </div>
          </div>
        </div>
      </div>
    </div>
