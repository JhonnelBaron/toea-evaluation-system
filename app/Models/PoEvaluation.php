<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'uploader_id',
        'region_id',
        'b1a',
        'b1a_remarks',
        'b1b',
        'b1b_remarks',
        'b1i',
        'b1i_remarks',
        'b2a1',
        'b2a1_remarks',
        'b2b1',
        'b2b1_remarks',
        'b2b5',
        'b2b5_remarks',
        'b2d1',
        'b2d1_remarks',
        'b2d2',
        'b2d2_remarks',
        'd1',
        'd1_remarks',
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
