<?php

namespace Modules\Page\App\Http\Controllers;

use Image, File, Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Page\App\Models\AboutUs;
use Illuminate\Http\RedirectResponse;
use Modules\Page\App\Models\AboutUsTranslation;
use Modules\Page\App\Http\Requests\AboutUsRequest;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $about_us = AboutUs::first();
        $translate = AboutUsTranslation::where(['about_us_id' => $about_us->id, 'lang_code' => $request->lang_code])->first();

        return view('page::about_us', ['about_us' => $about_us, 'translate' => $translate]);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(AboutUsRequest $request)
    {
        $about_us = AboutUs::first();
        $translate = AboutUsTranslation::where(['about_us_id' => $about_us->id, 'lang_code' => $request->lang_code])->first();

        $translate->short_title = $request->short_title;
        $translate->title = $request->title;
        $translate->description = $request->description;
        $translate->item1 = $request->item1;
        $translate->item2 = $request->item2;
        $translate->item3 = $request->item3;
        $translate->save();

        if($request->seo_signature){
            $old_image = $about_us->seo_signature;
            $image_name = 'seo_signature-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->seo_signature)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $about_us->seo_signature = $image_name;
            $about_us->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        if($request->seo_image){
            $old_image = $about_us->seo_image;
            $image_name = 'seo_image-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->seo_image)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $about_us->seo_image = $image_name;
            $about_us->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        if($request->about_image){
            $old_image = $about_us->about_image;
            $image_name = 'about_image-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->about_image)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $about_us->about_image = $image_name;
            $about_us->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        $notify_message = trans('translate.Update successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }


    public function setup_language($lang_code){
        $about_translate = AboutUsTranslation::where('lang_code' , admin_lang())->first();

        $new_trans = new AboutUsTranslation();
        $new_trans->lang_code = $lang_code;
        $new_trans->about_us_id = $about_translate->about_us_id;
        $new_trans->short_title = $about_translate->short_title;
        $new_trans->title = $about_translate->title;
        $new_trans->description = $about_translate->description;
        $new_trans->item1 = $about_translate->item1;
        $new_trans->item2 = $about_translate->item2;
        $new_trans->item3 = $about_translate->item3;
        $new_trans->save();


    }

}
