<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwardingsFinalistRecord extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'category',
        'grouping',
        'region',
        'province',
        'nominee',
        'secretariat_score',
        'score_13',
        'score_16',
        'score_17',
        'average',
        'placement',
        'awarding_year',
    ];

    // Define relationships if any
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
