<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BroDePillar extends Model
{
    use HasFactory;

    protected $fillable = [
        'uploder_id',
        'secretariat_office',
        'region_id',
        'region',
        'd1',
        'd1_remarks',
        'e',
        'e_remarks',
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
