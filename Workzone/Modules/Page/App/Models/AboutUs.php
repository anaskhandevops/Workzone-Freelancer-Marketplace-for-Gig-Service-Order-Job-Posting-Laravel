<?php

namespace Modules\Page\App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Page\App\Models\AboutUsTranslation;
use Modules\Page\Database\factories\AboutUsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutUs extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): AboutUsFactory{}

    protected $hidden = ['front_translate'];

    protected $appends = ['short_title', 'title', 'description', 'item1', 'item2', 'item3'];

    public function translate(){
        return $this->belongsTo(AboutUsTranslation::class, 'id', 'about_us_id')->where('lang_code', admin_lang());
    }

    public function front_translate(){
        return $this->belongsTo(AboutUsTranslation::class, 'id', 'about_us_id')->where('lang_code', front_lang());
    }

    public function getShortTitleAttribute(){
        return $this->front_translate?->short_title;
    }

    public function getTitleAttribute(){
        return $this->front_translate?->title;
    }

    public function getDescriptionAttribute(){
        return $this->front_translate?->description;
    }

    public function getItem1Attribute(){
        return $this->front_translate?->item1;
    }

    public function getItem2Attribute(){
        return $this->front_translate?->item2;
    }

    public function getItem3Attribute(){
        return $this->front_translate?->item3;
    }

}
