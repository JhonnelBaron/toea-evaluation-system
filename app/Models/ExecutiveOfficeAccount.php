<?php

namespace App\Models;

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
}
