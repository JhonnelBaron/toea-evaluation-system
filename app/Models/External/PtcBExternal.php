<?php

namespace App\Models\External;

use App\Models\ExecutiveOfficeAccount;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PtcBExternal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'validator_id',
        'region',
        'province',
        'b1a',
        'b1a_remarks',
        'b1b',
        'b1b_remarks',
        'b1c1',
        'b1c1_remarks',
        'b1c2',
        'b1c2_remarks',
        'b1c3',
        'b1c3_remarks',
        'b1d1',
        'b1d1_remarks',
        'b2a',
        'b2a_remarks',
        'b2b',
        'b2b_remarks',
        'b2c',
        'b2c_remarks',
        'b2d',
        'b2d_remarks',
        'b2e',
        'b2e_remarks',
        'b2f',
        'b2f_remarks',
        'b2g',
        'b2g_remarks',
        'b2h',
        'b2h_remarks',
        'b2i',
        'b2i_remarks',
        'b2j',
        'b2j_remarks',
        'b3a',
        'b3a_remarks',
        'b3b',
        'b3b_remarks',
        'b3c',
        'b3c_remarks',
        'b3d',
        'b3d_remarks',
        'b3e',
        'b3e_remarks',
        'b3f',
        'b3f_remarks',
        'b4a1',
        'b4a1_remarks',
        'b4a2',
        'b4a2_remarks',
        'b4b',
        'b4b_remarks',
        'b4c',
        'b4c_remarks',
        'b4d',
        'b4d_remarks',
        'b4e',
        'b4e_remarks',
        'b5a1',
        'b5a1_remarks',
        'b5a2',
        'b5a2_remarks',
        'b5b11',
        'b5b11_remarks',
        'b5b12',
        'b5b12_remarks',
        'b5b21',
        'b5b21_remarks',
        'b5b22',
        'b5b22_remarks',
        'b5c1',
        'b5c1_remarks',
        'b5c2',
        'b5c2_remarks',
        'b5d',
        'b5d_remarks',
        'b5e',
        'b5e_remarks',
        'progress_percentage',
        'overall_total_score',
        'overall_total_filled',
        'total_fields',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function validator()
    {
        return $this->belongsTo(ExecutiveOfficeAccount::class, 'validator_id');
    }
}
