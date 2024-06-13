<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BroAPillar extends Model
{
    use HasFactory;

    protected $fillable = [
        'uploder_id',
        'secretariat_office',
        'region_id',
        'region',
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
        'total_filled',
        'total_score',
    ];

    /**
     * Accessor to get the progress_percentage as a whole number (e.g., 50 instead of 0.50).
     *
     * @param  float  $value
     * @return float
     */
    public function getProgressPercentageAttribute($value)
    {
        return $value * 100;
    }

    /**
     * Mutator to set the progress_percentage as a decimal (e.g., 50% is stored as 0.50).
     *
     * @param  float  $value
     * @return void
     */
    public function setProgressPercentageAttribute($value)
    {
        $this->attributes['progress_percentage'] = $value / 100;
    }

    public function uploader()
    {
        return $this->belongsTo(ExecutiveOfficeAccount::class, 'uploader_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
}
