<?php

namespace App\Http\Controllers;

use Stripe\Price;
use App\Models\Order;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use Modules\Listing\Entities\Listing;
use Modules\Wallet\App\Models\Wallet;
use Stripe, Auth, Exception, Session;
use Modules\Currency\App\Models\Currency;
use Stripe\Checkout\Session as StripSession;

use Modules\Listing\App\Models\ListingPackage;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Modules\PaymentGateway\App\Models\PaymentGateway;

class PaymentController extends Controller
{

    public $payment_setting;

    public function __construct()
    {
        $payment_data = PaymentGateway::all();


            $this->payment_setting = array();

            foreach($payment_data as $data_item){
                $payment_setting[$data_item->key] = $data_item->value;
            }

            $this->payment_setting  = (object) $payment_setting;
    }

    public function index(Request $request, $service_package_id, $package_name){

        $service_package = ListingPackage::findOrFail($service_package_id);

        if($package_name == 'Basic' || $package_name == 'Standard' || $package_name == 'Premium'){

            $auth_user = Auth::guard('web')->user();

            $service = Listing::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'id' => $service_package->listing_id])->firstOrFail();

            $payable_amount = 0.00;
            if($package_name == 'Basic'){
                $payable_amount = $service_package->basic_price;
            }elseif($package_name == 'Standard'){
                $payable_amount = $service_package->standard_price;
            }elseif($package_name == 'Premium'){
                $payable_amount = $service_package->premium_price;
            }

            $razorpay_currency = Currency::findOrFail($this->payment_setting->razorpay_currency_id);
            $flutterwave_currency = Currency::findOrFail($this->payment_setting->flutterwave_currency_id);
            $paystack_currency = Currency::findOrFail($this->payment_setting->paystack_currency_id);

            return view('payment', [
                'user' => $auth_user,
                'service_package' => $service_package,
                'service' => $service,
                'package_name' => $package_name,
                'payable_amount' => $payable_amount,
                'payment_setting' => $this->payment_setting ,
                'razorpay_currency' => $razorpay_currency ,
                'flutterwave_currency' => $flutterwave_currency ,
                'paystack_currency' => $paystack_currency ,
            ]);

        }else{
            $notify_message = trans('translate.Something went wrong');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

    }

    public function wallet_payment(Request $request, $service_package_id, $package_name){

        if(env('APP_MODE') == 'DEMO'){
            $notify_message = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $auth_user = Auth::guard('web')->user();

        $service_package = ListingPackage::findOrFail($service_package_id);
        $service = Listing::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'id' => $service_package->listing_id])->firstOrFail();

        $package_main_price = 0.00;
        if($package_name == 'Basic'){
            $package_main_price = $service_package->basic_price;
        }elseif($package_name == 'Standard'){
            $package_main_price = $service_package->standard_price;
        }elseif($package_name == 'Premium'){
            $package_main_price = $service_package->premium_price;
        }

        $my_wallet = Wallet::where('buyer_id', $auth_user->id)->first();

        if(!$my_wallet){
            $my_wallet = new Wallet();
            $my_wallet->buyer_id = $auth_user->id;
            $my_wallet->balance = 0.00;
            $my_wallet->save();
        }

        $orders_by_wallet = Order::where('buyer_id', $auth_user->id)->where('payment_method', 'Wallet')->sum('total_amount');

        $current_balance = $my_wallet->balance - $orders_by_wallet;

        if($current_balance < $package_main_price){
            $notify_message = trans('translate.Do not have enough balance to your wallet');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

        $order = $this->create_order($auth_user, $service, $service_package, $package_name, $package_main_price, 'Wallet', 'success', 'wallet');

        $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('buyer.orders')->with($notify_message);



    }


    public function stirpe_payment(Request $request, $service_package_id, $package_name){

        $auth_user = Auth::guard('web')->user();

        $service_package = ListingPackage::findOrFail($service_package_id);
        $service = Listing::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'id' => $service_package->listing_id])->firstOrFail();

        $package_main_price = 0.00;
        if($package_name == 'Basic'){
            $package_main_price = $service_package->basic_price;
        }elseif($package_name == 'Standard'){
            $package_main_price = $service_package->standard_price;
        }elseif($package_name == 'Premium'){
            $package_main_price = $service_package->premium_price;
        }

        $stripe_currency = Currency::findOrFail($this->payment_setting->stripe_currency_id);

        $payable_amount = round($package_main_price * $stripe_currency->currency_rate,2);

        Stripe\Stripe::setApiKey($this->payment_setting->stripe_secret);

        try{
            $result = Stripe\Charge::create ([
                "amount" => $payable_amount * 100,
                "currency" => $stripe_currency->currency_code,
                "source" => $request->stripeToken,
                "description" => env('APP_NAME')
            ]);
        }catch(Exception $ex){
            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }



        $order = $this->create_order($auth_user, $service, $service_package, $package_name, $package_main_price, 'Stripe', 'success', $result->balance_transaction);

        $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('buyer.orders')->with($notify_message);

    }



    public function bank_payment(Request $request, $service_package_id, $package_name){

        $request->validate([
            'tnx_info' => 'required|max:255'
        ],[
            'tnx_info.required' => trans('translate.Transaction field is required')
        ]);

        $auth_user = Auth::guard('web')->user();

        $service_package = ListingPackage::findOrFail($service_package_id);
        $service = Listing::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'id' => $service_package->listing_id])->firstOrFail();

        $package_main_price = 0.00;
        if($package_name == 'Basic'){
            $package_main_price = $service_package->basic_price;
        }elseif($package_name == 'Standard'){
            $package_main_price = $service_package->standard_price;
        }elseif($package_name == 'Premium'){
            $package_main_price = $service_package->premium_price;
        }

        $order = $this->create_order($auth_user, $service, $service_package, $package_name, $package_main_price, 'Bank Payment', 'pending', $request->tnx_info);

        $notify_message = trans('translate.Your payment has been made. please wait for admin payment approval');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('buyer.orders')->with($notify_message);

    }


    public function paypal_payment(Request $request, $service_package_id, $package_name){

        $auth_user = Auth::guard('web')->user();

        $service_package = ListingPackage::findOrFail($service_package_id);
        $service = Listing::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'id' => $service_package->listing_id])->firstOrFail();

        $package_main_price = 0.00;
        if($package_name == 'Basic'){
            $package_main_price = $service_package->basic_price;
        }elseif($package_name == 'Standard'){
            $package_main_price = $service_package->standard_price;
        }elseif($package_name == 'Premium'){
            $package_main_price = $service_package->premium_price;
        }

        $paypal_currency = Currency::findOrFail($this->payment_setting->paypal_currency_id);

        $payable_amount = round($package_main_price * $paypal_currency->currency_rate,2);

        config(['paypal.mode' => $this->payment_setting->paypal_account_mode]);

        if($this->payment_setting->paypal_account_mode == 'sandbox'){
            config(['paypal.sandbox.client_id' => $this->payment_setting->paypal_client_id]);
            config(['paypal.sandbox.client_secret' => $this->payment_setting->paypal_secret_key]);
        }else{
            config(['paypal.live.client_id' => $this->payment_setting->paypal_client_id]);
            config(['paypal.live.client_secret' => $this->payment_setting->paypal_secret_key]);
            config(['paypal.live.app_id' => 'APP-80W284485P519543T']);
        }

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('payment.paypal-success-payment'),
                "cancel_url" => route('payment.paypal-faild-payment'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => $paypal_currency->currency_code,
                        "value" => $payable_amount
                    ]
                ]
            ]
        ]);

        Session::put('service_package_id', $service_package_id);
        Session::put('package_name', $package_name);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);

        } else {
            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

    }



    public function paypal_success_payment(Request $request){


        $paypal_currency = Currency::findOrFail($this->payment_setting->paypal_currency_id);

        config(['paypal.mode' => $this->payment_setting->paypal_account_mode]);

        if($this->payment_setting->paypal_account_mode == 'sandbox'){
            config(['paypal.sandbox.client_id' => $this->payment_setting->paypal_client_id]);
            config(['paypal.sandbox.client_secret' => $this->payment_setting->paypal_secret_key]);
        }else{
            config(['paypal.live.client_id' => $this->payment_setting->paypal_client_id]);
            config(['paypal.live.client_secret' => $this->payment_setting->paypal_secret_key]);
            config(['paypal.live.app_id' => 'APP-80W284485P519543T']);
        }

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $service_package_id = Session::get('service_package_id');

            $package_name = Session::get('package_name');

            $auth_user = Auth::guard('web')->user();

            $service_package = ListingPackage::findOrFail($service_package_id);

            $service = Listing::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'id' => $service_package->listing_id])->firstOrFail();

            $package_main_price = 0.00;
            if($package_name == 'Basic'){
                $package_main_price = $service_package->basic_price;
            }elseif($package_name == 'Standard'){
                $package_main_price = $service_package->standard_price;
            }elseif($package_name == 'Premium'){
                $package_main_price = $service_package->premium_price;
            }


            $order = $this->create_order($auth_user, $service, $service_package, $package_name, $package_main_price, 'Paypal', 'success', $request->PayerID);

            $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
            return redirect()->route('buyer.orders')->with($notify_message);

        } else {

            $service_package_id = Session::get('service_package_id');

            $package_name = Session::get('package_name');

            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('payment.pay', ['service_package_id' => $service_package_id, 'package_name' => $package_name])->with($notify_message);
        }

    }

    public function paypal_faild_payment(Request $request){

        $service_package_id = Session::get('service_package_id');

        $package_name = Session::get('package_name');

        $notify_message = trans('translate.Something went wrong, please try again');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
        return redirect()->route('payment.pay', ['service_package_id' => $service_package_id, 'package_name' => $package_name])->with($notify_message);
    }

    public function razorpay_payment(Request $request, $service_package_id, $package_name){

        $input = $request->all();
        $api = new Api($this->payment_setting->razorpay_key,$this->payment_setting->razorpay_secret);
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
                $payId = $response->id;

                $auth_user = Auth::guard('web')->user();

                $service_package = ListingPackage::findOrFail($service_package_id);

                $service = Listing::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'id' => $service_package->listing_id])->firstOrFail();

                $package_main_price = 0.00;
                if($package_name == 'Basic'){
                    $package_main_price = $service_package->basic_price;
                }elseif($package_name == 'Standard'){
                    $package_main_price = $service_package->standard_price;
                }elseif($package_name == 'Premium'){
                    $package_main_price = $service_package->premium_price;
                }

                $order = $this->create_order($auth_user, $service, $service_package, $package_name, $package_main_price, 'Razorpay', 'success', $payId);

                $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
                $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
                return redirect()->route('buyer.orders')->with($notify_message);

            }catch (Exception $e) {
                $notify_message = trans('translate.Something went wrong, please try again');
                $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
                return redirect()->route('payment.pay', ['service_package_id' => $service_package_id, 'package_name' => $package_name])->with($notify_message);
            }
        }else{
            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('payment.pay', ['service_package_id' => $service_package_id, 'package_name' => $package_name])->with($notify_message);
        }
    }


    public function flutterwave_payment(Request $request, $service_package_id, $package_name){

        $curl = curl_init();
        $tnx_id = $request->tnx_id;
        $url = "https://api.flutterwave.com/v3/transactions/$tnx_id/verify";
        $token = $this->payment_setting->flutterwave_secret_key;
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Bearer $token"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        if($response->status == 'success'){

            $auth_user = Auth::guard('web')->user();

            $service_package = ListingPackage::findOrFail($service_package_id);

            $service = Listing::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'id' => $service_package->listing_id])->firstOrFail();

            $package_main_price = 0.00;
            if($package_name == 'Basic'){
                $package_main_price = $service_package->basic_price;
            }elseif($package_name == 'Standard'){
                $package_main_price = $service_package->standard_price;
            }elseif($package_name == 'Premium'){
                $package_main_price = $service_package->premium_price;
            }

            $order = $this->create_order($auth_user, $service, $service_package, $package_name, $package_main_price, 'Flutterwave', 'success', $tnx_id);

            $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
            return response()->json(['status' => 'success' , 'message' => $notify_message]);
        }else{
            $notify_message = trans('translate.Something went wrong, please try again');
            return response()->json(['status' => 'faild' , 'message' => $notify_message]);
        }


    }


    public function mollie_payment(Request $request, $service_package_id, $package_name){

        if(env('APP_MODE') == 'DEMO'){
            $notify_message = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $auth_user = Auth::guard('web')->user();

        $service_package = ListingPackage::findOrFail($service_package_id);
        $service = Listing::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'id' => $service_package->listing_id])->firstOrFail();

        $package_main_price = 0.00;
        if($package_name == 'Basic'){
            $package_main_price = $service_package->basic_price;
        }elseif($package_name == 'Standard'){
            $package_main_price = $service_package->standard_price;
        }elseif($package_name == 'Premium'){
            $package_main_price = $service_package->premium_price;
        }


        try{
            $mollie_currency = Currency::findOrFail($this->payment_setting->mollie_currency_id);

            $price = $package_main_price * $mollie_currency->currency_rate;
            $price = sprintf('%0.2f', $price);

            $mollie_api_key = $this->payment_setting->mollie_key;

            $currency = strtoupper($mollie_currency->currency_code);

            Mollie::api()->setApiKey($mollie_api_key);

            $payment = Mollie::api()->payments()->create([
                'amount' => [
                    'currency' => $currency,
                    'value' => ''.$price.'',
                ],
                'description' => env('APP_NAME'),
                'redirectUrl' => route('payment.mollie-callback'),
            ]);

            $payment = Mollie::api()->payments()->get($payment->id);

            Session::put('service_package_id', $service_package_id);
            Session::put('package_name', $package_name);
            Session::put('payment_id', $payment->id);

            return redirect($payment->getCheckoutUrl(), 303);

        }catch (Exception $e) {
            $notify_message = trans('translate.Please provide valid mollie api key');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }





    }


    public function mollie_callback(Request $request){

        $mollie_api_key = $this->payment_setting->mollie_key;
        Mollie::api()->setApiKey($mollie_api_key);
        $payment = Mollie::api()->payments->get(session()->get('payment_id'));
        if ($payment->isPaid()){

            $service_package_id = Session::get('service_package_id');

            $package_name = Session::get('package_name');

            $auth_user = Auth::guard('web')->user();

            $service_package = ListingPackage::findOrFail($service_package_id);

            $service = Listing::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'id' => $service_package->listing_id])->firstOrFail();

            $package_main_price = 0.00;
            if($package_name == 'Basic'){
                $package_main_price = $service_package->basic_price;
            }elseif($package_name == 'Standard'){
                $package_main_price = $service_package->standard_price;
            }elseif($package_name == 'Premium'){
                $package_main_price = $service_package->premium_price;
            }

            $order = $this->create_order($auth_user, $service, $service_package, $package_name, $package_main_price, 'Mollie', 'success', session()->get('payment_id'));


            $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
            return redirect()->route('buyer.orders')->with($notify_message);

        }else{
            $service_package_id = Session::get('service_package_id');

            $package_name = Session::get('package_name');

            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('payment.pay', ['service_package_id' => $service_package_id, 'package_name' => $package_name])->with($notify_message);
        }


    }


    public function paystack_payment(Request $request, $service_package_id, $package_name){

        $reference = $request->reference;
        $transaction = $request->tnx_id;
        $secret_key = $this->payment_setting->paystack_secret_key;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYHOST =>0,
            CURLOPT_SSL_VERIFYPEER =>0,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $secret_key",
                "Cache-Control: no-cache",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $final_data = json_decode($response);
        if($final_data->status == true) {

            $auth_user = Auth::guard('web')->user();

            $service_package = ListingPackage::findOrFail($service_package_id);

            $service = Listing::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'id' => $service_package->listing_id])->firstOrFail();

            $package_main_price = 0.00;
            if($package_name == 'Basic'){
                $package_main_price = $service_package->basic_price;
            }elseif($package_name == 'Standard'){
                $package_main_price = $service_package->standard_price;
            }elseif($package_name == 'Premium'){
                $package_main_price = $service_package->premium_price;
            }

            $order = $this->create_order($auth_user, $service, $service_package, $package_name, $package_main_price, 'Paystack', 'success', $transaction);

            $notification = trans('translate.Your payment has been made successful. Thanks for your new purchase');
            return response()->json(['status' => 'success' , 'message' => $notification]);

        }else{
            $notification = trans('translate.Something went wrong, please try again');
            return response()->json(['status' => 'faild' , 'message' => $notification]);
        }


    }


    public function instamojo_payment(Request $request, $service_package_id, $package_name){
        if(env('APP_MODE') == 'DEMO'){
            $notify_message = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $auth_user = Auth::guard('web')->user();

        $service_package = ListingPackage::findOrFail($service_package_id);
        $service = Listing::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'id' => $service_package->listing_id])->firstOrFail();

        $package_main_price = 0.00;
        if($package_name == 'Basic'){
            $package_main_price = $service_package->basic_price;
        }elseif($package_name == 'Standard'){
            $package_main_price = $service_package->standard_price;
        }elseif($package_name == 'Premium'){
            $package_main_price = $service_package->premium_price;
        }

        $instamojo_currency = Currency::findOrFail($this->payment_setting->instamojo_currency_id);

        $price = $package_main_price * $instamojo_currency->currency_rate;
        $price = round($price,2);

        $environment = $this->payment_setting->instamojo_account_mode;
        $api_key = $this->payment_setting->instamojo_api_key;
        $auth_token = $this->payment_setting->instamojo_auth_token;

        if($environment == 'Sandbox') {
            $url = 'https://test.instamojo.com/api/1.1/';
        } else {
            $url = 'https://www.instamojo.com/api/1.1/';
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url.'payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:$api_key",
                "X-Auth-Token:$auth_token"));
        $payload = Array(
            'purpose' => env("APP_NAME"),
            'amount' => $price,
            'phone' => '918160651749',
            'buyer_name' => Auth::user()->name,
            'redirect_url' => route('payment.instamojo-callback'),
            'send_email' => true,
            'webhook' => 'http://www.example.com/webhook/',
            'send_sms' => true,
            'email' => Auth::user()->email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);
        Session::put('service_package_id', $service_package_id);
        Session::put('package_name', $package_name);
        return redirect($response->payment_request->longurl);


    }

    public function instamojo_callback(Request $request){


        $input = $request->all();

        $environment = $this->payment_setting->instamojo_account_mode;
        $api_key = $this->payment_setting->instamojo_api_key;
        $auth_token = $this->payment_setting->instamojo_auth_token;

        if($environment == 'Sandbox') {
            $url = 'https://test.instamojo.com/api/1.1/';
        } else {
            $url = 'https://www.instamojo.com/api/1.1/';
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url.'payments/'.$request->get('payment_id'));
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:$api_key",
                "X-Auth-Token:$auth_token"));
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            $service_package_id = Session::get('service_package_id');

            $package_name = Session::get('package_name');

            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('payment.pay', ['service_package_id' => $service_package_id, 'package_name' => $package_name])->with($notify_message);

        } else {
            $data = json_decode($response);
        }

        if($data->success == true) {
            if($data->payment->status == 'Credit') {

                $service_package_id = Session::get('service_package_id');

                $package_name = Session::get('package_name');

                $auth_user = Auth::guard('web')->user();

                $service_package = ListingPackage::findOrFail($service_package_id);

                $service = Listing::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'id' => $service_package->listing_id])->firstOrFail();

                $package_main_price = 0.00;
                if($package_name == 'Basic'){
                    $package_main_price = $service_package->basic_price;
                }elseif($package_name == 'Standard'){
                    $package_main_price = $service_package->standard_price;
                }elseif($package_name == 'Premium'){
                    $package_main_price = $service_package->premium_price;
                }

                $order = $this->create_order($auth_user, $service, $service_package, $package_name, $package_main_price, 'Instamojo', 'success', $request->get('payment_id'));

                $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
                $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
                return redirect()->route('buyer.orders')->with($notify_message);


            }
        }else{
            $service_package_id = Session::get('service_package_id');

            $package_name = Session::get('package_name');

            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('payment.pay', ['service_package_id' => $service_package_id, 'package_name' => $package_name])->with($notify_message);
        }

    }

    public function create_order($user, $service, $service_package, $package_name, $package_main_price, $payment_method, $payment_status, $transaction_id){


        $order = new Order();
        $order->order_id = substr(rand(0,time()),0,10);
        $order->seller_id = $service->seller_id;
        $order->buyer_id = $user->id;
        $order->listing_id = $service->id;
        $order->listing_package_id = $service_package->id;
        $order->total_amount = $package_main_price;
        $order->package_amount = $package_main_price;
        $order->payment_method = $payment_method;
        $order->payment_status = $payment_status;
        $order->transaction_id = $transaction_id;

        if($package_name == 'Basic'){

            $order->package_name = $service_package->basic_name;
            $order->package_description = $service_package->basic_description;
            $order->delivery_date = $service_package->basic_delivery_date;
            $order->revision = $service_package->basic_revision;
            $order->fn_website = $service_package->basic_fn_website;
            $order->number_of_page = $service_package->basic_page;
            $order->responsive = $service_package->basic_responsive;
            $order->source_code = $service_package->basic_source_code;
            $order->content_upload = $service_package->basic_content_upload;
            $order->speed_optimized = $service_package->basic_speed_optimized;

        }elseif($package_name == 'Standard'){
            $order->package_name = $service_package->standard_name;
            $order->package_description = $service_package->standard_description;
            $order->delivery_date = $service_package->standard_delivery_date;
            $order->revision = $service_package->standard_revision;
            $order->fn_website = $service_package->standard_fn_website;
            $order->number_of_page = $service_package->standard_page;
            $order->responsive = $service_package->standard_responsive;
            $order->source_code = $service_package->standard_source_code;
            $order->content_upload = $service_package->standard_content_upload;
            $order->speed_optimized = $service_package->standard_speed_optimized;

        }elseif($package_name == 'Premium'){
            $order->package_name = $service_package->premium_name;
            $order->package_description = $service_package->premium_description;
            $order->delivery_date = $service_package->premium_delivery_date;
            $order->revision = $service_package->premium_revision;
            $order->fn_website = $service_package->premium_fn_website;
            $order->number_of_page = $service_package->premium_page;
            $order->responsive = $service_package->premium_responsive;
            $order->source_code = $service_package->premium_source_code;
            $order->content_upload = $service_package->premium_content_upload;
            $order->speed_optimized = $service_package->premium_speed_optimized;
        }

        $order->save();


        return $order;



    }
}
