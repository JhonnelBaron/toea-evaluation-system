<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BroBPillar extends Model
{
    use HasFactory;

    protected $fillable = [
        'uploder_id',
        'secretariat_office',
        'region_id',
        'region',
        'b1a',
        'b1a_remarks',
        'b1b',
        'b1b_remarks',
        'b1c',
        'b1c_remarks',
        'b1d',
        'b1d_remarks',
        'b1e',
        'b1e_remarks',
        'b1f',
        'b1f_remarks',
        'b1g',
        'b1g_remarks',
        'b1h',
        'b1h_remarks',
        'b1i',
        'b1i_remarks',
        'b2a1',
        'b2a1_remarks',
        'b2a2',
        'b2a2_remarks',
        'b2a31',
        'b2a31_remarks',
        'b2a32',
        'b2a32_remarks',
        'b2a33',
        'b2a33_remarks',
        'b2b1',
        'b2b1_remarks',
        'b2b2',
        'b2b2_remarks',
        'b2b3',
        'b2b3_remarks',
        'b2b4',
        'b2b4_remarks',
        'b2b5',
        'b2b5_remarks',
        'b2c1',
        'b2c1_remarks',
        'b2c2',
        'b2c2_remarks',
        'b2c3',
        'b2c3_remarks',
        'b2c4',
        'b2c4_remarks',
        'b2c5',
        'b2c5_remarks',
        'b2c6',
        'b2c6_remarks',
        'b2d1',
        'b2d1_remarks',
        'b2d2',
        'b2d2_remarks',
        'b2d31',
        'b2d31_remarks',
        'b2d32',
        'b2d32_remarks',
        'b2d411',
        'b2d411_remarks',
        'b2d412',
        'b2d412_remarks',
        'b2d421',
        'b2d421_remarks',
        'b2d422',
        'b2d422_remarks',
        'b2d431',
        'b2d431_remarks',
        'b2d432',
        'b2d432_remarks',
        'b2d441',
        'b2d441_remarks',
        'b2d442',
        'b2d442_remarks',
        'b2d5',
        'b2d5_remarks',
        'b2d6',
        'b2d6_remarks',
        'b2e11a',
        'b2e11a_remarks',
        'b2e11b',
        'b2e11b_remarks',
        'b2e12a',
        'b2e12a_remarks',
        'b2e12b',
        'b2e12b_remarks',
        'b2e13a',
        'b2e13a_remarks',
        'b2e13b',
        'b2e13b_remarks',
        'b2e21',
        'b2e21_remarks',
        'b2e22',
        'b2e22_remarks',
        'b2e23',
        'b2e23_remarks',
        'b2e3',
        'b2e3_remarks',
        'b2e4',
        'b2e4_remarks',
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
