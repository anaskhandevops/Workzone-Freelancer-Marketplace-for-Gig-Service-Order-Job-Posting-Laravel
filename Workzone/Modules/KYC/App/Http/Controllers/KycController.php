<?php

namespace Modules\KYC\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Modules\KYC\App\Models\KycType;
use Modules\KYC\App\Models\KycInformation;
use Session, Auth, Image, File, Str ,Mail;
use App\Helper\EmailHelper;
use Modules\KYC\App\Emails\KycVerificationEmail;


class KycController extends Controller
{
    public function kyc(){

        $user = Auth::guard('web')->user();

        $kyc = KycInformation::where(['user_id' => $user->id])->first();
        $kycType = KycType::orderBy('id', 'desc')->get();

        return view('kyc::seller.kyc_info',compact('kyc','kycType'));
    }

    public function kycSubmit(Request $request){
        $user = Auth::guard('web')->user();
        $rules = [
            'kyc_id'=>'required',
            'file'=>'required',
        ];
        $customMessages = [
            'kyc_id.required' => trans('translate.Type of is required'),
            'file' => trans('translate.File is required'),
        ];

        $request->validate($rules,$customMessages);

        $kyc = new KycInformation();

        if($request->file){
            $image_name = 'kyc'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->file)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $kyc->file = $image_name;
        }

        $kyc->kyc_id = $request->kyc_id;
        $kyc->user_id = $user->id;
        $kyc->message = $request->message;
        $kyc->status = 0;
        $kyc->save();

        $notify_message= trans('translate.Information Submited Successfully. Pls Wait for Conformation');
        EmailHelper::mail_setup();

        $subject= trans('translate.KYC Verifaction');
        $message = 'Name: ' . $user->name . '<br>' . $notify_message;

        Mail::to($user->email)->send(new KycVerificationEmail($message,$subject));


        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }
}
