<div class="ecaps-sidemenu-area">
    <!-- Desktop Logo -->
    <div class="ecaps-logo">
        <a href="{{route('index')}}"><img class="desktop-logo" src="{{asset('admin/img/core-img/logo.png')}}" alt="لوگوی دسک تاپ"> <img class="small-logo" src="{{asset('admin/img/core-img/favicons.jpg')}}" alt="آرم موبایل"></a>
    </div>
   <!-- Side Nav -->
   <div class="ecaps-sidenav" id="ecapsSideNav">
    <!-- Side Menu Area -->
    <div class="side-menu-area">
        <!-- Sidebar Menu -->
        <nav>
            <ul class="sidebar-menu" data-widget="tree">
                <li class="{{ request()->is('dashboard/index') ? 'active':''}}"><a href="{{route('admin.dashboard.index')}}"><i class="zmdi zmdi-view-dashboard"></i><span>داشبورد</span></a></li>
                
                {{-- admin sidebar--}}
                @if(auth()->user()->isAdmin == 1)
                @can('products') 
                <li class="{{ request()->is('dashboard/products') == true ? 'active':''}}"><a href="{{route('admin.products')}}"><img src="{{asset('admin/img/machine.svg')}}" style="width:20px;height:20px;padding-left:2px;"> ماشین آلات موجود</a></li>
                @endcan
                @canany(['category'])
                <li class="treeview {{ request()->is('dashboard/categories') == true ? 'menu-open':''}} {{ request()->is('dashboard/subcategories-list/*') == true ? 'menu-open':''}}">
                    <a href="javascript:void(0)"><img src="{{asset('admin/img/machine.svg')}}" style="width:20px;height:20px;padding-left:2px;"> <span>ماشین آلات</span> <i class="fa fa-angle-left"></i></a>
                    <ul class="treeview-menu"  {{ request()->is('dashboard/categories') == true ? "style=display:block;":''}} {{ request()->is('dashboard/subcategories-list/*') == true ? "style=display:block;":''}} >
                        {{--<li class="{{ request()->is('dashboard/products') ? 'active':''}}"><a href="{{route('admin.products')}}"> ماشین آلات موجود</a></li>--}}
                        <li class="{{ request()->is('dashboard/categories') ? 'active':''}} {{ request()->is('dashboard/subcategories-list/*') ? 'active':''}}"><a href="{{route('admin.category')}}"> تعریف گروه های اصلی </a></li>
                    </ul>
                </li>
                @endcanany
          
                @can('contactus') 
                <li class="{{ request()->is('dashboard/contactus') == true ? 'active':''}}"><a href="{{route('admin.contactus')}}"><i class="fa fa-ticket"></i><span>  پیامهای عمومی</span></a></li>
                @endcan
                @can('tickets') 
                        <li class="{{ request()->is('dashboard/tickets') == true ? 'active':''}}"><a href="{{route('admin.tickets')}}"><i class="fa fa-ticket"></i><span>  تیکتها</span></a></li>
                @endcan
                @can('inquiries') 
                <li class="{{ request()->is('dashboard/product-list-messages') == true ? 'active':''}}"><a href="{{route('admin.product-message-lists')}}"><i class="fa fa-ticket"></i><span> درخواست های ثبت شده </span></a></li>

                @endcan
                @can('advertise')
                <li class="{{ request()->is('dashboard/advertises') == true ? 'active':''}}"><a href="{{route('admin.advertises')}}"><i class="fa fa-file"></i><span> بنرهای تبلیغاتی </span></a></li>

                @endcan
                @can('backgroundPicture')
                <li class="{{ request()->is('dashboard/background') == true ? 'active':''}}"><a href="{{route('admin.background-site')}}"><i class="fa fa-file"></i><span>  ویرایش پس زمینه سایت </span></a></li>

                @endcan
                @canany('orders')
                <li class="{{ request()->is('dashboard/orders') == true ? 'active':''}}"><a href="{{route('admin.orders')}}"><i class="fa fa-shopping-cart"></i><span> پکیجهای فروخته شده  </span></a></li>

                {{-- <li class="treeview">
                    <a href="javascript:void(0)"><i class="fa fa-first-order"></i> <span>سفارشات</span> <i class="fa fa-angle-left"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="#">تمام سفارشات</a></li>
                        <li><a href="#">در انتظار</a></li>
                        <li><a href="#">در حال پردازش</a></li>
                        <li><a href="#">تکمیل شده</a></li>
                        <li><a href="#">مرجوعی</a></li>
                        <li><a href="#">لغو شده</a></li>
                    </ul>
                </li> --}}
                @endcanany
             
                @canany(['users','vendors-surveillance'])
                <li class="{{ request()->is('dashboard/users') == true ? 'active':''}}"><a href="{{route('admin.users')}}"><i class="fa fa-users"></i><span>کاربران</span></a></li>
                @endcanany
                @canany(['settings','location','edit-homepage','faq','aboutus','edit-serachpage','congratulation'])
                <li class="treeview {{ request()->is('dashboard/congratulation') == true ? 'menu-open':''}} {{ request()->is('dashboard/membership-body') == true ? 'menu-open':''}} {{ request()->is('dashboard/policy') == true ? 'menu-open':''}} {{ request()->is('dashboard/search-edit') == true ? 'menu-open':''}} {{ request()->is('dashboard/search-edit') == true ? 'menu-open':''}} {{ request()->is('dashboard/about-us') == true ? 'menu-open':''}} {{ request()->is('dashboard/faq') == true ? 'menu-open':''}}  {{ request()->is('dashboard/index-edit') == true ? 'menu-open':''}}  {{ request()->is('dashboard/provinces') == true ? 'menu-open':''}}  {{ request()->is('dashboard/cities/*') == true ? 'menu-open':''}} ">
                    <a href="javascript:void(0)"><i class="zmdi zmdi-settings" ></i> <span>تنظیمات متون</span> <i class="fa fa-angle-left"></i></a>
                    <ul class="treeview-menu"  {{ request()->is('dashboard/congratulation') == true ? "style=display:block;":''}} {{ request()->is('dashboard/membership-body') == true ? "style=display:block;":''}} {{ request()->is('dashboard/policy') == true ? "style=display:block;":''}} {{ request()->is('dashboard/about-us') == true ? "style=display:block;":''}} {{ request()->is('dashboard/faq') == true ? "style=display:block;":''}} {{ request()->is('dashboard/index-edit') == true ? "style=display:block;":''}} {{ request()->is('dashboard/provinces') == true ? "style=display:block;":''}}  {{ request()->is('dashboard/cities/*') == true ? "style=display:block;":''}}>
                        <!-- تنظیمات فوتر-برچسب ها-تنظیمات عمومی(لوگو و ...) -  -->
                        @can('edit-homepage')
                        <li  class="{{ request()->is('dashboard/index-edit') == true ? 'active':''}}"><a href="{{route('admin.index-edit')}}">تنظیمات صفحه اول</a></li>
                        @endcan
                        @can('edit-serachpage')
                        <li  class="{{ request()->is('dashboard/search-edit') == true ? 'active':''}}"><a href="{{route('admin.search-machine')}}">تنظیمات صفحه جستجو</a></li>
                        @endcan
                        @can('policy')
                        <li class="{{ request()->is('dashboard/policy') == true ? 'active':''}}"><a href="{{route('admin.policy')}}"> شرایط و قوانین سایت  </a></li>
                        @endcan
                        @can('membershipBody')
                        <li  class="{{ request()->is('dashboard/membership-body') == true ? 'active':''}}"><a href="{{route('admin.membershipBody')}}">تنظیمات صفحه عضویت</a></li>
                        @endcan
                        @can('congratulation')
                        <li  class="{{ request()->is('dashboard/congratulation') == true ? 'active':''}}"><a href="{{route('admin.cong-list')}}">  پیام مناسبتی</a></li>
                        @endcan
                        @can('location')
                        <!-- استان و شهر و ... -  -->
                        <li class="{{ request()->is('dashboard/provinces') == true ? 'active':''}}  {{ request()->is('dashboard/cities/*') == true ? 'active':''}}"><a href="{{route('admin.provinces')}}">استان هاو شهرها</a></li>
                        @endcan
                        @can('faq')
                        <li class="{{ request()->is('dashboard/faq') == true ? 'active':''}}"><a href="{{route('admin.faq')}}"> سؤالات متداول </a></li>
                        @endcan
                        @can('aboutus')
                        <li class="{{ request()->is('dashboard/about-us') == true ? 'active':''}}"><a href="{{route('admin.about-us')}}"> درباره ما  </a></li>
                        @endcan
                   
                    </ul>
                </li>
                @endcan
                @canany(['packages','dicountCode'])
                <li class="treeview {{ request()->is('dashboard/discount-code') == true ? 'menu-open':''}} {{ request()->is('dashboard/packages-list') == true ? 'menu-open':''}}"  >
                    <a href="javascript:void(0)"><i class="fa fa-cube"></i> <span>تنظیمات پکیج</span> <i class="fa fa-angle-left"></i></a>
                    <ul class="treeview-menu"  {{ request()->is('dashboard/discount-code') == true ? "style=display:block;":''}} {{ request()->is('dashboard/packages-list') == true ? "style=display:block;":''}}>
                        @can('packages')
                        <li class="{{ request()->is('dashboard/packages-list') == true ? 'active':''}}"><a href="{{route('admin.packages-list')}}"><span> تعریف پکیج </span></a></li>
                        @endcan
                        @can('dicountCode')
                        <li class="{{ request()->is('dashboard/discount-code') == true ? 'active':''}}"><a href="{{route('admin.discount-list')}}"><span>  تعریف کوپن تخفیف </span></a></li>
                        @endcan
                    </ul>
                </li>
                @endcan

                @canany('transactions')
                {{-- <li><a href="#"><i class="fa fa-credit-card"></i><span>تراکنش ها</span></a></li> --}}
                @endcanany
                @canany(['permissions','roles'])
                {{-- <li><a href="pages.html"><i class="fa fa-lock"></i><span>سطوح دسترسی</span></a></li> --}}
                @endcanany
                @canany(['system-logs'])
                <li class="{{ request()->is('dashboard/logs-list') ? 'active':''}}"><a href="{{route('admin.logs-list')}}"><i class="zmdi zmdi-assignment"></i><span>گزارشات سیستم</span></a></li>
                @endcanany
                {{-- seller sidebar --}}
                @else
                
                @can('products')

                
              {{-- @if(Carbon\Carbon::now() < auth()->user()->vendor->package->packageHistories->endDate && auth()->user()->vendor->isApproved == 2 && App\Models\Product::whereBetween('created_at',[auth()->user()->vendor->package->packageHistories->startDate,auth()->user()->vendor->package->packageHistories->endDate])->count() <= auth()->user()->vendor->package->packageHistories->products) --}}
                {{-- @if(auth()->user()->vendor->isApproved == 2) --}}
                <li class="{{ request()->is('dashboard/user-product') == true ? 'active':''}} "><a href="{{route('user.products')}}"><img src="{{asset('admin/img/machine.svg')}}" style="width:20px;height:20px;padding-left:2px;"> <span style="font-size:12px !important;"> ماشین آلات و آگهی های من</span></a></li>
                {{-- @endif --}}
                {{-- @endif --}}
                @endcan
                
                
                @can('purchases')
                    
                @endcan
                @can('advertise')
                    
                @endcan
                @can('inquiries')
                @if(auth()->user()->vendor->isApproved == 2) 
                 <li class="treeview {{ request()->is('dashboard/vendor-product-list-messages') == true ? 'menu-open':''}} {{ request()->is('dashboard/vendor-product-list-send-messages') == true ? 'menu-open':''}}">
                    <a href="javascript:void(0)"><i class="zmdi zmdi-layers"></i><span> درخواست ها </span> <i class="fa fa-angle-left"></i></a>
                    <ul class="treeview-menu"  {{ request()->is('dashboard/vendor-product-list-messages') == true ? "style=display:block;":''}} {{ request()->is('dashboard/vendor-product-list-send-messages') == true ? "style=display:block;":''}} >
                        <li class="{{ request()->is('dashboard/vendor-product-list-messages') ? 'active':''}}"><a href="{{route('vendor.product-message')}}">  درخواست های  رسیده     </a></li>
                        <li class="{{ request()->is('dashboard/vendor-product-list-send-messages') ? 'active':''}}"><a href="{{route('vendor.send.message')}}">  درخواست های  من   </a></li>
                    </ul>
                </li>             
                @endif
                @endcan
                @can('orders')
                <li class="{{ request()->is('dashboard/vendor-orders') == true ? 'active':''}} "  ><a href="{{route('vendor.orders')}}"><i class="fa fa-ticket"></i><span> پکیجهای خریداری شده </span></a></li>

                @endcan
              
                @can('transactions')
                {{-- <li ><a href=""><i class="fa fa-ticket"></i><span>  تراکنش ها </span></a></li> --}}
          
                @endcan
                {{-- <li class="treeview">
                    <a href="javascript:void(0)"><i class="fa fa-file-image-o"></i> <span>رسانه ها</span> <i class="fa fa-angle-left"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="banners.html">بنر ها</a></li>
                        <li><a href="sliders.html">اسلایدر ها</a></li>
                    </ul>
                </li> --}}
                <li  class="{{ request()->is('dashboard/order-package') == true ? 'active':''}} "><a href="{{route('user.packageorder')}}"><i class="fa fa-cube"></i><span>  خرید پکیج</span></a></li>

                <li  class="{{ request()->is('dashboard/user-ticket-list') == true ? 'active':''}} "><a href="{{route('user.ticketist')}}"><i class="fa fa-ticket"></i><span>  تیکتها</span></a></li>

                @if(auth()->user()->vendor)
                    <li class="{{ request()->is('dashboard/vendor-profile') == true ? 'active':''}} "><a href="{{route('vendor.profile')}}"><i class="fa fa-user"></i><span>پروفایل کاربر</span></a></li>
                @else
                 <li class="{{ request()->is('dashboard/user-orders') == true ? 'active':''}} "  ><a href="{{route('user.orders')}}"><i class="fa fa-ticket"></i><span> درخواست های من </span></a></li>
                <li class="{{ request()->is('dashboard/user-profile') == true ? 'active':''}} "><a href="{{route('user.profile')}}"><i class="fa fa-user"></i><span>پروفایل کاربر</span></a></li>
                    @endif
                @endif
                @can('subscriber')
                <li class=""><a href=""><i class="zmdi zmdi-shopping-cart"></i><span> خریدها</span></a></li>
                <li class=""><a href=""><i class="zmdi zmdi-money-box"></i><span>تراکنش ها  </span></a></li>
                <li class=""><a href=""><i class="zmdi zmdi-assignment"></i><span>علاقه مندیها </span></a></li>
                <li class="{{ request()->is('dashboard/user-ticket-list') == true ? 'active':''}} "><a href="{{route('user.ticketist')}}"><i class="fa fa-ticket"></i><span>  تیکتها</span></a></li>
                <li class="{{ request()->is('dashboard/user-profile') == true ? 'active':''}} "><a href="{{route('user.profile')}}"><i class="fa fa-user"></i><span>پروفایل کاربر</span></a></li>

                @endcan
        </nav>
    </div>
</div>

</div>
