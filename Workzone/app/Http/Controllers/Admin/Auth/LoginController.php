<?php

namespace App\Http\Controllers\Admin\Auth;

use Auth, Hash;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('admin_logout');
    }

    public function custom_login_page(){
        return view('admin.auth.login');
    }

    public function store_login(Request $request){

        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $custom_error = [
            'email.required' => trans('translate.Email is required'),
            'password.required' => trans('translate.Password is required'),
        ];

        $this->validate($request, $rules, $custom_error);


        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $admin = Admin::where('email', $request->email)->first();
        if($admin){
            if($admin->status == $admin::STATUS_ACTIVE){
                if(Hash::check($request->password, $admin->password)){
                    if(Auth::guard('admin')->attempt($credentials, $request->remember)){

                        $notify_message = trans('translate.Login successfully');
                        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
                        return redirect()->route('admin.dashboard')->with($notify_message);

                    }
                }else{
                    $notify_message = trans('translate.Credential does not match');
                    $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
                    return redirect()->back()->with($notify_message);
                }
            }else{
                $notify_message = trans('translate.Inactive your account');
                $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
                return redirect()->back()->with($notify_message);
            }
        }else{
            $notify_message = trans('translate.Email not found');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

    }


    public function admin_logout(){
        Auth::guard('admin')->logout();

        $notify_message = trans('translate.Logout successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.login')->with($notify_message);

    }
}
