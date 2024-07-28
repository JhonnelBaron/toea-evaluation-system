<?php

namespace App\Models;

use App\Models\External\BroAExternal;
use App\Models\External\BroBExternal;
use App\Models\External\BroCExternal;
use App\Models\External\BroDExternal;
use App\Models\External\BroEExternal;
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

    public function progress()
    {
        return $this->hasMany(ProgressSubmission::class, 'region_id');
    }

    public function asEval()
    {
        return $this->hasMany(AsEvaluation::class, 'region_id');
    }

    public function coEval()
    {
        return $this->hasMany(CoEvaluation::class, 'region_id');
    }

    public function ldEval()
    {
        return $this->hasMany(LdEvaluation::class, 'region_id');
    }

    public function fmsEval()
    {
        return $this->hasMany(FmsEvaluation::class, 'region_id');
    }

    public function nitesdEval()
    {
        return $this->hasMany(NitesdEvaluation::class, 'region_id');
    }

    public function piadEval()
    {
        return $this->hasMany(PiadEvaluation::class, 'region_id');
    }

    public function poEval()
    {
        return $this->hasMany(PoEvaluation::class, 'region_id');
    }

    public function ploEval()
    {
        return $this->hasMany(PloEvaluation::class, 'region_id');
    }

    public function romoEval()
    {
        return $this->hasMany(RomoEvaluation::class, 'region_id');
    }

    public function ictoEval()
    {
        return $this->hasMany(IctoEvaluation::class, 'region_id');
    }

    public function wsEval()
    {
        return $this->hasMany(WsEvaluation::class, 'region_id');
    }

    public function files()
    {
        return $this->hasMany(RoFile::class, 'region_id');
    }

    public function broA()
    {
        return $this->hasMany(BroAExternal::class, 'user_id');
    }

    public function broB()
    {
        return $this->hasMany(BroBExternal::class, 'user_id');
    }

    public function broC()
    {
        return $this->hasMany(BroCExternal::class, 'user_id');
    }

    public function broD()
    {
        return $this->hasMany(BroDExternal::class, 'user_id');
    }

    public function broE()
    {
        return $this->hasMany(BroEExternal::class, 'user_id');
    }


}
