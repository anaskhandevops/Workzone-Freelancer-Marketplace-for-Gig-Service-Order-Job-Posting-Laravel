<?php

namespace Modules\JobPost\Http\Controllers\Seller;

use App\Models\User;
use App\Rules\Captcha;

use Auth, Image, File, Str;
use Illuminate\Http\Request;
use Modules\City\Entities\City;
use Illuminate\Routing\Controller;

use Modules\JobPost\Entities\JobPost;
use Modules\Category\Entities\Category;
use Modules\JobPost\Entities\JobRequest;

use Modules\Language\App\Models\Language;

use Illuminate\Contracts\Support\Renderable;
use Modules\JobPost\Entities\JobPostTranslation;
use Modules\JobPost\Http\Requests\JobPostRequest;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user = Auth::guard('web')->user();

        $job_requests = JobRequest::with('job_post')->where('seller_id', $user->id)->latest()->paginate(10);

        $hired_job_requests = JobRequest::with('job_post')->where('seller_id', $user->id)->where('status', 'approved')->latest()->paginate(10);

        $pending_job_requests = JobRequest::with('job_post')->where('seller_id', $user->id)->where('status', 'pending')->latest()->paginate(10);

        $reject_job_requests = JobRequest::with('job_post')->where('seller_id', $user->id)->where('status', 'rejected')->latest()->paginate(10);

        return view('jobpost::seller.index', [
            'job_requests' => $job_requests,
            'hired_job_requests' => $hired_job_requests,
            'pending_job_requests' => $pending_job_requests,
            'reject_job_requests' => $reject_job_requests,
        ]);
    }



    public function apply_job(Request $request, $id){

        $rules = [
            'description'=>'required',
            'g-recaptcha-response'=>new Captcha()
        ];

        $customMessages = [
            'description.required' => trans('translate.Message is required'),
        ];

        $request->validate($rules,$customMessages);

        $auth_user = Auth::guard('web')->user();

        if($auth_user->is_seller == 0){
            $notify_message = trans('translate.To apply the job, you have to logged in as a seller');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $is_exist = JobRequest::where(['seller_id' => $auth_user->id, 'job_post_id' => $id])->count();
        if($is_exist > 0){
            $notify_message = trans('translate.Application already submited');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $approval_check = JobRequest::where('job_post_id', $request->listing_id)->where('status', 'approved')->count();

        if($approval_check > 0){
            $notify_message = trans('translate.Job already has assigned, so you can not apply');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $job_post = JobPost::findOrFail($id);

        $job_request = new JobRequest();
        $job_request->seller_id = $auth_user->id;
        $job_request->user_id = $job_post->user_id;
        $job_request->job_post_id = $id;
        $job_request->description = $request->description;
        $job_request->save();

        $notify_message = trans('translate.Your application has submited successfully, please wait for agent approval');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }


}
