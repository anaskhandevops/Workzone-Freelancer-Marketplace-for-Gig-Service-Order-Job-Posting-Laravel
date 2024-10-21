<?php

namespace Modules\Page\App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Page\App\Models\HomepageTranslation;
use Modules\Page\Database\factories\HomepageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Homepage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): HomepageFactory{}

    protected $hidden = ['front_translate'];

    protected $appends = ['intro_title', 'total_customer', 'total_rating', 'explore_short_title', 'explore_title', 'explore_description', 'join_seller_title', 'join_seller_des', 'working_step_title1', 'working_step_title2', 'working_step_title3', 'working_step_title4', 'working_step_des1', 'working_step_des2', 'working_step_des3', 'working_step_des4', 'feature_title1', 'feature_title2', 'feature_title3', 'feature_title4', 'feature_title5', 'home2_intro_title', 'home2_intro_description'];

    public function translate(){
        return $this->belongsTo(HomepageTranslation::class, 'id', 'homepage_id')->where('lang_code', admin_lang());
    }

    public function front_translate(){
        return $this->belongsTo(HomepageTranslation::class, 'id', 'homepage_id')->where('lang_code', front_lang());
    }

    public function getIntroTitleAttribute(){
        return $this->front_translate?->intro_title;
    }

    public function getTotalCustomerAttribute(){
        return $this->front_translate?->total_customer;
    }

    public function getTotalRatingAttribute(){
        return $this->front_translate?->total_rating;
    }

    public function getExploreShortTitleAttribute(){
        return $this->front_translate?->explore_short_title;
    }

    public function getExploreTitleAttribute(){
        return $this->front_translate?->explore_title;
    }

    public function getExploreDescriptionAttribute(){
        return $this->front_translate?->explore_description;
    }

    public function getJoinSellerTitleAttribute(){
        return $this->front_translate?->join_seller_title;
    }

    public function getJoinSellerDesAttribute(){
        return $this->front_translate?->join_seller_des;
    }

    public function getWorkingStepTitle1Attribute(){
        return $this->front_translate?->working_step_title1;
    }

    public function getWorkingStepTitle2Attribute(){
        return $this->front_translate?->working_step_title2;
    }

    public function getWorkingStepTitle3Attribute(){
        return $this->front_translate?->working_step_title3;
    }

    public function getWorkingStepTitle4Attribute(){
        return $this->front_translate?->working_step_title4;
    }

    public function getWorkingStepDes1Attribute(){
        return $this->front_translate?->working_step_des1;
    }

    public function getWorkingStepDes2Attribute(){
        return $this->front_translate?->working_step_des2;
    }

    public function getWorkingStepDes3Attribute(){
        return $this->front_translate?->working_step_des3;
    }

    public function getWorkingStepDes4Attribute(){
        return $this->front_translate?->working_step_des4;
    }

    public function getFeatureTitle1Attribute(){
        return $this->front_translate?->feature_title1;
    }

    public function getFeatureTitle2Attribute(){
        return $this->front_translate?->feature_title2;
    }

    public function getFeatureTitle3Attribute(){
        return $this->front_translate?->feature_title3;
    }

    public function getFeatureTitle4Attribute(){
        return $this->front_translate?->feature_title4;
    }

    public function getFeatureTitle5Attribute(){
        return $this->front_translate?->feature_title5;
    }

    public function getHome2IntroTitleAttribute(){
        return $this->front_translate?->home2_intro_title;
    }

    public function getHome2IntroDescriptionAttribute(){
        return $this->front_translate?->home2_intro_description;
    }





















}
