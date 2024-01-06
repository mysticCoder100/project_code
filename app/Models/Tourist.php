<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tourist extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = "tourist_id";
    protected $fillable = ["name", "email", "password"];
    protected $hidden = ["password", "tourist_id"];
}
