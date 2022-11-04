<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_time', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->time("time");
            $table->bigInteger("clinician_id")->references("id")->on("clinician.id");
            $table->integer("status")->default(1); // 1 means the time is available
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment_time');
    }
}
