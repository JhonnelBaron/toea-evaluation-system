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
}
