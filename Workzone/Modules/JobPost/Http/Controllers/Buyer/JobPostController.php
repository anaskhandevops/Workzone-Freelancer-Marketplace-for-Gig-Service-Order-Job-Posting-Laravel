<?php

namespace Modules\JobPost\Http\Controllers\Buyer;

use App\Models\User;
use Modules\JobPost\Entities\JobRequest;

use Auth, Image, File, Str;
use Illuminate\Http\Request;
use Modules\City\Entities\City;
use Illuminate\Routing\Controller;

use Modules\JobPost\Entities\JobPost;
use Modules\Category\Entities\Category;
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

        $job_posts = JobPost::with('translate','category')->where('user_id', $user->id)->latest()->get();

        $awaiting_job_posts = JobPost::with('translate','category')->where('user_id', $user->id)->where('approved_by_admin', 'pending')->latest()->get();

        $active_job_posts = JobPost::with('translate','category')->where('user_id', $user->id)->where('approved_by_admin', 'approved')->latest()->get();

        $hired_job_posts = JobPost::with('translate','category')->where('user_id', $user->id)->where('approved_by_admin', 'approved')->whereHas('job_applications',function($query) {
            $query->where('status', 'approved');
        })->latest()->get();

        return view('jobpost::buyer.index', compact('job_posts', 'awaiting_job_posts', 'active_job_posts', 'hired_job_posts'));
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {

        $categories = Category::with('translate')->where('status', 'enable')->get();

        $cities = City::with('translate')->get();

        return view('jobpost::buyer.create', compact('categories', 'cities'));

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(JobPostRequest $request)
    {

        $job_post = new JobPost();

        if($request->thumb_image){
            $image_name = 'jobpost'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->thumb_image)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $job_post->thumb_image = $image_name;
        }

        $job_post->user_id = $request->user_id;
        $job_post->category_id = $request->category_id;
        $job_post->city_id = $request->city_id;
        $job_post->slug = $request->slug;
        $job_post->regular_price = $request->regular_price;
        $job_post->job_type = $request->job_type;
        $job_post->status = 'enable';
        $job_post->save();

        $languages = Language::all();
        foreach($languages as $language){
            $jobpost_translate = new JobPostTranslation();
            $jobpost_translate->lang_code = $language->lang_code;
            $jobpost_translate->job_post_id = $job_post->id;
            $jobpost_translate->title = $request->title;
            $jobpost_translate->description = $request->description;
            $jobpost_translate->save();
        }


        $notify_message= trans('translate.Created Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('buyer.jobpost.edit', ['jobpost' => $job_post->id, 'lang_code' => admin_lang()] )->with($notify_message);
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request, $id)
    {

        $job_post = JobPost::findOrFail($id);
        $job_post_translate = JobPostTranslation::where(['job_post_id' => $id, 'lang_code' => $request->lang_code])->first();

        $categories = Category::with('translate')->where('status', 'enable')->get();

        $cities = City::with('translate')->get();

        return view('jobpost::buyer.edit', compact('categories', 'cities', 'job_post', 'job_post_translate'));

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(JobPostRequest $request, $id)
    {

        $job_post = JobPost::findOrFail($id);

        if($request->lang_code == admin_lang()){

            if($request->thumb_image){
                $old_image = $job_post->thumb_image;
                $image_name = 'jobpost'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
                $image_name ='uploads/custom-images/'.$image_name;
                Image::make($request->thumb_image)
                    ->encode('webp', 80)
                    ->save(public_path().'/'.$image_name);
                $job_post->thumb_image = $image_name;
                $job_post->save();

                if($old_image){
                    if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
                }
            }

            $job_post->category_id = $request->category_id;
            $job_post->city_id = $request->city_id;
            $job_post->slug = $request->slug;
            $job_post->regular_price = $request->regular_price;
            $job_post->job_type = $request->job_type;
            $job_post->status = 'enable';
            $job_post->save();

        }

        $jobpost_translate = JobPostTranslation::findOrFail($request->translate_id);
        $jobpost_translate->title = $request->title;
        $jobpost_translate->description = $request->description;
        $jobpost_translate->save();

        $notify_message= trans('translate.Updated Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

        $job_post = JobPost::findOrFail($id);
        $old_image = $job_post->thumb_image;

        if($old_image){
            if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        }

        JobPostTranslation::where('job_post_id',$id)->delete();
        JobRequest::where('job_post_id',$id)->delete();

        $job_post->delete();

        $notify_message=  trans('translate.Delete Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('buyer.jobpost.index')->with($notify_message);
    }

    public function assign_language($lang_code){
        $jobpost_translates = JobPostTranslation::where('lang_code', admin_lang())->get();
        foreach($jobpost_translates as $jobpost_translate){
            $translate = new JobPostTranslation();
            $translate->job_post_id = $jobpost_translate->job_post_id;
            $translate->lang_code = $lang_code;
            $translate->title = $jobpost_translate->title;
            $translate->description = $jobpost_translate->description;
            $translate->save();
        }
    }

    public function jobpost_approval($id){

        $job_post = JobPost::findOrFail($id);
        $job_post->approved_by_admin = 'approved';
        $job_post->status = 'enable';
        $job_post->save();

        $notify_message=  trans('translate.Apporval Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }

    public function job_post_applicants($id){

        $job_post = JobPost::findOrFail($id);

        $job_requests = JobRequest::with('seller')->where('job_post_id', $id)->latest()->get();

        return view('jobpost::buyer.job_applicants', ['job_requests' => $job_requests]);

    }

    public function job_application_approval($id){

        $job_request = JobRequest::findOrFail($id);

        $approval_check = JobRequest::where('job_post_id', $job_request->job_post_id)->where('status', 'approved')->count();

        if($approval_check == 0){
            $job_request = JobRequest::findOrFail($id);
            $job_request->status = 'approved';
            $job_request->save();

            JobRequest::where('job_post_id', $job_request->job_post_id)->where('id', '!=', $id)->update(['status' => 'rejected']);

            $notify_message = trans('translate.Job assigned successfully');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
            return redirect()->back()->with($notify_message);

        }else{
            $notify_message = trans('translate.Job already has assigned, so you can not assign again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

    }

    public function job_application_delete($id){

        $job_request = JobRequest::findOrFail($id);
        $job_request->delete();

        $notify_message = trans('translate.Deleted successfully');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }

}
