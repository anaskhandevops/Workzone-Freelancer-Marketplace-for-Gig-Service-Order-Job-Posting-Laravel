<?php

namespace App\Models;

use App\Models\User;
use Modules\Listing\Entities\Listing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    public function seller(){
        return $this->belongsTo(User::class, 'seller_id')->select('id', 'name', 'username', 'image', 'designation', 'phone');
    }

    public function buyer(){
        return $this->belongsTo(User::class, 'buyer_id')->select('id', 'name', 'username', 'image', 'designation', 'phone');
    }

    public function listing(){
        return $this->belongsTo(Listing::class);
    }
}
