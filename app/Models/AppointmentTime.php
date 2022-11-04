<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentTime extends Model
{
    use HasFactory;

    protected $table 	= "appointment_time";

    protected $fillable = ["date", "time", "clinician_id"]; 

    public function reservedTime()
    {
    	return $this->hasMany(ReservedTime::class);
    }

    public function clinician()
    {
    	return $this->belongsTo(Clinician::class);
    }
}
