<?php

namespace App\Models\External;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndorsedExternal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category',
        'grouping',
        'region',
        'province',
        'nominee',
        'criteria_a',
        'criteria_b',
        'criteria_c',
        'criteria_d',
        'criteria_e',
        'romo_final_score',
        'remarks',
        'evaluator_first',
        'evaluator_last'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
