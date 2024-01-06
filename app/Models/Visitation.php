<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitation extends Model
{
    use HasFactory;
    protected $primaryKey = "visitation_id";
    protected $fillable = [
        "tourist_id", "name", "email", "visitor_number", "visitation_date", "amount", "want_accomodation", "accomodation_id", "accomodation_count", "reference", "payment_status"
    ];
}
