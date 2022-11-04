<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservedTime extends Model
{
    use HasFactory;

    protected $table = "reserved_time";

    protected $fillable = ["appointment_time_id", "patient_name", "patient_email", "patient_phone"];


    public function appointmentTime()
    {
    	return $this->belongsTo(AppointmentTime::class);
    }
}
