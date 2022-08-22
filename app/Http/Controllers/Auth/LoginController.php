<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Policy;
use App\Models\Setting;
use App\Models\Token;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Artesaos\SEOTools\Traits\SEOTools;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use SoapClient;

class LoginController extends Controller
{

    use AuthenticatesUsers,SEOTools;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showRegisterForm()
    {
        $this->seo()->setTitle("ثبت نام جدید");
        $policy = Policy::first();
        return view('auth.register',compact('policy'));
    }
    public function postRegisterForm(RegisterRequest $request){
   


     if($request->policyCheck){
        $user = User::where('mobile',$request->mobile)->first();
        $token = mt_rand(1000,9999);
        if($user){
            if($user->mobile_verified_at == null){
                DB::table('users')->where('mobile',$user->mobile)->delete();
            }else{
                $policy = Policy::first();
                $errorUnq = true;
                return view('auth.register',compact('errorUnq','policy'));
            }
        }
       
       $userStore =  User::create([
           'name' => $request->name,
           'mobile' => $request->mobile,
           'password' => bcrypt($request->password),
           'avatar' => 'N/A',
         
       ]);
       
       $tokenSave = Token::create([
        'code' => $token,
        'user_id' => $userStore->id,
        'expired_at' => now()->addMinute(10)
       ]);
       
       //send sms function
       
         $this->sendSmsCode($request->mobile, $token);
      
        $userStore->roles()->sync('5');
        return view('auth.verifyToken',compact('userStore'));
       
         }else{
            $policy = Policy::first();
            $errorPolicy = true;
            return view('auth.register',compact('errorPolicy','policy'));
         }
    }
    public function sendSmsCode($mobile,$code)
    {
        $client = new SoapClient("http://188.0.240.110/class/sms/wsdlservice/server.php?wsdl");
        $user = Setting::where('name','user_panel_for_sms')->pluck('value')->first();
        $pass = Setting::where('name','password_panel_for_sms')->pluck('value')->first();
        $fromNum = Setting::where('name','lineNumber_panel_for_sms')->pluck('value')->first();
        $toNum = $mobile;
        $pattern_code = "e48nfe0upd5bwzv";
        $input_data = array(
            "code" => $code,
        );
        return $client ->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
    }
    public function tokenVerify(Request $request){
       $userStore = User::findOrFail($request->id);
       $token = Token::where('user_id',$request->id)->first();
       if($token->code == $request->code){
        $token->delete();
        $userStore->mobile_verified_at=date('Y-m-d H:i:s', time());
        $userStore->save();
        Auth::loginUsingId($userStore->id);
        return redirect('/dashboard/index');
       }else{
        $error = true;
        return view('auth.verifyToken',compact('error','userStore'));
       }
    }
    public function showLoginForm(){
        $this->seo()->setTitle("ورود");
        return view('auth.login');
    }

    public function postLoginForm(LoginRequest $request){
        
        $credentials = $request->only('mobile', 'password');
        $user = User::where('mobile',$request->mobile)->get()->first();
            if (Auth::attempt($credentials))
            {
               
                if($user->isActive == 1){
                    if($user->mobile != null && $user->mobile_verified_at == null){
                        // $user->delete();
                        DB::table('users')->where('mobile',$request->mobile)->delete();
                        $error = true;
                        return view('auth.register',compact('error'));
                    }else{
                        return redirect('/dashboard/index');
                    }
                }else{
                    $errorActivity = true;
                    return view('auth.login',compact('errorActivity'));
                }
            }
            else{
                $error = true;
                return view('auth.login',compact('error'));
            }
        
        }

        //reset pass
        public function resetPasswordForm(){
            $this->seo()->setTitle("بازیابی رمز عبور");
            return view('auth.forgetPassword');
        }

        public function sendTokenResetPassword(Request $request){
            $validateData = Validator::make($request->all(),[
                'mobile' => 'required|iran_mobile|min:11|max:11'
            ],
            [
                'mobile.required' => 'این فیلد نمیتواند خالی باشد',
                'mobile.iran_mobile' => 'استفاده از شماره موبایل ایران الزامیست',
                'mobile.min' => 'حداقل تعداد شماره 11',
                'mobile.max' => 'حداکثر تعداد شماره 11',
      
            ])->validate();
            $tokenCode = mt_rand(1000, 9999);
            $user = User::where('mobile',$request->mobile)->first();
            if($user){
                $token = Token::query()->where('user_id',$user->id)->first();
                if($token && $user->expire_at < now()){
                    $token->delete();
                    Token::create([
                        'code' => $tokenCode,
                        'user_id' => $user->id,
                        'expired_at' => now()->addMinute(10)
                       ]);
                       //send sms
                       $this->sendSmsCode($request->mobile, $tokenCode);
                       $errorSend = true;
                       return view('auth.forgetPasswordSendToken',compact('user','errorSend'));
                }elseif(is_null($token)){
                    
                    $t = Token::create([
                        'code' => $tokenCode,
                        'user_id' => $user->id,
                        'expired_at' => now()->addMinute(10)
                       ]);
                       //send sms
                       $this->sendSmsCode($request->mobile, $tokenCode);

                       $errorNull = true;
                       return view('auth.forgetPasswordSendToken',compact('user','errorNull'));
                }elseif($token && $user->expire_at > now()){
                    $errorTime = true;
                    return view('auth.forgetPassword',compact('errorTime'));
                }
            }else{
                $errorMobile = true;
                return view('auth.forgetPassword',compact('errorMobile'));
            }

        }

        public function checkTokenResetPassword(Request $request){
            $user = User::findOrFail($request->id);
            $token = Token::where('user_id',$request->id)->first();
            if($token->code == $request->code){
             $token->delete();
             return view('auth.forgetPasswordChange',compact('user'));
            }else{
             $error = true;
             return view('auth.forgetPasswordSendToken',compact('error','user'));
            }
        }

        public function forgetPasswordChange(ForgetPasswordRequest $request){
            $user = User::findOrFail($request->id);
            $user->update([
                'password'=> Hash::make($request->password)
            ]);

            Auth::loginUsingId($request->id);
            return redirect('/dashboard/index');
       
        }

        
    }

  
        

    

