<?php

namespace Modules\Page\App\Http\Controllers;

use Image, File, Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Page\App\Models\Homepage;
use Modules\Page\App\Http\Requests\IntroRequest;
use Modules\Page\App\Models\HomepageTranslation;
use Modules\Page\App\Http\Requests\IntroRequest2;
use Modules\Page\App\Http\Requests\ExploreRequest;
use Modules\Page\App\Http\Requests\JoinSellerRequest;
use Modules\Page\App\Http\Requests\OurFeatureRequest;
use Modules\Page\App\Http\Requests\WorkingStepRequest;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function intro_section(Request $request)
    {
        $homepage = Homepage::first();
        $translate = HomepageTranslation::where(['homepage_id' => $homepage->id, 'lang_code' => $request->lang_code])->first();

        return view('page::section.intro', ['homepage' => $homepage, 'translate' => $translate]);
    }


    public function update_intro_section(IntroRequest $request)
    {

        $translate = HomepageTranslation::where(['id' => $request->translate_id, 'lang_code' => $request->lang_code])->first();
        $translate->intro_title = $request->intro_title;
        $translate->total_rating = $request->total_rating;
        $translate->total_customer = $request->total_customer;
        $translate->save();

        $homepage = Homepage::first();

        if($request->intro_banner_one){
            $old_image = $homepage->intro_banner_one;
            $image_name = 'intro-one-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->intro_banner_one)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $homepage->intro_banner_one = $image_name;
            $homepage->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        if($request->customer_image){
            $old_image = $homepage->customer_image;
            $image_name = 'intro-two-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->customer_image)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $homepage->customer_image = $image_name;
            $homepage->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }



        $notify_message = trans('translate.Update successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function intro2_section(Request $request)
    {
        $homepage = Homepage::first();
        $translate = HomepageTranslation::where(['homepage_id' => $homepage->id, 'lang_code' => $request->lang_code])->first();

        return view('page::section.intro2', ['homepage' => $homepage, 'translate' => $translate]);
    }

    public function update_intro2_section(IntroRequest2 $request)
    {

        $translate = HomepageTranslation::where(['id' => $request->translate_id, 'lang_code' => $request->lang_code])->first();
        $translate->home2_intro_title = $request->home2_intro_title;
        $translate->home2_intro_description = $request->home2_intro_description;
        $translate->save();

        $homepage = Homepage::first();

        if($request->lang_code == admin_lang()){
            $homepage->home2_intro_tags = $request->home2_intro_tags;
            $homepage->save();
        }

        if($request->home2_intro_bg){
            $old_image = $homepage->home2_intro_bg;
            $image_name = 'intro-one-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->home2_intro_bg)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $homepage->home2_intro_bg = $image_name;
            $homepage->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        if($request->home2_intro_forground){
            $old_image = $homepage->home2_intro_forground;
            $image_name = 'intro-two-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->home2_intro_forground)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $homepage->home2_intro_forground = $image_name;
            $homepage->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }



        $notify_message = trans('translate.Update successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function working_step(Request $request)
    {
        $homepage = Homepage::first();
        $translate = HomepageTranslation::where(['homepage_id' => $homepage->id, 'lang_code' => $request->lang_code])->first();

        return view('page::section.working_step', ['homepage' => $homepage, 'translate' => $translate]);
    }

    public function update_working_step(WorkingStepRequest $request)
    {

        $translate = HomepageTranslation::where(['id' => $request->translate_id, 'lang_code' => $request->lang_code])->first();
        $translate->working_step_title1 = $request->working_step_title1;
        $translate->working_step_title2 = $request->working_step_title2;
        $translate->working_step_title3 = $request->working_step_title3;
        $translate->working_step_title4 = $request->working_step_title4;
        $translate->working_step_des1 = $request->working_step_des1;
        $translate->working_step_des2 = $request->working_step_des2;
        $translate->working_step_des3 = $request->working_step_des3;
        $translate->save();

        $homepage = Homepage::first();

        if($request->working_step_icon1){
            $old_image = $homepage->working_step_icon1;
            $image_name = 'working-step-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->working_step_icon1)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $homepage->working_step_icon1 = $image_name;
            $homepage->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

         if($request->working_step_icon2){
            $old_image = $homepage->working_step_icon2;
            $image_name = 'working-step-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->working_step_icon2)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $homepage->working_step_icon2 = $image_name;
            $homepage->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

         if($request->working_step_icon3){
            $old_image = $homepage->working_step_icon3;
            $image_name = 'working-step-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->working_step_icon3)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $homepage->working_step_icon3 = $image_name;
            $homepage->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        if($request->working_step_icon4){
            $old_image = $homepage->working_step_icon4;
            $image_name = 'working-step-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->working_step_icon4)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $homepage->working_step_icon4 = $image_name;
            $homepage->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        $notify_message = trans('translate.Update successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function our_feature(Request $request)
    {
        $homepage = Homepage::first();
        $translate = HomepageTranslation::where(['homepage_id' => $homepage->id, 'lang_code' => $request->lang_code])->first();

        return view('page::section.our_feature', ['homepage' => $homepage, 'translate' => $translate]);
    }

    public function update_our_feature(OurFeatureRequest $request)
    {


        $homepage = Homepage::first();

        $translate = HomepageTranslation::where(['homepage_id' => $homepage->id, 'lang_code' => $request->lang_code])->first();
        $translate->feature_title1 = $request->feature_title1;
        $translate->feature_title2 = $request->feature_title2;
        $translate->feature_title3 = $request->feature_title3;
        $translate->feature_title4 = $request->feature_title4;
        $translate->feature_title5 = $request->feature_title5;
        $translate->save();


        if($request->feature_icon1){
            $old_image = $homepage->feature_icon1;
            $image_name = 'feature_icon1-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->feature_icon1)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $homepage->feature_icon1 = $image_name;
            $homepage->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        if($request->feature_icon2){
            $old_image = $homepage->feature_icon2;
            $image_name = 'feature_icon2-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->feature_icon2)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $homepage->feature_icon2 = $image_name;
            $homepage->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        if($request->feature_icon3){
            $old_image = $homepage->feature_icon3;
            $image_name = 'feature_icon3-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->feature_icon3)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $homepage->feature_icon3 = $image_name;
            $homepage->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        if($request->feature_icon4){
            $old_image = $homepage->feature_icon4;
            $image_name = 'feature_icon4-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->feature_icon4)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $homepage->feature_icon4 = $image_name;
            $homepage->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        if($request->feature_icon5){
            $old_image = $homepage->feature_icon5;
            $image_name = 'feature_icon5-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->feature_icon5)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $homepage->feature_icon5 = $image_name;
            $homepage->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }


        $notify_message = trans('translate.Update successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }




    public function join_seller(Request $request){

        $homepage = Homepage::first();
        $translate = HomepageTranslation::where(['homepage_id' => $homepage->id, 'lang_code' => $request->lang_code])->first();

        return view('page::section.join_seller' , ['homepage' => $homepage, 'translate' => $translate]);
    }

    public function update_join_seller(JoinSellerRequest $request)
    {

        $translate = HomepageTranslation::where(['id' => $request->translate_id, 'lang_code' => $request->lang_code])->first();
        $translate->join_seller_title = $request->join_seller_title;
        $translate->join_seller_des = $request->join_seller_des;
        $translate->save();

        $homepage = Homepage::first();

        if($request->join_seller_image){
            $old_image = $homepage->join_seller_image;
            $image_name = 'working-step-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->join_seller_image)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $homepage->join_seller_image = $image_name;
            $homepage->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        $notify_message = trans('translate.Update successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function explore_section(Request $request){
        $homepage = Homepage::first();
        $translate = HomepageTranslation::where(['homepage_id' => $homepage->id, 'lang_code' => $request->lang_code])->first();

        return view('page::section.explore' , ['homepage' => $homepage, 'translate' => $translate]);
    }

    public function update_explore_section(ExploreRequest $request)
    {

        $translate = HomepageTranslation::where(['id' => $request->translate_id, 'lang_code' => $request->lang_code])->first();
        $translate->explore_short_title = $request->explore_short_title;
        $translate->explore_title = $request->explore_title;
        $translate->explore_description = $request->explore_description;
        $translate->save();

        if($request->lang_code == admin_lang()){
            $homepage = Homepage::first();
            $homepage->explore_total_customer = $request->explore_total_customer;
            $homepage->explore_total_service = $request->explore_total_service;
            $homepage->explore_total_job = $request->explore_total_job;
            $homepage->save();
        }

        if($request->explore_image){
            $old_image = $homepage->explore_image;
            $image_name = 'explore-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->explore_image)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $homepage->explore_image = $image_name;
            $homepage->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }


        $notify_message = trans('translate.Update successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }


    public function setup_language($lang_code){
        $home_translates = HomepageTranslation::where('lang_code' , admin_lang())->first();

        $new_trans = new HomepageTranslation();
        $new_trans->lang_code = $lang_code;
        $new_trans->homepage_id = $home_translates->homepage_id;
        $new_trans->intro_title = $home_translates->intro_title;
        $new_trans->home2_intro_title = $home_translates->home2_intro_title;
        $new_trans->home2_intro_description = $home_translates->home2_intro_description;
        $new_trans->total_rating = $home_translates->total_rating;
        $new_trans->total_customer = $home_translates->total_customer;
        $new_trans->working_step_title1 = $home_translates->working_step_title1;
        $new_trans->working_step_title2 = $home_translates->working_step_title2;
        $new_trans->working_step_title3 = $home_translates->working_step_title3;
        $new_trans->working_step_title4 = $home_translates->working_step_title4;
        $new_trans->working_step_des1 = $home_translates->working_step_des1;
        $new_trans->working_step_des2 = $home_translates->working_step_des2;
        $new_trans->working_step_des3 = $home_translates->working_step_des3;
        $new_trans->join_seller_title = $home_translates->join_seller_title;
        $new_trans->join_seller_des = $home_translates->join_seller_des;
        $new_trans->mobile_app_title = $home_translates->mobile_app_title;
        $new_trans->mobile_app_des = $home_translates->mobile_app_des;
        $new_trans->explore_short_title = $home_translates->explore_short_title;
        $new_trans->explore_title = $home_translates->explore_title;
        $new_trans->explore_description = $home_translates->explore_description;
        $new_trans->feature_title1 = $home_translates->feature_title1;
        $new_trans->feature_title2 = $home_translates->feature_title2;
        $new_trans->feature_title3 = $home_translates->feature_title3;
        $new_trans->feature_title4 = $home_translates->feature_title4;
        $new_trans->feature_title5 = $home_translates->feature_title5;
        $new_trans->save();

    }

}
