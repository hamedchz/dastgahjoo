<div>
    <div class="top-content">
        <div id="overlay"></div>
        <div>
          <div class="container">
            <div class="display-align top-titr">
              <div class="col-lg-8 text center-align mx-auto">
                  <h1><strong>پروفایل فروشنده</strong></h1>
                  <div class="description">
                    <p>
                      <strong></strong>
                    </p>
                </div>
                </div>
              </div>
        
              <fieldset>
                <div class="profile-title">
                  <div class="profile-title-top">
                    <h2>{{$vendor->user->name}}</h2>
                  </div>

                  <div class="profile-icon-top">
                  <svg class="svg-inline--fa fa-briefcase fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="briefcase" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M320 288h192v144c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V288h192v20c0 6.627 5.373 12 12 12h104c6.627 0 12-5.373 12-12v-20zm192-112v80H0v-80c0-26.51 21.49-48 48-48h80V80c0-26.51 21.49-48 48-48h160c26.51 0 48 21.49 48 48v48h80c26.51 0 48 21.49 48 48zM320 96H192v32h128V96z"></path></svg><!-- <i class="fas fa-briefcase"></i> -->
                </div>
              </div>
              <div class="profile-bottom">
                <div class="card bottom-margin2">
                  <div class="card-body">
                    <div class="display-align">
                      <div class="col-lg-8">
      
                        <table class="table table-striped right-align">
                          <tbody>
                            <tr>
                              <th scope="display-align">آدرس:</th>
                              <td>
                                <p>{{$vendor->address}}</p>
                                {{-- <p>83395 <a href="https://maps.google.de/maps?f=q&amp;hl=de&amp;q=83395%20Freilassing,%20Deutschland&amp;layer=&amp;ie=UTF8&amp;z=7&amp; om=1&amp;iwloc=addr" target="top">تهران</a></p> --}}
                              </td>
                            </tr>
                            <tr>
                              <th scope="display-align"> استان و شهر:</th>
                              <td>{{$vendor->province->title}} - {{$vendor->city->title}}</td>
                            </tr>
                            <tr>
                              <th scope="display-align">تلفن:</th>
                              <td>
                              <i class="fa fa-phone" style="color: #28a745;"></i> 
                             <a href="tel:{{$vendor->phone}}" target="TOP" >{{$vendor->phone}}</a></td>
                            </tr>
                             <tr>
                              <th scope="display-align">نام فروشنده:</th>
                              <td>{{$vendor->contactPerson}}</td>
                            </tr>
                          <tr>
                            <th scope="display-align">وضعیت:   </th>
                            <td>
                              <img src="{{asset('frontend/img/verified-user-logo.png')}}" alt="" style="width: 40px;">
                              <span style="margin-left: 10px;">عضو از سال {{$vendor->created_at}}</span>
      
                            </td>
                          </tr>
                       </tbody>
                        </table>
                       </div>
                      <div class="col-lg-4 center-align">
                        <img class="img-fluid rounded" alt="" src="https://maps.googleapis.com/maps/api/staticmap?center=83395%20Freilassing,%20Deutschland&amp;zoom=6&amp;size=300x400&amp;markers=color:red%7C83395%20Freilassing,%20Deutschland&amp;sensor=false&amp;key=AIzaSyD3q69Zu2KpR4eJXYjh0uHfB8EpGF_367E">
                        <div class="top-margin2">
                          <a href="{{route('dealer-inquiry')}}" class="btn-all btn-green" target="TOP">درخواست استعلام</a>
                        </div>
                      </div>
                    </div>
                  </div>
      
      
                </div>
                @if($vendor->about <> null)
                <div class="card">
                  <div class="card-header center-align text-white bg-secondary">
                      <h5>چشم انداز شرکت:</h5><h5>
                      </h5></div>
                      <div class="card-body">
                        <div class="display-align">
                          <div class="col-lg-8 mx-auto right-align">
                            <p class="card-text">{!! $vendor->about !!}</p>
                     </div>
                    </div>
                  </div>
                </div>
                @endif
              </div>
            </fieldset>
          </div>
        </div>
      </div>
    
      @push('footer-scripts')
      <div class="parallax-background" >
        <img src="{{asset('frontend/background.jpg')}}" ></div>
  
      @endpush</div>
