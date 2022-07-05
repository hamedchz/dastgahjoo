<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Livewire\Admin\Aboutus\AboutUs as AboutusAboutUs;
use App\Http\Livewire\Admin\Aboutus\AboutUsAdmin;
use App\Http\Livewire\Admin\Advertises\AdverisesList;
use App\Http\Livewire\Admin\Category\CategoryList;
use App\Http\Livewire\Admin\Category\SubcategoryList;
use App\Http\Livewire\Admin\Faq\FaqList;
use App\Http\Livewire\Admin\IndexEdit\IndexEdit;
use App\Http\Livewire\Admin\Location\City\CityList;
use App\Http\Livewire\Admin\Location\Province\ProvinceList;
use App\Http\Livewire\Admin\Logs\LogsList;
use App\Http\Livewire\Admin\MachineSearch\MachineSearch;
use App\Http\Livewire\Admin\MembershipBody\MemebershipBody;
use App\Http\Livewire\Admin\Messages\Contactus\ContactList;
use App\Http\Livewire\Admin\Messages\Products\ProductMessageLists;
use App\Http\Livewire\Admin\Messages\Tickets\TicketsList;
use App\Http\Livewire\Admin\Orders\OrderList;
use App\Http\Livewire\Admin\Packages\PackagesList;
use App\Http\Livewire\Admin\Policy\PolicyList;
use App\Http\Livewire\Admin\Product\ProductInfo;
use App\Http\Livewire\Admin\Product\ProductList;
use App\Http\Livewire\Admin\ProductsMessages\InquiriesList;
use App\Http\Livewire\Admin\Profile\UserProfile;
use App\Http\Livewire\Admin\Seller\Message\Products\ProductVendorMessage;
use App\Http\Livewire\Admin\Seller\Message\Ticket\UserTicketList;
use App\Http\Livewire\Admin\Seller\Orders\OrderListVendor;
use App\Http\Livewire\Admin\Seller\Package\OrderPakage;
use App\Http\Livewire\Admin\Seller\Product\Edit\ProductEdit;
use App\Http\Livewire\Admin\Seller\Product\ProductImages\ProductImages;
use App\Http\Livewire\Admin\Seller\Product\ProductLogo\ProductLogo;
use App\Http\Livewire\Admin\Seller\Product\ProductVideo\ProductVideo;
use App\Http\Livewire\Admin\Seller\Product\UserAddProduct;
use App\Http\Livewire\Admin\Seller\Product\UserProductsLists;
use App\Http\Livewire\Admin\Seller\Profile\VendorProfile;
//use App\Http\Livewire\Admin\Seller\Tickets\List\TicketList;
use App\Http\Livewire\Admin\Subscriber\Orders\OrderUserList;
use App\Http\Livewire\Admin\Users\Permission\PermissionsList;
use App\Http\Livewire\Admin\Users\UserLists;
use App\Http\Livewire\Users\AboutUs\AboutUs;
use App\Http\Livewire\Users\AdvanceSearch\AdvanceSearch;
use App\Http\Livewire\Users\ContactUs\Contact;
use App\Http\Livewire\Users\DealerInquiry\DealerInquiry;
use App\Http\Livewire\Users\Dealers\Dealer;
use App\Http\Livewire\Users\Dealers\Detail\DealerDetail;
use App\Http\Livewire\Users\Dearlers\Dealers;
use App\Http\Livewire\Users\Faq\Faq;
use App\Http\Livewire\Users\Index\IndexUsers;
use App\Http\Livewire\Users\Manufaturer\Manufaturer;
use App\Http\Livewire\Users\MemberShip\Membership;
use App\Http\Livewire\Users\ProductList\ProductDetail;
use App\Http\Livewire\Users\ProductList\ProductUserList;
use App\Http\Livewire\Users\ProductList\SoldProducts;
use App\Http\Livewire\Users\ProductList\SubcategoryProducts;
use App\Http\Livewire\Users\Products\ProductsLists;
use App\Http\Livewire\Users\Registration\Form;
use App\Http\Livewire\Users\SearchMachine\SearchMachine;
use App\Http\Livewire\Users\Sitmap\Sitemap;
use App\Http\Livewire\Users\WatchList\WachList;
use App\Models\MembershipBody;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::group(['namespace'=> '','prefix'=> 'dashboard','middleware' => [ 'auth' ]], function(){

    Route::get('index', DashboardController::class)->name('admin.dashboard.index');
    Route::get('packages-list',PackagesList::class)->name('admin.packages-list');
    Route::get('logs-list',LogsList::class)->name('admin.logs-list');
    Route::get('product-list-messages',ProductMessageLists::class)->name('admin.product-message-lists');
    Route::get('tickets',TicketsList::class)->name('admin.tickets');
    Route::get('users',UserLists::class)->name('admin.users');
    Route::get('users/{id}',PermissionsList::class)->name('admin.users-permissions');
    Route::get('provinces',ProvinceList::class)->name('admin.provinces');
    Route::get('cities/{id}',CityList::class)->name('admin.cities');
    Route::get('categories',CategoryList::class)->name('admin.category');
    Route::get('subcategories-list/{id}',SubcategoryList::class)->name('admin.subcategories-List');
    Route::get('products',ProductList::class)->name('admin.products');
    Route::get('products/{id}',ProductInfo::class)->name('admin.products-info');
    Route::get('contactus',ContactList::class)->name('admin.contactus');
    Route::get('orders',OrderList::class)->name('admin.orders');
    Route::get('index-edit',IndexEdit::class)->name('admin.index-edit');
    Route::get('advetises',AdverisesList::class)->name('admin.advertises');
    Route::get('faq',FaqList::class)->name('admin.faq');  
    Route::get('about-us',AboutUsAdmin::class)->name('admin.about-us');
    Route::get('policy',PolicyList::class)->name('admin.policy');
    Route::get('membership-body',MemebershipBody::class)->name('admin.membershipBody');

    //search
    Route::get('search-edit',MachineSearch::class)->name('admin.search-machine');


    //sellers
    Route::get('user-product',UserProductsLists::class)->name('user.products');
    Route::get('user-add-product',UserAddProduct::class)->name('user.addProduct');
    Route::get('product/edit/{id}',ProductEdit::class)->name('user.editProduct');
    Route::get('product/image/{id}',ProductImages::class)->name('user.editProductImage');
    Route::get('product/logo/{id}',ProductLogo::class)->name('user.editProductLogo');
    Route::get('product/video/{id}',ProductVideo::class)->name('user.editProductvideo');
    Route::get('user-ticket-list',UserTicketList::class)->name('user.ticketist');
    Route::get('user-profile',UserProfile::class)->name('user.profile');
    Route::get('vendor-profile',VendorProfile::class)->name('vendor.profile');
    Route::get('vendor-product-list-messages',ProductVendorMessage::class)->name('vendor.product-message');
    Route::get('vendor-orders',OrderListVendor::class)->name('vendor.orders');
    Route::get('user-orders',OrderUserList::class)->name('user.orders');
    Route::get('package-order',OrderPakage::class)->name('user.packageorder');
    Route::get('package/{package}/purchase','App\Http\Controllers\PurchaseController@purchase')->name('payment.package');
    Route::get('package/{package}/purchase/result','App\Http\Controllers\PurchaseController@result')->name('payment.package.result');
    Route::get('package/{package}/free-package','App\Http\Controllers\PurchaseController@freePackage')->name('payment.freepackage');




});

//Route::get('register',Form::class)->name('users.registration');
Route::namespace('App\Http\Controllers\Auth')->group(function () {
    Route::get('/register', 'LoginController@showRegisterForm')->name('register');
    Route::post('/register', 'LoginController@postRegisterForm')->name('post.register');
    Route::get('/login','LoginController@showLoginForm')->name('login');
    Route::post('/login','LoginController@postLoginForm')->name('login');
    Route::post('/verify-code','LoginController@tokenVerify')->name('verify.token');
    Route::get('/reset-password','LoginController@resetPasswordForm')->name('reset.password');
    Route::post('/reset-password-code','LoginController@sendTokenResetPassword')->name('reset.sendToken');
    Route::post('/reset-password-code-send','LoginController@checkTokenResetPassword')->name('reset.password.check');
    Route::post('/reset-password-change','LoginController@forgetPasswordChange')->name('reset.password.change');
});


    //users
    Route::get('/',IndexUsers::class)->name('index');
    Route::get('/membership',Membership::class)->name('membership');
    Route::get('/search-machine',SearchMachine::class)->name('search-machine');
    Route::get('/dealers',Dealer::class)->name('dealers');
    Route::get('/dealer/{slug}',DealerDetail::class)->name('vendor-detail');
    Route::get('/dealer-inquiry/{id}',DealerInquiry::class)->name('dealer-inquiry');
    Route::get('/sitemap',Sitemap::class)->name('sitemap');
    Route::get('/manufacturer',Manufaturer::class)->name('manufacturer');
    Route::get('/advance-search',AdvanceSearch::class)->name('advance-search');
    Route::get('/product-list/{slug}',ProductUserList::class)->name('product-list');
    Route::get('/subcategory-product/{slug}', SubcategoryProducts::class)->name('subcategory.product-list');
    Route::get('/product/detail/{id}',ProductDetail::class)->name('product.detail');
    Route::get('/contact-us',Contact::class)->name('contact-us');
    Route::get('/aboutus',AboutUs::class)->name('about-us');
    Route::get('/faq',Faq::class)->name('faq');
    Route::get('/sold-products',SoldProducts::class)->name('sold-products');
    Route::get('/watchlist',WachList::class)->name('watch-list');

    Route::get('/result','\App\Http\Controllers\SearchResultController@result')->name('user.search');
    Route::get('success-payment','App\Http\Controllers\PurchaseController@successPayment')->name('payment.success');


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
