<?php

namespace App\Models\External;

use App\Models\ExecutiveOfficeAccount;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RstEExternal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'validator_id',
        'region',
        'province',
        'e1',
        'e1_remarks',
        'progress_percentage',
        'overall_total_score',
        'overall_total_filled',
        'total_fields',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Validator model
    public function validator()
    {
        return $this->belongsTo(ExecutiveOfficeAccount::class, 'validator_id');
    }
}
