<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'uploader_id',
        'region_id',
        'a6', 'a6_remarks',
        'a8', 'a8_remarks',
        'c31', 'c31_remarks',
        'c32', 'c32_remarks',
        'c411', 'c411_remarks',
        'c412', 'c412_remarks',
        'c421', 'c421_remarks',
        'c422', 'c422_remarks',
        'c431', 'c431_remarks',
        'c432', 'c432_remarks',
        'c5', 'c5_remarks',
        'd1', 'd1_remarks',
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
