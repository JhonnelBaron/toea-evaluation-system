<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BroCPillar extends Model
{
    use HasFactory;

    protected $fillable = [
        'uploder_id',
        'secretariat_office',
        'region_id',
        'region',
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
        'total',
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
