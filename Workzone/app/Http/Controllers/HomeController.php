<?php

namespace App\Http\Controllers;

use Session, File;
use App\Models\User;
use App\Models\Review;
use App\Rules\Captcha;
use Illuminate\Http\Request;
use Modules\City\Entities\City;
use Modules\FAQ\App\Models\Faq;
use Modules\Blog\App\Models\Blog;
use Modules\Page\App\Models\AboutUs;
use Modules\JobPost\Entities\JobPost;
use Modules\Listing\Entities\Listing;
use Modules\Page\App\Models\Homepage;
use Modules\Page\App\Models\ContactUs;
use Modules\Category\Entities\Category;
use Modules\Category\Entities\SubCategory;
use Modules\Page\App\Models\CustomPage;
use Modules\Blog\App\Models\BlogComment;
use Modules\JobPost\Entities\JobRequest;
use Modules\Currency\App\Models\Currency;
use Modules\Language\App\Models\Language;
use Modules\Page\App\Models\PrivacyPolicy;
use Modules\Listing\Entities\ListingGallery;
use Modules\Page\App\Models\TermAndCondition;
use Modules\SeoSetting\App\Models\SeoSetting;
use Modules\Listing\App\Models\ListingPackage;
use Modules\Testimonial\App\Models\Testimonial;
use Modules\GlobalSetting\App\Models\GlobalSetting;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $theme_setting = GlobalSetting::where('key', 'selected_theme')->first();

        if($theme_setting->value == 'all_theme'){
            if($request->has('theme')){
                $theme = $request->theme;
                if($theme == 'one'){
                    Session::put('selected_theme', 'theme_one');
                }elseif($theme == 'two'){
                    Session::put('selected_theme', 'theme_two');
                }else{
                    if(!Session::has('selected_theme')){
                        Session::put('selected_theme', 'theme_one');
                    }
                }
            }else{
                Session::put('selected_theme', 'theme_one');
            }
        }else{
            if($theme_setting->value == 'theme_one'){
                Session::put('selected_theme', 'theme_one');
            }elseif($theme_setting->value == 'theme_two'){
                Session::put('selected_theme', 'theme_two');
            }
        }

        $homepage = Homepage::first();

        $featured_services = Listing::with('seller')->where(['status' => 'enable', 'approved_by_admin' => 'approved', 'is_featured' => 'enable'])->latest()->take(10)->get();


        $job_posts = JobPost::where(['status' => 'enable', 'approved_by_admin' => 'approved'])->latest()->take(10)->get();

        $top_sellers = User::where(['status' => 'enable' , 'is_banned' => 'no', 'is_seller' => 1, 'is_top_seller' => 'enable'])->where('email_verified_at', '!=', null)->select('id', 'username', 'name', 'image', 'status', 'is_banned', 'is_seller', 'is_top_seller', 'designation', 'hourly_payment','kyc_status','online_status','online')->orderBy('id','desc')->take(5)->get();

        $testimonials = Testimonial::where('status', 'active')->latest()->get();

        $latest_testimonials = Testimonial::where('status', 'active')->get();

        $latest_services = Listing::with('seller')->where(['status' => 'enable', 'approved_by_admin' => 'approved'])->latest()->take(5)->get();

        $seo_setting = SeoSetting::where('id', 1)->first();

        $categories = Category::where('status', 'enable')->latest()->take(4)->get();

        $filter_array = array();
        foreach($categories as $category){
            $filter_array[] = $category->id;
        }

        $home2_filter_service = Listing::with('seller')->where(['status' => 'enable', 'approved_by_admin' => 'approved'])->whereIn('category_id', $filter_array)->latest()->take(8)->get();

        $categories = Category::where('status', 'enable')->latest()->get();

        $selected_theme = Session::get('selected_theme');

        if ($selected_theme == 'theme_one'){
            return view('index', [
                'seo_setting' => $seo_setting,
                'homepage' => $homepage,
                'categories' => $categories,
                'featured_services' => $featured_services,
                'job_posts' => $job_posts,
                'top_sellers' => $top_sellers,
                'testimonials' => $testimonials,
                'latest_testimonials' => $latest_testimonials,
                'latest_services' => $latest_services,
                'home2_filter_service' => $home2_filter_service,
            ]);
        }elseif($selected_theme == 'theme_two'){
            return view('index2', [
                'seo_setting' => $seo_setting,
                'homepage' => $homepage,
                'categories' => $categories,
                'featured_services' => $featured_services,
                'job_posts' => $job_posts,
                'top_sellers' => $top_sellers,
                'testimonials' => $testimonials,
                'latest_testimonials' => $latest_testimonials,
                'latest_services' => $latest_services,
                'home2_filter_service' => $home2_filter_service,
            ]);
        }else{
            return view('index', [
                'seo_setting' => $seo_setting,
                'homepage' => $homepage,
                'categories' => $categories,
                'featured_services' => $featured_services,
                'job_posts' => $job_posts,
                'top_sellers' => $top_sellers,
                'testimonials' => $testimonials,
                'latest_testimonials' => $latest_testimonials,
                'latest_services' => $latest_services,
                'home2_filter_service' => $home2_filter_service,
            ]);
        }

    }

    public function about_us()
    {
        $about_us = AboutUs::first();

        $homepage = Homepage::first();

        $testimonials = Testimonial::where('status', 'active')->latest()->get();

        $latest_testimonials = Testimonial::where('status', 'active')->get();

        $faqs = Faq::latest()->get();

        $seo_setting = SeoSetting::where('id', 3)->first();

        return view('about_us', [
            'seo_setting' => $seo_setting,
            'about_us' => $about_us,
            'homepage' => $homepage,
            'testimonials' => $testimonials,
            'latest_testimonials' => $latest_testimonials,
            'faqs' => $faqs,
        ]);
    }

    public function blogs(Request $request)
    {
        $blogs = Blog::with('author')->where('status', 1);

        if($request->category){
            $blogs = $blogs->where('blog_category_id', $request->category);
        }

        $blogs = $blogs->paginate(12);

        $seo_setting = SeoSetting::where('id', 2)->first();

        return view('blogs', [
            'blogs' => $blogs,
            'seo_setting' => $seo_setting,
        ]);
    }

    public function blog($slug)
    {
        $blog = Blog::with('author')->where('status', 1)->where('slug', $slug)->firstOrFail();

        $blog_comments = BlogComment::where('blog_id', $blog->id)->where('status', 1)->latest()->get();


        return view('blog_detail', [
            'blog' => $blog,
            'blog_comments' => $blog_comments,
        ]);
    }

    public function store_blog_comment(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required',
            'g-recaptcha-response'=>new Captcha()
        ], [
            'name.required' => trans('translate.Name is required'),
            'email.required' => trans('translate.Email is required'),
            'comment.required' => trans('translate.Comment is required'),
        ]);

        $blog_comment = new Blogcomment();
        $blog_comment->blog_id = $id;
        $blog_comment->name = $request->name;
        $blog_comment->email = $request->email;
        $blog_comment->comment = $request->comment;
        $blog_comment->status = 0;
        $blog_comment->save();

        $notify_message= trans('translate.Comment submited successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }

    public function contact_us()
    {
        $contact_us = ContactUs::first();

        $seo_setting = SeoSetting::where('id', 4)->first();

        return view('contact_us', [
        'contact_us' => $contact_us,
        'seo_setting' => $seo_setting,
        ]);
    }

    public function faq()
    {
        $faqs = Faq::latest()->get();

        $seo_setting = SeoSetting::where('id', 5)->first();

        return view('faq', [
            'faqs' => $faqs,
            'seo_setting' => $seo_setting,
        ]);
    }

    public function freelancers(Request $request)
    {
        $sellers = User::where(['status' => 'enable' , 'is_banned' => 'no', 'is_seller' => 1])->where('email_verified_at', '!=', null)->select('id', 'username', 'name', 'image', 'status', 'is_banned', 'is_seller', 'is_top_seller', 'designation', 'hourly_payment','kyc_status','online_status','online');

        if($request->is_toprated){
            if($request->is_toprated == 'toprated'){
                $sellers = $sellers->where('is_top_seller', 'enable');
            }
        }

        if($request->category){
            $category = Category::where('slug', $request->category)->first();
            if($category){
                $sellers = $sellers->whereHas('listings', function ($query) use ($request, $category) {
                    $query->where('category_id', $category->id);
                });

            }
        }

        if($request->sort_by){
            if($request->sort_by == 'a_to_z'){
                $sellers = $sellers->orderBy('name', 'asc');
            }elseif($request->sort_by == 'z_to_a'){
                $sellers = $sellers->orderBy('name', 'desc');
            }
        }else{
            $sellers = $sellers->latest();
        }

        if($request->price_filter){
            if($request->price_filter == 'low_to_high'){
                $sellers = $sellers->orderBy('hourly_payment', 'asc');
            }elseif($request->price_filter == 'high_to_low'){
                $sellers = $sellers->orderBy('hourly_payment', 'desc');
            }
        }


        if($request->search){
            $sellers = $sellers->where('name', 'like', '%' . $request->search . '%');
        }


        $sellers = $sellers->paginate(15);

        $seo_setting = SeoSetting::where('id', 7)->first();

        $categories = Category::where('status', 'enable')->latest()->get();

        return view('freelancers', [
            'sellers' => $sellers,
            'seo_setting' => $seo_setting,
            'categories' => $categories,
        ]);
    }

    public function freelancer($username)
    {
        $seller = User::where(['status' => 'enable' , 'is_banned' => 'no', 'is_seller' => 1, 'username' => $username])->where('email_verified_at', '!=', null)->firstOrFail();

        $total_job_done = JobRequest::where('seller_id', $seller->id)->where('status', 'approved')->count();

        $total_service = Listing::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'seller_id' => $seller->id ])->count();

        $services = Listing::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'seller_id' => $seller->id ])->latest()->paginate(12);

        $review_list = Review::with('buyer')->where('seller_id', $seller->id)->where('status', 'enable')->latest()->get();

        $total_ratings = $review_list->count();
        $avg_ratings = $review_list->avg('rating');


        // Initialize an array to hold the counts of each rating
        $ratingCounts = [];
        foreach ($review_list as $review) {
            $rating = $review->rating;
            if (!isset($ratingCounts[$rating])) {
                $ratingCounts[$rating] = 0;
            }
            $ratingCounts[$rating]++;
        }

        // Calculate the percentage for each rating (1 to 5)
        $ratingData = [];
        for ($i = 1; $i <= 5; $i++) {
            $count = isset($ratingCounts[$i]) ? $ratingCounts[$i] : 0;
            $percentage = $total_ratings ? ($count / $total_ratings) * 100 : 0;
            $ratingData[$i] = [
                'count' => $count,
                'percentage' => $percentage
            ];
        }


        return view('freelancer_detail',[
            'seller' => $seller,
            'total_job_done' => $total_job_done,
            'total_service' => $total_service,
            'services' => $services,
            'review_list' => $review_list,
            'total_ratings' => $total_ratings,
            'avg_ratings' => $avg_ratings,
            'rating_data' => $ratingData,
        ]);
    }

    public function buyer(Request $request, $username)
    {
        $buyer = User::where(['status' => 'enable' , 'is_banned' => 'no', 'is_seller' => 0])->where('email_verified_at', '!=', null)->select('id', 'username', 'name', 'image', 'status', 'is_banned', 'is_seller', 'designation', 'gender', 'created_at', 'address', 'about_me', 'language')->where('username' , $username)->orderBy('id','desc')->firstOrFail();


        $total_job = JobPost::with('translate','category')->where('user_id', $buyer->id)->latest()->count();

        $total_hired = JobRequest::where('user_id', $buyer->id)->where('status', 'approved')->count();

        $job_posts = JobPost::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'user_id' =>$buyer->id])->latest()->get();

        return view('buyer_detail', [
            'buyer' => $buyer,
            'total_hired' => $total_hired,
            'total_job' => $total_job,
            'job_posts' => $job_posts,
        ]);
    }



    public function job_posts(Request $request)
    {
        $job_posts = JobPost::where(['status' => 'enable', 'approved_by_admin' => 'approved']);

        if($request->city_id){
            $job_posts = $job_posts->where('city_id', $request->city_id);
        }

        if($request->category_id){
            $job_posts = $job_posts->where('category_id', $request->category_id);
        }

        if($request->keyword){
            $job_posts = $job_posts->whereHas('front_translate', function ($query) use ($request) {
                            $query->where('title', 'like', '%' . $request->keyword . '%')
                                ->orWhere('description', 'like', '%' . $request->keyword . '%');
                        });
        }

        $job_posts = $job_posts->latest()->paginate(10);
        $job_posts = $job_posts->appends($request->all());

        $categories = Category::where('status', 'enable')->latest()->get();

        $cities = City::latest()->get();

        $seo_setting = SeoSetting::where('id', 8)->first();

        return view('job_posts', [
            'job_posts' => $job_posts,
            'categories' => $categories,
            'cities' => $cities,
            'seo_setting' => $seo_setting,
        ]);
    }

    public function job_post(Request $request, $slug)
    {
        $job_post = JobPost::where(['status' => 'enable', 'approved_by_admin' => 'approved'])->where('slug', $slug)->firstOrFail();

        $total_job_by_author = JobRequest::where(['status' => 'enable', 'status' => 'approved'])->where('user_id', $job_post->user_id)->count();

        return view('job_post_detail', ['job_post' => $job_post, 'total_job_by_author' => $total_job_by_author]);
    }


    public function privacy_policy()
    {
        $privacy_policy = PrivacyPolicy::first();

        $seo_setting = SeoSetting::where('id', 9)->first();

        return view('privacy_policy', ['privacy_policy' => $privacy_policy, 'seo_setting' => $seo_setting]);
    }


    public function terms_conditions()
    {
        $terms_conditions = TermAndCondition::first();

        $seo_setting = SeoSetting::where('id', 6)->first();

        return view('terms_conditions', ['terms_conditions' => $terms_conditions, 'seo_setting' => $seo_setting]);
    }

    public function custom_page($slug)
    {
        $custom_page = CustomPage::where('slug', $slug)->firstOrFail();

        return view('custom_page', ['custom_page' => $custom_page]);
    }


    public function services(Request $request)
    {
        $services = Listing::with('seller')->where(['status' => 'enable', 'approved_by_admin' => 'approved' ]);

        if($request->is_featured){
            if($request->is_featured == 'featured'){
                $services = $services->where('is_featured', 'enable');
            }
        }


        $subCategory = collect();

        if($request->category){
            $category = Category::where('slug', $request->category)->first();
            if($category){
                $services = $services->where('category_id', $category->id);

                $subCategory = SubCategory::where('category_id', $category->id)->get();
            }
        }

        if($request->sub_category){
            $sub_category = SubCategory::where('slug', $request->sub_category)->first();
            if($sub_category){
                $services = $services->where('sub_category_id', $sub_category->id);
            }
        }

        if($request->price_filter){
            if($request->price_filter == 'low_to_high'){
                $services = $services->whereHas('listing_package', function ($query) use ($request) {
                    $query->orderBy('basic_price', 'asc');
                });
            }elseif($request->price_filter == 'high_to_low'){
                $services = $services->whereHas('listing_package', function ($query) use ($request) {
                    $query->orderBy('basic_price', 'desc');
                });
            }

        }

        if($request->search){
            $services = $services->whereHas('front_translate', function ($query) use ($request) {
                            $query->where('title', 'like', '%' . $request->search . '%')
                                ->orWhere('description', 'like', '%' . $request->search . '%');
                        });
        }


        if($request->sort_by){
            if($request->sort_by == 'a_to_z'){
                $services = $services->whereHas('front_translate', function ($query) use ($request) {
                    $query->orderBy('title', 'asc');
                });
            }elseif($request->sort_by == 'z_to_a'){
                $services = $services->whereHas('front_translate', function ($query) use ($request) {
                    $query->orderBy('title', 'desc');
                });
            }
        }else{
            $services = $services->latest();
        }

        $services = $services->paginate(10);

        $seo_setting = SeoSetting::where('id', 10)->first();

        $categories = Category::where('status', 'enable')->latest()->get();

        return view('services', [
            'services' => $services,
            'seo_setting' => $seo_setting,
            'categories' => $categories,
            'sub_categories' => $subCategory,
        ]);
    }

    public function service(Request $request, $slug)
    {
        $service = Listing::with('seller','listing_package')->where(['status' => 'enable', 'approved_by_admin' => 'approved', 'slug' => $slug])->firstOrFail();

        $galleries = ListingGallery::where('listing_id', $service->id)->latest()->get();

        $seller = User::where(['status' => 'enable' , 'is_banned' => 'no', 'is_seller' => 1, 'id' => $service->seller_id])->where('email_verified_at', '!=', null)->select('id', 'username', 'name', 'image', 'status', 'is_banned', 'is_seller', 'is_top_seller', 'designation', 'hourly_payment','kyc_status','online_status','online')->orderBy('id','desc')->firstOrFail();

        $total_job_done = JobRequest::where('seller_id', $seller->id)->where('status', 'approved')->count();

        $total_service = Listing::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'seller_id' => $seller->id ])->count();

        $service_package = ListingPackage::where('listing_id', $service->id)->first();

        $review_list = Review::with('buyer')->where('listing_id', $service->id)->where('status', 'enable')->latest()->get();

        $total_ratings = $review_list->count();
        $avg_ratings = $review_list->avg('rating');


        // Initialize an array to hold the counts of each rating
        $ratingCounts = [];
        foreach ($review_list as $review) {
            $rating = $review->rating;
            if (!isset($ratingCounts[$rating])) {
                $ratingCounts[$rating] = 0;
            }
            $ratingCounts[$rating]++;
        }

        // Calculate the percentage for each rating (1 to 5)
        $ratingData = [];
        for ($i = 1; $i <= 5; $i++) {
            $count = isset($ratingCounts[$i]) ? $ratingCounts[$i] : 0;
            $percentage = $total_ratings ? ($count / $total_ratings) * 100 : 0;
            $ratingData[$i] = [
                'count' => $count,
                'percentage' => $percentage
            ];
        }


        return view('service_detail', [
            'service' => $service,
            'galleries' => $galleries,
            'seller' => $seller,
            'total_job_done' => $total_job_done,
            'total_service' => $total_service,
            'service_package' => $service_package,
            'review_list' => $review_list,
            'total_ratings' => $total_ratings,
            'avg_ratings' => $avg_ratings,
            'rating_data' => $ratingData,
        ]);
    }



    public function language_switcher(Request $request){


        $request_lang = Language::where('lang_code', $request->lang_code)->first();

        Session::put('front_lang', $request->lang_code);
        Session::put('front_lang_name', $request_lang->lang_name);
        Session::put('lang_dir', $request_lang->lang_direction);

        app()->setLocale($request->lang_code);



        $notify_message= trans('translate.Language switched successful');
        if(env('APP_MODE') == 'DEMO'){
            $notify_message=array('message'=>$notify_message,'alert-type'=>'success', 'demo_mode' => 'Demo mode not tranlsate all language');
        }else{
            $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        }


        return redirect()->back()->with($notify_message);

    }


    public function currency_switcher(Request $request){

        $request_currency = Currency::where('currency_code', $request->currency_code)->first();

        Session::put('currency_name', $request_currency->currency_name);
        Session::put('currency_code', $request_currency->currency_code);
        Session::put('currency_icon', $request_currency->currency_icon);
        Session::put('currency_rate', $request_currency->currency_rate);
        Session::put('currency_position', $request_currency->currency_position);

        $notify_message= trans('translate.Currency switched successful');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }




    public function download_submission_file($file){
        $filepath= public_path() . "/uploads/custom-images/".$file;
        return response()->download($filepath);
    }












}
