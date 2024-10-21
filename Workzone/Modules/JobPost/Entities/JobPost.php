<?php

namespace Modules\JobPost\Entities;

use App\Models\User;
use Modules\City\Entities\City;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;
use Modules\JobPost\Entities\JobRequest;
use Modules\JobPost\Entities\JobPostTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $hidden = ['front_translate'];

    protected $appends = ['total_job_application', 'title', 'description'];

    protected static function newFactory()
    {
        return \Modules\JobPost\Database\factories\JobPostFactory::new();
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }

    

    public function user(){
        return $this->belongsTo(User::class)->select('id', 'name', 'email', 'image', 'username', 'address', 'created_at');
    }

    public function translate(){
        return $this->belongsTo(JobPostTranslation::class, 'id', 'job_post_id')->where('lang_code', admin_lang());
    }

    public function front_translate(){
        return $this->belongsTo(JobPostTranslation::class, 'id', 'job_post_id')->where('lang_code', front_lang());
    }

    public function job_applications(){
        return $this->hasMany(JobRequest::class);
    }

    public function getTotalJobApplicationAttribute(){
        return $this->job_applications()->count();
    }

    public function checkJobStatus($id){
        $approval_check = JobRequest::where('job_post_id', $id)->where('status', 'approved')->count();

        if($approval_check > 0){
            return "approved";
        }else{
            return "pending";
        }
    }

    public function getTitleAttribute()
    {
        return $this->front_translate->title;
    }

    public function getDescriptionAttribute()
    {
        return $this->front_translate->description;
    }


}
