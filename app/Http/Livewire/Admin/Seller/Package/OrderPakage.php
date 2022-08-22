<?php

namespace App\Http\Livewire\Admin\Seller\Package;

use App\Models\DiscountCode;
use App\Models\MembershipBody;
use App\Models\Packages;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class OrderPakage extends Component
{
   public $coupon,$type=null,$errorMsg=null;

    public function checkCoupon(){
        $validatedData = Validator::make(
        ['coupon' => $this->coupon],
        ['coupon' => 'required'],
        ['required'=> 'این فیلد نمیتواند خالی باشد']
        )->validate();
        $userCoupon = DiscountCode::where('code',$this->coupon)->where('isActive',1)->first();
        if($userCoupon){
            $this->resetValidation();
            $existingDiscount = DB::table('instant_user_discount')->where('user_id', '=', auth()->user()->id)->get();
            if(is_null($existingDiscount)){
                $existingDiscount = DB::table('instant_user_discount')->insert([
                    'user_id' => auth()->user()->id,
                    'discount_id' => $userCoupon->id,
                    'percentage' => $userCoupon->percentage,
                ]);
            }else{ 
            DB::table('instant_user_discount')->where('user_id', '=', auth()->user()->id)->delete();
            $existingDiscount = DB::table('instant_user_discount')->insert([
                'user_id' => auth()->user()->id,
                'discount_id' => $userCoupon->id,
                'percentage' => $userCoupon->percentage,
            ]);
          }
            $this->coupon = "";
            $this->errorMsg = ' کد تخفیف  اعمال شد';
            $this->type = 'success';
        }else{
            $this->resetValidation();
            $this->errorMsg = ' کد تخفیف اشتباه است ';
            $this->type = 'danger';
        }
    }
    public function render()
    {
        $packages = Packages::with('discount')->where('isActive',1)->latest()->get();
        $membershipBody = MembershipBody::first();
        return view('livewire.admin.seller.package.order-pakage',['membershipBody'=>$membershipBody,'packages'=>$packages])->layout('layouts.users.app');
    }
}
