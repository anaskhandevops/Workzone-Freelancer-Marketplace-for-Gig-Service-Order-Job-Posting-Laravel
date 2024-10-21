<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Modules\Listing\Entities\Listing;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const STATUS_ACTIVE = 'enable';

    const STATUS_INACTIVE = 'disable';

    const BANNED_ACTIVE = 'yes';

    const BANNED_INACTIVE = 'no';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verification_token',
        'username',
        'status',
        'is_banned',
        'is_seller',
        'password',
        'verification_token',
        'provider',
        'provider_id',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'reviews',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['avg_rating', 'total_rating'];

    public function reviews(){
        return $this->hasMany(Review::class, 'seller_id')->where('status', 'enable');
    }
    public function getAvgRatingAttribute()
    {
        return sprintf("%.2f", $this->reviews->avg('rating'));
    }

    public function getTotalRatingAttribute()
    {
        return $this->reviews->count();
    }

    public function listings(){
        return $this->hasMany(Listing::class, 'seller_id');
    }

}
