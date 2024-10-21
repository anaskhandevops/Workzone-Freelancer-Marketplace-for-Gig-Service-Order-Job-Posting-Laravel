<?php

namespace Modules\Listing\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use Auth, Image, File, Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Listing\Entities\Listing;

use Modules\Category\Entities\Category;
use Modules\Category\Entities\SubCategory;
use Modules\Language\App\Models\Language;
use Illuminate\Contracts\Support\Renderable;
use Modules\Listing\Entities\ListingGallery;

use Modules\Listing\App\Models\ListingPackage;

use Modules\Listing\Entities\ListingTranslation;
use Modules\Listing\Http\Requests\ListingRequest;
use Modules\Subscription\Entities\SubscriptionHistory;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $listings = Listing::with('translate','seller','category')->latest()->get();

        return view('listing::index', compact('listings'));
    }

    public function awaiting_listings()
    {
        $listings = Listing::with('translate','seller')->where('approved_by_admin', 'pending')->latest()->get();

        return view('listing::awaiting_listing', compact('listings'));
    }

    public function featured_listings()
    {
        $listings = Listing::with('translate','seller')->where('is_featured', 'enable')->latest()->get();

        return view('listing::featured_listing', compact('listings'));
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $categories = Category::with('translate')->where('status', 'enable')->get();
        $agents = User::where(['status' => 'enable' , 'is_banned' => 'no', 'is_seller' => 1])->where('email_verified_at', '!=', null)->orderBy('id','desc')->get();

        return view('listing::create', compact('categories', 'agents'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ListingRequest $request)
    {
        $listing = new Listing();

        if($request->thumb_image){
            $image_name = 'listing'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->thumb_image)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $listing->thumb_image = $image_name;
        }

        $listing->seller_id = $request->seller_id;
        $listing->category_id = $request->category_id;
        $listing->sub_category_id = $request->sub_category_id;
        $listing->slug = $request->slug;
        $listing->approved_by_admin = 'approved';
        $listing->status = 'enable';
        $listing->tags = $request->tags;
        $listing->seo_title = $request->seo_title ? $request->seo_title : $request->title;
        $listing->seo_description = $request->seo_description ? $request->seo_description : $request->title;
        $listing->save();


        $package = new ListingPackage();
        $package->listing_id = $listing->id;
        $package->basic_name = 'Basic';
        $package->basic_description = $request->basic_description;
        $package->basic_price = $request->basic_price;
        $package->basic_delivery_date = $request->basic_delivery_date;
        $package->basic_revision = $request->basic_revision;
        $package->basic_fn_website = $request->basic_fn_website;
        $package->basic_page = $request->basic_page;
        $package->basic_responsive = $request->basic_responsive;
        $package->basic_source_code = $request->basic_source_code;
        $package->basic_content_upload = $request->basic_content_upload;
        $package->basic_speed_optimized = $request->basic_speed_optimized;

        $package->standard_name = 'Standard';
        $package->standard_description = $request->standard_description;
        $package->standard_price = $request->standard_price;
        $package->standard_delivery_date = $request->standard_delivery_date;
        $package->standard_revision = $request->standard_revision;
        $package->standard_fn_website = $request->standard_fn_website;
        $package->standard_page = $request->standard_page;
        $package->standard_responsive = $request->standard_responsive;
        $package->standard_source_code = $request->standard_source_code;
        $package->standard_content_upload = $request->standard_content_upload;
        $package->standard_speed_optimized = $request->standard_speed_optimized;

        $package->premium_name = 'Premium';
        $package->premium_description = $request->premium_description;
        $package->premium_price = $request->premium_price;
        $package->premium_delivery_date = $request->premium_delivery_date;
        $package->premium_revision = $request->premium_revision;
        $package->premium_fn_website = $request->premium_fn_website;
        $package->premium_page = $request->premium_page;
        $package->premium_responsive = $request->premium_responsive;
        $package->premium_source_code = $request->premium_source_code;
        $package->premium_content_upload = $request->premium_content_upload;
        $package->premium_speed_optimized = $request->premium_speed_optimized;
        $package->save();


        $languages = Language::all();
        foreach($languages as $language){
            $listing_translate = new ListingTranslation();
            $listing_translate->lang_code = $language->lang_code;
            $listing_translate->listing_id = $listing->id;
            $listing_translate->title = $request->title;
            $listing_translate->description = $request->description;
            $listing_translate->save();
        }


        $notify_message= trans('translate.Created Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.listings.edit', ['listing' => $listing->id, 'lang_code' => admin_lang()] )->with($notify_message);
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request, $id)
    {

        $listing = Listing::findOrFail($id);

        $listing_translate = ListingTranslation::where(['listing_id' => $id, 'lang_code' => $request->lang_code])->first();

        $categories = Category::with('translate')->where('status', 'enable')->get();

        $subcategories = SubCategory::where('category_id', $listing->category_id)->with('translate')->get();

        $agents = User::where(['status' => 'enable' , 'is_banned' => 'no', 'is_seller' => 1])->where('email_verified_at', '!=', null)->orderBy('id','desc')->get();

        $listing_package = ListingPackage::where('listing_id', $id)->first();

        return view('listing::edit', compact('categories', 'agents', 'listing', 'listing_translate', 'listing_package','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ListingRequest $request, $id)
    {

        $listing = Listing::findOrFail($id);

        if($request->lang_code == admin_lang()){

            if($request->thumb_image){
                $old_image = $listing->thumb_image;
                $image_name = 'listing'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
                $image_name ='uploads/custom-images/'.$image_name;
                Image::make($request->thumb_image)
                    ->encode('webp', 80)
                    ->save(public_path().'/'.$image_name);
                $listing->thumb_image = $image_name;
                $listing->save();

                if($old_image){
                    if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
                }
            }

            $listing->seller_id = $request->seller_id;
            $listing->category_id = $request->category_id;
            $listing->sub_category_id = $request->sub_category_id;
            $listing->slug = $request->slug;
            $listing->tags = $request->tags;
            $listing->seo_title = $request->seo_title ? $request->seo_title : $request->title;
            $listing->seo_description = $request->seo_description ? $request->seo_description : $request->title;
            $listing->save();

            $package = ListingPackage::where('listing_id', $id)->first();

            $package->basic_description = $request->basic_description;
            $package->basic_price = $request->basic_price;
            $package->basic_delivery_date = $request->basic_delivery_date;
            $package->basic_revision = $request->basic_revision;
            $package->basic_fn_website = $request->basic_fn_website;
            $package->basic_page = $request->basic_page;
            $package->basic_responsive = $request->basic_responsive;
            $package->basic_source_code = $request->basic_source_code;
            $package->basic_content_upload = $request->basic_content_upload;
            $package->basic_speed_optimized = $request->basic_speed_optimized;

            $package->standard_description = $request->standard_description;
            $package->standard_price = $request->standard_price;
            $package->standard_delivery_date = $request->standard_delivery_date;
            $package->standard_revision = $request->standard_revision;
            $package->standard_fn_website = $request->standard_fn_website;
            $package->standard_page = $request->standard_page;
            $package->standard_responsive = $request->standard_responsive;
            $package->standard_source_code = $request->standard_source_code;
            $package->standard_content_upload = $request->standard_content_upload;
            $package->standard_speed_optimized = $request->standard_speed_optimized;

            $package->premium_description = $request->premium_description;
            $package->premium_price = $request->premium_price;
            $package->premium_delivery_date = $request->premium_delivery_date;
            $package->premium_revision = $request->premium_revision;
            $package->premium_fn_website = $request->premium_fn_website;
            $package->premium_page = $request->premium_page;
            $package->premium_responsive = $request->premium_responsive;
            $package->premium_source_code = $request->premium_source_code;
            $package->premium_content_upload = $request->premium_content_upload;
            $package->premium_speed_optimized = $request->premium_speed_optimized;
            $package->save();


        }

        $listing_translate = ListingTranslation::findOrFail($request->translate_id);
        $listing_translate->title = $request->title;
        $listing_translate->description = $request->description;
        $listing_translate->save();

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

        $order_qty = Order::where('listing_id', $id)->count();

        if($order_qty > 0){
            $notify_message = trans('translate.Multiple order created under it, so you can not delete it');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $listing = Listing::findOrFail($id);
        $old_image = $listing->thumb_image;

        if($old_image){
            if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        }

        ListingTranslation::where('listing_id',$id)->delete();
        Review::where('listing_id',$id)->delete();
        ListingPackage::where('listing_id',$id)->delete();

        $galleries = ListingGallery::where('listing_id', $id)->get();
        foreach($galleries as $gallery){
            $old_image = $gallery->image;

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }

            $gallery->delete();
        }

        $listing->delete();

        $notify_message=  trans('translate.Delete Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.listings.index')->with($notify_message);
    }

    public function listing_gallery($id){
        $listing = Listing::findOrFail($id);

        $galleries = ListingGallery::where('listing_id', $id)->get();

        return view('listing::gallery', compact('listing', 'galleries'));
    }

    public function upload_listing_gallery(Request $request, $id){

        foreach ($request->file as $index => $image) {
            $gallery_image = new ListingGallery();

            if($image){
                $image_name = 'listing-gallery'.date('-Y-m-d-h-i-s-').rand(999,9999).$index.'.webp';
                $image_name ='uploads/custom-images/'.$image_name;
                Image::make($image)
                    ->encode('webp', 80)
                    ->save(public_path().'/'.$image_name);
                $gallery_image->image = $image_name;
            }

            $gallery_image->listing_id = $id;
            $gallery_image->save();
        }

        if ($gallery_image) {
            return response()->json([
                'message' => trans('translate.Images uploaded successfully'),
                'url' => route('admin.listings-gallery', $id),
            ]);
        } else {
             return response()->json([
                'message' => trans('translate.Images uploaded Failed'),
                'url' => route('admin.listings-gallery', $id),
            ]);
        }

    }

    public function delete_listing_gallery($id){
        $gallery = ListingGallery::findOrFail($id);
        $old_image = $gallery->image;

        if($old_image){
            if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        }

        $gallery->delete();

        $notify_message=  trans('translate.Delete Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }

    public function setup_language($lang_code){
        $listing_translates = ListingTranslation::where('lang_code', admin_lang())->get();
        foreach($listing_translates as $listing_translate){
            $translate = new ListingTranslation();
            $translate->listing_id = $listing_translate->listing_id;
            $translate->lang_code = $lang_code;
            $translate->title = $listing_translate->title;
            $translate->description = $listing_translate->description;
            $translate->save();
        }
    }

    public function listings_approval($id){

        $listing = Listing::findOrFail($id);
        $listing->approved_by_admin = 'approved';
        $listing->status = 'enable';
        $listing->save();

        $notify_message=  trans('translate.Apporval Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }

    public function listings_featured($id){

        $listing = Listing::findOrFail($id);
        $listing->is_featured = 'enable';
        $listing->save();

        $notify_message=  trans('translate.Featured Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }

    public function listings_featured_removed($id){

        $listing = Listing::findOrFail($id);
        $listing->is_featured = 'disable';
        $listing->save();

        $notify_message=  trans('translate.Featured removed Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }



    public function review_list(){

        $reviews = Review::with('buyer', 'seller', 'listing')->latest()->get();

        return view('listing::reviews', ['reviews' => $reviews]);
    }

    public function review_detail($id){

        $review = Review::with('buyer', 'seller', 'listing')->findOrFail($id);

        return view('listing::review_show', ['review' => $review]);
    }

    public function review_delete($id){

        $review = Review::findOrFail($id);
        $review->delete();


        $notify_message=  trans('translate.Deleted Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.review-list')->with($notify_message);

    }

    public function review_approval($id){

        $review = Review::findOrFail($id);
        $review->status = 'enable';
        $review->save();

        $notify_message=  trans('translate.Review approval successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }

    public function getSubcategories($categoryId)
    {
        $subcategories = SubCategory::where('category_id', $categoryId)
                                    ->with('translate')
                                    ->get();

        return response()->json($subcategories);
    }




}
