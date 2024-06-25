<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FmsEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'uploader_id',
        'region_id',
        'a5a',
        'a5a_remarks',
        'a5b',
        'a5b_remarks',
        'a7a',
        'a7a_remarks',
        'a7b',
        'a7b_remarks',
        'c1',
        'c1_remarks',
        'c2',
        'c2_remarks',
        'c33',
        'c33_remarks',
        'd1',
        'd1_remarks',
        'progress_percentage',
        'overall_total_score',
        'overall_total_filled',
        'total_fields',
        'final_remarks',
    ];

    // Define relationships
    public function uploader()
    {
        return $this->belongsTo(ExecutiveOfficeAccount::class, 'uploader_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
}
