<?php

namespace Modules\Category\Entities;

use Modules\Listing\Entities\Listing;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\SubCategory;
use Modules\Category\Entities\CategoryTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;


    protected $appends = ['name', 'total_service'];

    protected $hidden = ['front_translate', 'services'];


    public function translate(){
        return $this->belongsTo(CategoryTranslation::class, 'id', 'category_id')->where('lang_code', admin_lang());
    }


    public function front_translate(){
        return $this->belongsTo(CategoryTranslation::class, 'id', 'category_id')->where('lang_code', front_lang());
    }

    public function getNameAttribute()
    {
        return $this->front_translate->name;
    }

    public function services(){
        return $this->hasMany(Listing::class)->where(['status' => 'enable', 'approved_by_admin' => 'approved']);
    }

    public function getTotalServiceAttribute()
    {
        return $this->services->count();
    }

    public function subcategories()
{
    return $this->hasMany(SubCategory::class);
}

}
