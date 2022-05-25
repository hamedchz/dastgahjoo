<?php

namespace App\Http\Controllers;

use App\Models\Discounts;
use App\Models\Order;
use App\Models\Packages;
use App\Models\Transaction;
use App\Models\User;
use Exception;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Exceptions\PurchaseFailedException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use SoapFault;

class PurchaseController extends Controller
{
    public function purchase(Packages $package){
        $user = Auth::user();
        $discount = Discounts::select('percentage')->where('package_id',$package->id)->first();
        
        // $package = Packages::findOrFail($id);
        // $existPackage = Order::where('user_id',Auth::id())->whereHasMorph('orderable',[Packages::class],
        // function ($query) {
        //     $query->where('vendor_id',auth()->user()->vendor->id);
        //     }
        // );

        // if($existPackage){
        //     return 'exist Package';
        // }
         $price = ($package->price)-(($package->price)*($discount->percentage/100));
        try{
            $invoice = new Invoice();
            $invoice->amount($price);
            $invoice->detail('نام کاربر:',$user->name);
            $invoice->detail('نام پکیج:',$package->title);
            $invoice->detail('قیمت:',$price);
            $paymentId = md5(uniqid());
            $transaction = Transaction::create([
                'user_id' => $user->id,
                'transactionable_id' => $package->id,
                'transactionable_type' => Packages::class,
                'paid' => $invoice->getAmount(),
                'invoice_details' => $invoice,
                'payment_id' => $paymentId,
            ]);
            // $transaction = $user->transactions()->create([
                // 'user_id' => $user->id,
                //     'transactionable_id' => $package->id,
                //     'transactionable_type' => Packages::class,
                //     'paid' => $invoice->getAmount(),
                //     'invoice_details' => $invoice,
                //     'payment_id' => $paymentId,

            // ]);
            // dd($paymentId);
            // $user = User::findOrFail($user->id);
        //      $data= json_encode($user);
        // $user = json_decode($data);
       //$varient_ids = response()->json($varient_ids);
            // foreach($varient_ids as $index => $varient_id){
            // //return $varient_id;
            //     //$user = Auth::user();
            //     //return $varient_id;
            //     $service = ServiceVarient::findOrFail($varient_id);
                
            //     // $invoice->detail('detail'.($index+1),$service->varient);
            //     PurchasedService::create([
            //         'user_id' => $user_id,
            //         'cart_id' => $cart_id,
            //         'varient_id' => $varient_id,
            //         'status' => Transaction::STATUS_PENDING
            //     ]);
            //      $description .= $service->varient;
            //     $description .= " ";
                
            // // dd("2");
            // }
            
            // $transaction = Transaction::create([
            //     'user_id' => $user->id,
            //     'transactionable_id' => $package->id,
            //     'transactionable_type' => Packages::class,
            //     'paid' => $invoice->getAmount(),
            //     'invoice_details' => $invoice,
            //     'payment_id' => $paymentId,
            // ]);
            // $transaction = $package->transaction()->create([
            //     'user_id' => $user->id,
            //     'paid' => $invoice->getAmount(),
            //     'invoice_details' => $invoice,
            //     'payment_id' => $paymentId,
            
            // ]);
            
            $callbackUrl = route('payment.package.result',['package'=>$package->id,'payment_id'=>$paymentId]);
            $payment = Payment::callbackUrl($callbackUrl);
            $payment->config('description','خرید پکیج' .$package->title);
            // $payment->purchase($invoice, function($driver,$transactionId) use ($transaction,$paymentId){
            //     $transaction->transaction_id = $transactionId;
            //     $transaction->save();
            // });
            
            return $payment->pay()->render();
         }catch(ModelNotFoundException|PurchaseFailedException|Exception|SoapFault $e){
            // dd(get_class_methods($e)); // lists all available methods for exception object
            $transaction->transaction_result = $e;
            // $transaction->transaction_result = [
            //     $e->getMessage(),
            //     $e->getCode()
            // ];
            $transaction->status = Transaction::STATUS_FAILED;
            $transaction->save();
            return 'خطا در پرداخت وجود دارد';

        }
        }

        public function result(Request $request,$id){
            
           $package = Packages::findOrFail($id);
           $discount = Discounts::select('percentage')->where('package_id',$package->id)->first();
           $price = ($package->price)-(($package->price)*($discount->percentage/100));
            $user_id = $request->user_id;
            if($request->missing('payment_id')){
                return 'خطا در پرداخت وجود دارد';
            }
            $transaction = Transaction::where('payment_id',$request->payment_id)->first();
            //$transaction = Transaction::where('payment_id',$request->payment_id)->get();
            if(empty($transaction)){
                return 'خطا در پرداخت وجود دارد';
           }

             if($transaction->user_id <> Auth::id()){
                return 'خطا در پرداخت وجود دارد';
                }

             if($transaction->package_id <> $package->id){
                return 'خطا در پرداخت وجود دارد';

            }
             if($transaction->status <> Transaction::STATUS_PENDING){
                return 'خطا در پرداخت وجود دارد';

            }
          
            try{
                $reciept = Payment::amount($transaction->paid)
                ->transactionId($transaction->transaction_id)->verify();
                $transaction->transaction_result = $reciept;
                $transaction->status = Transaction::STATUS_SUCCESS;
                $transaction->save();
                $user = Auth::user();
                //  Auth::user()->purchasedService()->create([
                //     'varient_id' => $service->varient_id,

                // ]); 
                $package->order()->create([ 
                    'user_id' => $user->id,
                    'price' => $price,
                    'status' => 'PAID'
                ]);
                // $orders = Order::where('cart_id',$request->cart_id)->first();
                // $purchasedServicesSuccess = PurchasedService::where('cart_id',$request->cart_id)->get();
                // $purchasedServicesSuccess->each->update([
                //     'status' => Transaction::STATUS_SUCCESS,
                // ]);
                
               return 'پرداخت با موفقیت انجام شد';
               $date = Verta::now();
               $date = date('d m Y',strtotime($date));
               return view('user.transaction.success-paid',compact('reciept','orders','date'));

            }catch(Exception|InvalidPaymentException $e){
                if($e->getCode() < 0 ){
                    $transaction->status = Transaction::STATUS_FAILED;
                    $transaction->transaction_result = [
                        'message' => $e->getMessage(),
                        'code' => $e->getCode(),
                    ];
                    $transaction->save();
                    
                }
                return 'خطا در پرداخت وجود دارد';
            }


    }
}
