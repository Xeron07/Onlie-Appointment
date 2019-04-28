<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentTakensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_takens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aId');
            $table->integer('userId');
            $table->string('location');
            $table->string('date');
            $table->string('time');
            $table->integer('serial');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment_takens');
    }
}
