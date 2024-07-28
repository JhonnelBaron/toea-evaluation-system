<?php

namespace App\Models\External;

use App\Models\ExecutiveOfficeAccount;
use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BroAExternal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'validator_id',
        'region',
        'province',
        'a1',
        'a1_remarks',
        'a2',
        'a2_remarks',
        'a3',
        'a3_remarks',
        'a4',
        'a4_remarks',
        'a5a',
        'a5a_remarks',
        'a5b',
        'a5b_remarks',
        'a6',
        'a6_remarks',
        'a7a',
        'a7a_remarks',
        'a7b',
        'a7b_remarks',
        'a8',
        'a8_remarks',
        'progress_percentage',
        'overall_total_score',
        'overall_total_filled',
        'total_fields',
    ];

    public function user()
    {
        return $this->belongsTo(Region::class);
    }

    // Define the relationship with the Validator model
    public function validator()
    {
        return $this->belongsTo(ExecutiveOfficeAccount::class, 'validator_id');
    }
}
