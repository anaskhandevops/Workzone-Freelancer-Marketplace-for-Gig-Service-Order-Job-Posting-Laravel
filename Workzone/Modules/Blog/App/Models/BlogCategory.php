<?php

namespace Modules\Blog\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Blog\Database\factories\BlogCategoryFactory;

class BlogCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $hidden = ['front_translate'];

    protected $fillable = [];

    protected $appends = ['name'];

    protected static function newFactory(): BlogCategoryFactory
    {

    }

    public function translate(){
        return $this->belongsTo(BlogCategoryTranslation::class, 'id', 'blog_category_id')->where('lang_code', admin_lang());
    }

    public function front_translate(){
        return $this->belongsTo(BlogCategoryTranslation::class, 'id', 'blog_category_id')->where('lang_code', front_lang());
    }


    public function getNameAttribute(){
        return $this->front_translate?->name;
    }


}
