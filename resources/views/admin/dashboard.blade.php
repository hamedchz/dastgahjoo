<x-admin-layout>
    @push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush
    <div>
<div class="dashboard-area">
    <div class="container-fluid">
        <div class="row">
        
            {{-- admin dashboard --}}
        @if(auth()->user()->isAdmin == 1)
        @can('products')
        <div class="col-md-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> ماشین آلات جدید</h4>
                    <div class="table-responsive" id=" ">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th> عنوان</th>
                                    <th> دسته بندی</th>
                                    <th>نام فروشنده </th>
                                    <th>تاریخ</th>
                                </tr>
                            </thead>
                            <tbody>
                           
                                @forelse($products as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category->title}}</td>
                                    <td>{{$product->vendor->user->name}}</td>
                           
                                    <td>{{$product->created_at}}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-success" style="width: 82%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    @empty
                                    <td align="center" colspan="4" >محصولی وجود ندارد</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <a href="{{route('admin.products')}}" class="text-center font-weight-bold"><span>مشاهده همه</span></a>
                </div>
            </div>
        </div>
        @endcan
            @can('inquiries')
            <div class="col-md-12 box-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> درخواستهای جدید</h4>
                            <div class="table-responsive" id=" ">

                        <table class="table table-hover">

                                <thead>
                                    <tr>
                                        <th> ماشین</th>
                                        <th>نام فروشنده </th>
                                        <th id="hide-mobile-title" > عنوان</th>
                                        <th> موضوع</th>
                                        <th>تاریخ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($unansweredComment as $comment)
                                    <tr>
                                        <td>{{$comment->products->name}}</td>
                                        <td>{{$comment->vendor->user->name}}</td>
                                        <td id="hide-mobile-title" >{{$comment->title}}</td>
                                        <td>@if($comment->isPrice == 1)
                                            <div class="badge badge-primary">  قیمت  </div>
                                            @endif
                                            @if($comment->morePhotos == 1)
                                            <div class="badge badge-info"> عکس </div>
                                            @endif
                                            @if($comment->moreInformation == 1)
                                            <div class="badge badge-danger"> اطلاعات </div>
                                            @endif
                                            @if($comment->offer == 1)
                                            <div class="badge badge-warning">  تخفیف </div>
                                            @endif
                                        </td>
                                        <td>{{$comment->created_at}}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-success" style="width: 82%"></div>
                                                </div>
                                            </div>
                                        </td>
                                        @empty
                                        <td align="center" colspan="5" >پیامی وجود ندارد</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                             </div>
                        <hr>
                        <a href="{{route('admin.product-message-lists')}}" class="text-center font-weight-bold"><span>مشاهده همه</span></a>
                    </div>
                </div>
            </div>
            @endcan
            @can('contactus')
            <div class="col-md-12 box-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">پیامهای جواب داده نشده</h4>
                        <div class="table-responsive" id=" ">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>نام</th>
                                        <th>موبایل</th>
                                        <th>موضوع</th>
                                        <th>تاریخ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($unreadMessages as $message)
                                    <tr>
                                        <td>{{$message->name}}</td>
                                        <td>{{$message->mobile}}</td>
                                        <td>{{$message->subject}}</td>
                                        <td>{{$message->created_at}}</td>
                                   
                                        @empty
                                        <td align="center" colspan="4">داده ای وجود ندارد</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <a href="{{route('admin.contactus')}}" class="text-center font-weight-bold"><span>مشاهده همه</span></a>
                    </div>
                </div>
            </div>
            @endcan
            @can('tickets')
            <div class="col-md-12 box-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">تیکتهای جواب داده نشده</h4>
                        <div class="table-responsive" id=" ">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>کاربر</th>
                                        <th>موضوع </th>
                                        <th>تاریخ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($tickets as $ticket)
                                    <tr>
                                        <td>{{$ticket->user->name}}</td>
                                        <td>{{$ticket->title}}</td>
                                        <td>{{$ticket->created_at}}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-success" style="width: 82%"></div>
                                                </div>
                                            </div>
                                        </td>
                                        @empty
                                        <td align="center" colspan="3" style="background: #e1e1e1">تیکت وجود ندارد</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <a href="{{route('admin.tickets')}}" class="text-center font-weight-bold"><span>مشاهده همه</span></a>
                    </div>
                </div>
            </div>
             @endcan
             @can('orders')
             {{-- <div class="col-md-12 col-xl-12 mb-3">
                <div class="card bg-boxshadow full-height">
                    <div class="card-header bg-transparent user-area d-flex align-items-center justify-content-between">
                        <h5 class="card-title mb-0">وضعیت سفارشات</h5>
                        <!-- Nav Tabs -->
                        <ul class="nav total-earnings nav-tabs mb-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link show" id="today-users-tab" data-toggle="tab" href="#today-users" role="tab" aria-controls="today-users" aria-selected="false">در حال پردازش</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mr-0 active" id="month-users-tab" data-toggle="tab" href="#month-users" role="tab" aria-controls="month-users" aria-selected="true">آماده ارسال</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content" id="userList2">
                            <div class="tab-pane fade" id="today-users" role="tabpanel" aria-labelledby="today-users-tab">
                                <div class="table-responsive" id=" ">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>شماره سفارش</th>
                                                <th>نام خریدار</th>
                                                <th>موبایل</th>
                                                <th>مبلغ قابل پرداخت</th>
                                                <th>تاریخ و ساعت</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <div class="chat-img mr-2">
                                                            <img src="img/shop-img/best-4.png" alt="">
                                                        </div>
                                                        <div>
                                                            <span>تلفن تلفن</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>2864</td>
                                                <td>81</td>
                                                <td>1،912.00 تومان</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-success" style="width: 82%"></div>
                                                        </div>
                                                        <div>
                                                            824
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="tab-pane fade active show" id="month-users" role="tabpanel" aria-labelledby="month-users-tab">
                                <div class="table-responsive" id=" ">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>شماره سفارش</th>
                                                <th>نام خریدار</th>
                                                <th>موبایل</th>
                                                <th>مبلغ قابل پرداخت</th>
                                                <th>تاریخ و ساعت</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="media align-items-center">
                                                        <div class="chat-img mr-2">
                                                            <img src="img/shop-img/best-4.png" alt="">
                                                        </div>
                                                        <div>
                                                            <span>تلفن تلفن</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>2864</td>
                                                <td>81</td>
                                                <td>1،912.00 تومان</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-success" style="width: 82%"></div>
                                                        </div>
                                                        <div>
                                                            824
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <a href="" class="text-center font-weight-bold"><span>مشاهده همه</span></a>
                    </div>
                </div>
            </div> --}}
            @endcan
            @can('users')
            <div class="col-md-12 box-margin">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> کاربران جدید</h5>
                        <div class="product-table-area">
                            <div class="table-responsive" id=" ">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>نام  </th>
                                            <th>سمت</th>
                                            <th>موبایل</th>
                                            <th id="new-user">عکس</th>
                                            <th id="new-user">توضیحات</th>
                                            <th>تاریخ و ساعت</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($newUsers as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->roles[0]->description}}</td>
                                            <td>
                                                <div class="media align-items-center">
                                                    <div>
                                                        <span>{{$user->mobile}} </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td id="new-user" style="pointer:cursor !important;"  data-fancybox="images" role="button" data-src="{{asset($user->avatar)}}">@if($user->avatar <> 'N/A')<img  src="{{asset($user->avatar)}}" style="width: 21px;">@else - @endif</td>

                                            <td id="new-user">@if($user->about){{$user->about}}@else - @endif </td>
                                            <td>{{$user->created_at}}  </td>
                                          
                                            @empty
                                            <td align="center" colspan="6">کاربر جدیدی وجود ندارد</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <a href="{{route('admin.users')}}" class="text-center font-weight-bold"><span>مشاهده همه</span></a>
                    </div>
                </div>
            </div>
            @endcan
            @can('packages')
            <div class="col-md-12 box-margin">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">پکیج های فعال</h5>
                        <div class="product-table-area">
                            <div class="table-responsive" id=" ">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>نام پکیج</th>
                                            <th>قیمت</th>
                                            <th>تعداد کاربران</th>
                                            <th>وضعیت</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($packages as $package)
                                        <tr>
                                            <td>{{$package->title}}</td>
                                            <td>{{number_format($package->price)}} تومان</td>
                                            <td>{{ $package->vendors()->count() }}</td>
                                            <td style="font-size:10px;" class="badge  p-3 {{$package->isActive == 1 ? 'badge-success': 'badge-danger'}}">{{$package->isActive == 1 ? 'فعال': 'غیرفعال'}}</td>
                                            @empty
                                            <td  align="center" colspan="4" style="background-color:#e1e1e1;">پکیج فعالی  وجود ندارد</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <a href="{{route('admin.packages-list')}}" class="text-center font-weight-bold"><span>مشاهده همه</span></a>
                    </div>
                </div>
            </div>
            @endcan
           
            @else
            @if(auth()->user()->vendor)
            {{-- sellers dashboard --}}
            <div class="col-md-12 box-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> درخواستها  </h4>
                        <div class="table-responsive" id=" ">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>نام ماشین</th>
                                        <th>وضعیت</th>
                                        <th>تاریخ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($vendorInqueries as $inq)
                                    <tr>
                                        <td>{{$inq->products->name}}</td>
                                        <td>
                                            @if($inq->isPrice == 1)
                                            <div class="badge badge-primary">  قیمت  </div>
                                            @endif
                                            @if($inq->morePhotos == 1)
                                            <div class="badge badge-info"> عکس </div>
                                            @endif
                                            @if($inq->moreInformation == 1)
                                            <div class="badge badge-danger"> اطلاعات </div>
                                            @endif
                                            @if($inq->offer == 1)
                                            <div class="badge badge-warning">  تخفیف </div>
                                            @endif 
                                        </td>
                                        <td>{{$inq->created_at}}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-success" style="width: 82%"></div>
                                                </div>
                                            </div>
                                        </td>
                                        @empty
                                        <td align="center" colspan="3">پیامی وجود ندارد</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <a href="{{route('vendor.product-message')}}" class="text-center font-weight-bold"><span>مشاهده همه</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 box-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">تیکتها</h4>
                        <div class="table-responsive" id=" ">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        
                                        <th>موضوع </th>
                                        <th>وضعیت </th>
                                        <th>تاریخ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($userTicket as $ticket)
                                    <tr>
                                        <td>{{$ticket->title}}</td>
                                        <td>
                                            @switch($ticket->status )
                                            @case('OPEN')
                                            <div class="badge badge-primary px-2">باز</div>
                                                @break
                                            @case('CLOSED')
                                            <div class="badge badge-success px-2">بسته</div>
             
                                                @break
                                            @case('PENDING')
                                            <div class="badge badge-warning">در حال بررسی فنی</div>
                                          @break
                                            @case('SUSPENDED')
                                            <div class="badge badge-danger px-2">معلق</div>
                                            @break
                                            @default
                                                
                                        @endswitch
                                        </td>
                                        <td>{{$ticket->created_at}}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-success" style="width: 82%"></div>
                                                </div>
                                            </div>
                                        </td>
                                        @empty
                                        <td align="center" colspan="3" >پیامی وجود ندارد</td>
    
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <a href="{{route('user.ticketist')}}" class="text-center font-weight-bold"><span>مشاهده همه</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 box-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> آخرین پکیجهای خریداری شده</h4>
                        <div class="table-responsive" id=" ">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                      
                                        <th>پکیج</th>
                                        <th>وضعیت</th>
                                        <th>قیمت</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($vendororders as $order)
                                    <tr>
                                        <td>{{$order->orderable->title}}</td>
                                        <td>
                                               @switch($order->status)
                                                @case('PAID')
                                                    <div class="badge badge-success">پرداخت شده </div>
                                                    @break
                                                @case('UNPAID')
                                                <div class="badge badge-warning">در انتظار پرداخت</div>
                                                    @break
                                                @case('CANCELED')
                                                <div class="badge badge-danger">کنسل شده </div>
                                                @break   
                                                @default
                                                    
                                            @endswitch
                                        </td>
                                        <td>{{$order->price}} تومان</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-success" style="width: 82%"></div>
                                                </div>
                                            </div>
                                        </td>
                                        @empty
                                        <td align="center" colspan="3" >سفارشی وجود ندارد</td>
    
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <a href="{{route('vendor.orders')}}" class="text-center font-weight-bold"><span>مشاهده همه</span></a>
                    </div>
                </div>
            </div>
           @else
           <div class="col-md-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> درخواستهای من </h4>
                    <div class="table-responsive" id=" ">
                        <table class="table-hover table">
                            <thead>
                                <tr>
                                  
                                       <th>نام ماشین</th>
                                       <th>نام فروشنده </th>
                                        <th> عنوان</th>
                                        <th> موضوع</th>
                                        <th id="date-hide-sm">تاریخ</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($userOrders as $order)
                                <tr>
                                    <td>{{$order->products->name}}</td>
                                     <td>{{$order->vendor->user->name}}</td>
                                        <td>{{$order->title}}</td>
                                        <td>@if($order->isPrice == 1)
                                            <div class="badge badge-primary">  قیمت  </div>
                                            @endif
                                            @if($order->morePhotos == 1)
                                            <div class="badge badge-info"> عکس </div>
                                            @endif
                                            @if($order->moreInformation == 1)
                                            <div class="badge badge-danger"> اطلاعات </div>
                                            @endif
                                            @if($order->offer == 1)
                                            <div class="badge badge-warning">  تخفیف </div>
                                            @endif
                                        </td>
                                        <td id="date-hide-sm">{{$order->created_at}}</td>
                                    @empty
                                    <td align="center" colspan="3" >سفارشی وجود ندارد</td>

                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <a href="{{route('user.orders')}}" class="text-center font-weight-bold"><span>مشاهده همه</span></a>
                </div>
            </div>
        </div>
        <div class="col-md-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">تیکتها</h4>
                    <div class="table-responsive" id=" ">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    
                                    <th>موضوع </th>
                                    <th>وضعیت </th>
                                    <th>تاریخ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($userTicket as $ticket)
                                <tr>
                                    <td>{{$ticket->title}}</td>
                                    <td>
                                        @switch($ticket->status )
                                        @case('OPEN')
                                        <div class="badge badge-primary px-2">باز</div>
                                            @break
                                        @case('CLOSED')
                                        <div class="badge badge-success px-2">بسته</div>
         
                                            @break
                                        @case('PENDING')
                                        <div class="badge badge-warning">در حال بررسی فنی</div>
                                      @break
                                        @case('SUSPENDED')
                                        <div class="badge badge-danger px-2">معلق</div>
                                        @break
                                        @default
                                            
                                    @endswitch
                                    </td>
                                    <td>{{$ticket->created_at}}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-success" style="width: 82%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    @empty
                                    <td align="center" colspan="3" >پیامی وجود ندارد</td>

                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <a href="{{route('user.ticketist')}}" class="text-center font-weight-bold"><span>مشاهده همه</span></a>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6 box-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">علاقه مندیها</h4>
                    <div class="table-responsive" id=" ">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>کاربر</th>
                                    <th>موضوع </th>
                                    <th>تاریخ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2864</td>
                                    <td>81</td>
                                    <td>1،912.00 تومان</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-success" style="width: 82%"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <a href="" class="text-center font-weight-bold"><span>مشاهده همه</span></a>
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-md-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">تراکنش ها</h4>
                    <div class="table-responsive" id=" ">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>کاربر</th>
                                    <th>محصول</th>
                                    <th>تاریخ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2864</td>
                                    <td>81</td>
                                    <td>1،912.00 تومان</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-success" style="width: 82%"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <a href="" class="text-center font-weight-bold"><span>مشاهده همه</span></a>
                </div>
            </div>
        </div> --}}
    
            @endif

            @endif
                     
                    
            
        </div>
    </div>
</div>
    </div>
    
    @push('styles')

<style>

     @media only screen and (max-width: 500px){

#date-hide-sm{
display:none;
}

}

     @media only screen and (max-width: 767px){
     
     #hide-mobile-title{
     display:none;
     }
     body{
     overflow-x:hidden;
     }
 
        }
        
        
             @media only screen and (max-width: 680px){

        #new-user{
        display:none;
        
        }
        
        .card-body{
        padding: 1.25rem 0.5rem;}
        }
        
        

</style> 
@endpush

    
    
    @push('scripts')
        <!-- These plugins only need for the run this page -->
      
          <script src="/admin/js/default-assets/peity.min.js"></script>
        <script src="/admin/js/default-assets/peity-demo.js"></script>
        <script src="/admin/js/default-assets/gauge.js"></script>
        <script src="/admin/js/default-assets/serial.js"></script>
        <script src="/admin/js/default-assets/light.js"></script>
        <script src="/admin/js/default-assets/ammap.min.js"></script>
        <script src="/admin/js/default-assets/worldlow.js"></script>
        <script src="/admin/js/default-assets/radar.js"></script>
        <script src="/admin/js/default-assets/dashboard-2.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  
  
    @endpush
</x-admin-layout>
