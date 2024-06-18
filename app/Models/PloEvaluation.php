<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PloEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'uploader_id',
        'region_id',
        'b1g',
        'b1g_remarks',
        'b2d411',
        'b2d411_remarks',
        'b2d412',
        'b2d412_remarks',
        'b2d42',
        'b2d42_remarks',
        'b2d421',
        'b2d421_remarks',
        'b2d422',
        'b2d422_remarks',
        'b2d43',
        'b2d43_remarks',
        'b2d431',
        'b2d431_remarks',
        'b2d432',
        'b2d432_remarks',
        'b2d5',
        'b2d5_remarks',
        'b2d6',
        'b2d6_remarks',
        'd1',
        'd1_remarks',
        'progress_percentage',
        'overall_total_score',
        'overall_total_filled',
        'total_fields',
        'final_remarks',
    ];

    // Relationships (optional, define as needed)

    public function uploader()
    {
        return $this->belongsTo(ExecutiveOfficeAccount::class, 'uploader_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
}
