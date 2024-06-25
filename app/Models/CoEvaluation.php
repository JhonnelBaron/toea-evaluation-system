<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'uploader_id',
        'region_id',
        'b1c', 'b1c_remarks',
        'b1d', 'b1d_remarks',
        'b1e', 'b1e_remarks',
        'b1f', 'b1f_remarks',
        'b2a41', 'b2a41_remarks',
        'b2a42', 'b2a42_remarks',
        'b2a43', 'b2a43_remarks',
        'b2c1', 'b2c1_remarks',
        'b2c2', 'b2c2_remarks',
        'b2c3', 'b2c3_remarks',
        'b2c4', 'b2c4_remarks',
        'b2c5', 'b2c5_remarks',
        'b2c6', 'b2c6_remarks',
        'b2e11a', 'b2e11a_remarks',
        'b2e11b', 'b2e11b_remarks',
        'b2e12a', 'b2e12a_remarks',
        'b2e12b', 'b2e12b_remarks',
        'b2e13a', 'b2e13a_remarks',
        'b2e13b', 'b2e13b_remarks',
        'd1', 'd1_remarks',
        'progress_percentage',
        'overall_total_score',
        'overall_total_filled',
        'total_fields',
        'final_remarks',
    ];

    public function uploader()
    {
        return $this->belongsTo(ExecutiveOfficeAccount::class, 'uploader_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
}

