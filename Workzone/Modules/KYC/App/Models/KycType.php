<?php

namespace Modules\KYC\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\KYC\Database\factories\KycTypeFactory;

class KycType extends Model
{
    protected $fillable = [
        'name',
        'status',
    ];

    public function kycInformation()
    {
        return $this->hasMany(KycInformation::class, 'kyc_id');
    }
}
