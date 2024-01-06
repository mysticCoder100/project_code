<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accomodation extends Model
{
    use HasFactory;
    protected $primaryKey = "accomodation_id";
    protected $fillable = [
        "accomodation_name",
        "accomodation_price",
        "accomodation_image",
        "accomodation_description"
    ];
}
