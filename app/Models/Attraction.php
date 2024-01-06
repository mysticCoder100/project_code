<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    use HasFactory;

    protected $primaryKey = "attraction_id";
    protected $fillable = ["attraction_name", "attraction_image", "attraction_description"];
}
