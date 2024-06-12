<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_name',
        'region_category',
    ];

    public function pillarA()
    {
        return $this->hasMany(BroAPillar::class, 'region_id');
    }

    public function pillarB()
    {
        return $this->hasMany(BroBPillar::class,'region_id');
    }

    public function pillarC()
    {
        return $this->hasMany(BroCPillar::class,'region_id');
    }
    public function pillarDe()
    {
        return $this->hasMany(BroDePillar::class,'region_id');
    }

}
