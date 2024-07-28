<?php

namespace App\Models\External;

use App\Models\ExecutiveOfficeAccount;
use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BroCExternal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'validator_id',
        'region',
        'province',
        'c1',
        'c1_remarks',
        'c2',
        'c2_remarks',
        'c31',
        'c31_remarks',
        'c32',
        'c32_remarks',
        'c33',
        'c33_remarks',
        'c411',
        'c411_remarks',
        'c412',
        'c412_remarks',
        'c421',
        'c421_remarks',
        'c422',
        'c422_remarks',
        'c431',
        'c431_remarks',
        'c432',
        'c432_remarks',
        'c5',
        'c5_remarks',
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
