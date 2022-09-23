<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrantedPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'permision',
        'grant_date',
        'granted_by'
    ];
}
