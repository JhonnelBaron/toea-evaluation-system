<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NitesdEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'uploader_id',
        'region_id',
        'b2a1',
        'b2a1_remarks',
        'b2a2',
        'b2a2_remarks',
        'b2d31',
        'b2d31_remarks',
        'b2d32',
        'b2d32_remarks',
        'b2d441',
        'b2d441_remarks',
        'b2d442',
        'b2d442_remarks',
        'b2e3',
        'b2e3_remarks',
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
