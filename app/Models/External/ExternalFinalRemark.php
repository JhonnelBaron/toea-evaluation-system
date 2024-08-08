<?php

namespace App\Models\External;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalFinalRemark extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'validator_id',
        'remarks',
    ];
}
