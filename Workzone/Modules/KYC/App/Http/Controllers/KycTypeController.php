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
use App\Models\User;

class KycTypeController extends Controller
{
    public function index(){

        $kycType = KycType::orderBy('id', 'desc')->get();

        return view('kyc::admin.type.index',compact('kycType'));
    }

    public function create(){
        return view('kyc::admin.type.create');
    }

    public function store(Request $request){
        $rules = [
            'name'=>'required',
        ];
        $customMessages = [
            'name.required' => trans('translate.Name is required'),
        ];

        $request->validate($rules,$customMessages);

        $kyctype = new KycType();
        $kyctype->name = $request->name;
        $kyctype->status = $request->status;
        $kyctype->save();

        $notify_message = trans('translate.Created successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.kyc.index')->with($notify_message);

    }

    public function edit($id){
        $kyc = KycType::find($id);
        return view('kyc::admin.type.edit',compact('kyc'));
    }

    public function update(Request $request, $id){
        $rules = [
            'name'=>'required',
        ];
        $customMessages = [
            'name.required' => trans('translate.Name is required'),
        ];

        $request->validate($rules,$customMessages);

        $kyc = KycType::find($id);
        $kyc->name = $request->name;
        $kyc->status = $request->status;
        $kyc->save();

        $notify_message = trans('translate.Updated Successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.kyc.index')->with($notify_message);

    }

    public function destroy($id){

        $kyc = KycType::find($id);
        $kyc_info_qty = KycInformation::where('kyc_id', $id)->count();
        if($kyc_info_qty > 0 ){
            $notify_message = trans('translate.Multiple KYC Information Submited under it, so you can not delete it');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }
        $kyc->delete();

        $notify_message = trans('translate.Deleted Successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.kyc.index')->with($notify_message);
    }

    public function DestroyKyc($id){
        $kyc = KycInformation::find($id);
        $kyc->delete();

        $notify_message = trans('translate.Deleted Successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }


    public function UpdateKycStatus(Request $request, $id){

        $kyc = KycInformation::find($id);
        $kyc->status = $request->status;
        $kyc->save();

        $seller = User::where('id',$kyc->user_id)->first();
        $seller->kyc_status = $request->status;
        $seller->save();

        $notification= trans('translate.Updated Successfully');

        $notification2= trans('translate.Your Account Is Verified By KYC');
        EmailHelper::mail_setup();

        $subject= trans('translate.KYC Verifaction');
        $message = 'Name: ' . $seller->name . '<br>' . $notification2;

        Mail::to($seller->email)->send(new KycVerificationEmail($message,$subject));

        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function kycPendingList(){

       $kycs = KycInformation::where('status',0)->orderBy('id', 'desc')->get();

        return view('kyc::admin.kyc.index',compact('kycs'));
    }

    public function kycApprovalList(){

        $kycs = KycInformation::where('status',1)->orderBy('id', 'desc')->get();

         return view('kyc::admin.kyc.index',compact('kycs'));
    }

    public function kycRejectList(){

        $kycs = KycInformation::where('status',2)->orderBy('id', 'desc')->get();

         return view('kyc::admin.kyc.index',compact('kycs'));
    }
}
