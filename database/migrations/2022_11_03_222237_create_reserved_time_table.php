<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservedTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserved_time', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("appointment_time_id")->references("id")->on("appointment_time");
            $table->string("patient_name", 100);
            $table->string("patient_phone", 14);
            $table->string("patient_email", 100);
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
        Schema::dropIfExists('reserved_time');
    }
}
