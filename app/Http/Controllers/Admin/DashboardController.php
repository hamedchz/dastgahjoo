<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contactus;
use App\Models\Inquiries;
use App\Models\Log;
use App\Models\Order;
use App\Models\Packages;
use App\Models\Product;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $unreadMessages = Contactus::where('seen','unread')->latest()->take(5)->get();
        $newUsers = User::with('roles')->where('isActive',1)->where('mobile_verified_at','!=',"")->where('isAdmin',0)->latest()->take(5)->get();
        $paidOrders = Order::with('user')->where('status','PAID')->where('isActive',1)->latest()->take(5)->get();
        $packages = Packages::with('vendors')->where('isActive',1)->latest()->get();
        $logs = Log::with('user')->latest()->take(5)->get();
        $roles = User::with('roles')->get();
        $tickets =Ticket::with('user')->where('parent',0)->where('status','OPEN')->latest()->take(5)->get();
        $unansweredComment = Inquiries::with('user')->with('products')->where('status','PENDING')->where('parent',0)->latest()->take(5)->get();
       //users
         $userTicket = Ticket::where('user_id',auth()->user()->id)->where('parent',0)->latest()->take(5)->get();
        $userOrders = Order::where('user_id',auth()->user()->id)->latest()->take(5)->get();
        //vendor
        if(auth()->user()->vendor){
        $productCount = Product::whereBetween('created_at',[auth()->user()->vendor->package->packageHistories->startDate,auth()->user()->vendor->package->packageHistories->endDate])->get();
        //dd($productCount->count());
        $vendorInqueries = Inquiries::where('parent',0)->where('vendor_id',auth()->user()->vendor->id)->latest()->take(5)->get();
        $vendororders  =  Order::whereHasMorph(
            'orderable',
            [Product::class],
            function ($query) {
                $query->where('vendor_id',auth()->user()->vendor->id);
                }
        )->latest()->take(5)->get();
        return view('admin.dashboard',compact('vendororders','vendorInqueries','userTicket','userOrders','packages','logs','roles','unansweredComment','tickets','paidOrders','newUsers','unreadMessages'));
       }else{
        return view('admin.dashboard',compact('userTicket','userOrders','packages','logs','roles','unansweredComment','tickets','paidOrders','newUsers','unreadMessages'));
   
       }
    }
}
