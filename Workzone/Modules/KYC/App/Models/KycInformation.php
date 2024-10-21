<?php

namespace Modules\KYC\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\KYC\Database\factories\KycInformationFactory;
use App\Models\User;
use Modules\KYC\App\Models\KycType;

class KycInformation extends Model
{
    protected $fillable = [
        'kyc_id',
        'user_id',
        'file',
        'message',
        'status',
    ];

    public function kycType()
    {
        return $this->belongsTo(KycType::class, 'kyc_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
