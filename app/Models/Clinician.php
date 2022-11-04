<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ClinicianFactory;

class Clinician extends Model
{
    use HasFactory;


    protected $table = "clinician";

    protected $fillable = ["name", "specilization", "email", "phone", "shift"];

    /**
	 * Create a new factory instance for the model.
	 *
	 * @return \Illuminate\Database\Eloquent\Factories\Factory
	 */
	protected static function newFactory()
	{
	    return ClinicianFactory::new();
	}


    public function appointmentTime()
    {
    	return $this->hasMany(AppointmentTime::class);
    }
}
