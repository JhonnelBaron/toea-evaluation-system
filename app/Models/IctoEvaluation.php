<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IctoEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'uploader_id',
        'region_id',
        'b2a3',
        'b2a3_remarks',
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
