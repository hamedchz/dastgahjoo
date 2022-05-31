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
                     @forelse($favorites as $favorite)
                      <tr>
                        <th scope="row">{{$favorite->product->category->title}}</th>
                        <td>
                          <div >
                            <img src="{{asset($favorite->product->images[0]->image)}}" alt="{{$favorite->product->name}}" style="width: 100px; height: 70px;">
                          </div>
                        </td>
                        <td><a href="{{route('product.detail',$favorite->product->id)}}">{{$favorite->product->type_of_machine}}</a></td>
                        <td><a href="{{route('product.detail',$favorite->product->id)}}">{{$favorite->product->manufacturer}}</a></td>
                        <td><a href="{{route('product.detail',$favorite->product->id)}}">{{$favorite->product->model}}</a></td>
                        <td>{{$favorite->product->year_of_manufacture}}</td>
                        <td>{{$favorite->product->vendor->identityNumber}}</td>
                        <td>{{$favorite->product->itemNo}}</td>
                        @empty
                        <td align="center" colspan="8">   
                          هیچ موردی در لیست  دلخواه شما وجود ندارد!
                        </td>
                      </tr>
                      @endforelse
                    </tbody>
                  </table>
            </div>
        
          </div>
        </div>
          </div>
        </div>
      </div>
    </div>
