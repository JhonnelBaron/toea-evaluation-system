<?php

namespace App\Models;

use App\Models\External\GpAExternal;
use App\Models\External\GpBExternal;
use App\Models\External\GpCExternal;
use App\Models\External\GpDExternal;
use App\Models\External\GpEExternal;
use App\Models\External\PtcAExternal;
use App\Models\External\PtcBExternal;
use App\Models\External\PtcCExternal;
use App\Models\External\PtcDExternal;
use App\Models\External\PtcEExternal;
use App\Models\External\RstAExternal;
use App\Models\External\RstBExternal;
use App\Models\External\RstCExternal;
use App\Models\External\RstDExternal;
use App\Models\External\RstEExternal;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ExecutiveOfficeAccount extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'executive_office', 'name', 'position', 'office', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function files()
    {
        return $this->hasMany(RoFile::class, 'uploader_id');
    }

    public function pillarA()
    {
        return $this->hasMany(BroAPillar::class, 'uploader_id');
    }
    public function pillarB()
    {
        return $this->hasMany(BroBPillar::class, 'uploader_id');
    }
    public function pillarC()
    {
        return $this->hasMany(BroCPillar::class, 'uploader_id');
    }
    public function pillarDe()
    {
        return $this->hasMany(BroDePillar::class, 'uploader_id');
    }

    public function progress()
    {
         return $this->hasMany(ProgressSubmission::class, 'uploader_id');
    }

    public function asEval()
    {
        return $this->hasMany(AsEvaluation::class, 'uploader_id');
    }

    public function coEval()
    {
        return $this->hasMany(CoEvaluation::class, 'uploader_id');
    }

    public function ldEval()
    {
        return $this->hasMany(LdEvaluation::class, 'uploader_id');
    }

    public function fmsEval()
    {
        return $this->hasMany(FmsEvaluation::class, 'uploader_id');
    }

    public function nitesdEval()
    {
        return $this->hasMany(NitesdEvaluation::class, 'uploader_id');
    }
    public function piadEval()
    {
        return $this->hasMany(PiadEvaluation::class, 'uploader_id');
    }

    public function poEval()
    {
        return $this->hasMany(PoEvaluation::class, 'uploader_id');
    }

    public function ploEval()
    {
        return $this->hasMany(PloEvaluation::class, 'uploader_id');
    }

    public function romoEval()
    {
        return $this->hasMany(RomoEvaluation::class, 'uploader_id');
    }
    
    public function ictoEval()
    {
        return $this->hasMany(IctoEvaluation::class, 'uploader_id');
    }

    public function wsEval()
    {
        return $this->hasMany(WsEvaluation::class, 'uploader_id');
    }
    
    public function gpA()
    {
        return $this->hasMany(GpAExternal::class, 'validator_id');
    }

    public function gpB()
    {
        return $this->hasMany(GpBExternal::class, 'validator_id');
    }

    public function gpC()
    {
        return $this->hasMany(GpCExternal::class, 'validator_id');
    }
    public function gpD()
    {
        return $this->hasMany(GpDExternal::class, 'validator_id');
    }
    public function gpE()
    {
        return $this->hasMany(GpEExternal::class, 'validator_id');
    }

    public function ptcA()
    {
        return $this->hasMany(PtcAExternal::class, 'validator_id');
    }

    public function ptcB()
    {
        return $this->hasMany(PtcBExternal::class, 'validator_id');
    }

    public function ptcC()
    {
        return $this->hasMany(PtcCExternal::class, 'validator_id');
    }
    public function ptcD()
    {
        return $this->hasMany(PtcDExternal::class, 'validator_id');
    }
    public function ptcE()
    {
        return $this->hasMany(PtcEExternal::class, 'validator_id');
    }
    public function rstA()
    {
        return $this->hasMany(RstAExternal::class, 'validator_id');
    }

    public function rstB()
    {
        return $this->hasMany(RstBExternal::class, 'validator_id');
    }

    public function rstC()
    {
        return $this->hasMany(RstCExternal::class, 'validator_id');
    }
    public function rstD()
    {
        return $this->hasMany(RstDExternal::class, 'validator_id');
    }
    public function rstE()
    {
        return $this->hasMany(RstEExternal::class, 'validator_id');
    }
}
