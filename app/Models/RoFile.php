<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoFile extends Model
{
    use HasFactory;

    protected $fillable = ['file_name', 'file_type', 'file_path', 'uploader_id'];

    public function uploader()
    {
        return $this->belongsTo(ExecutiveOfficeAccount::class, 'uploader_id');
    }
}
