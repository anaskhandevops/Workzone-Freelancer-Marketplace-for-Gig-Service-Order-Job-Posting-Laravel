<?php

namespace Modules\Listing\Entities;

use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;
use Modules\Category\Entities\SubCategory;
use Modules\Listing\App\Models\ListingPackage;
use Modules\Listing\Entities\ListingTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $appends = ['title', 'description', 'avg_rating', 'total_rating'];

    protected $hidden = ['front_translate'];

    protected static function newFactory()
    {
        return \Modules\Listing\Database\factories\ListingFactory::new();
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function listing_package(){
        return $this->hasOne(ListingPackage::class, 'listing_id', 'id');
    }

    public function seller(){
        return $this->belongsTo(User::class, 'seller_id')->select('id', 'name', 'email', 'image', 'username','kyc_status','online_status','online');
    }

    public function translate(){
        return $this->belongsTo(ListingTranslation::class, 'id', 'listing_id')->where('lang_code', admin_lang());
    }

    public function front_translate(){
        return $this->belongsTo(ListingTranslation::class, 'id', 'listing_id')->where('lang_code', front_lang());
    }

    public function getTitleAttribute()
    {
        return $this->front_translate->title;
    }

    public function getDescriptionAttribute()
    {
        return $this->front_translate->description;
    }

    public function reviews(){
        return $this->hasMany(Review::class, 'listing_id')->where('status', 'enable');
    }

    public function getAvgRatingAttribute()
    {
        return sprintf("%.2f", $this->reviews->avg('rating'));
    }


    public function getTotalRatingAttribute()
    {
        return $this->reviews->count();;
    }


}
