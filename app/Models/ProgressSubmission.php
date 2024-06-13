<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressSubmission extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'uploader_id',
        'region_id',
        'progress_percentage',
        'overall_total_score',
        'overall_total_filled',
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
