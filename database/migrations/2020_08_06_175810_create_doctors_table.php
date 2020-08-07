<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('Dfname');
            $table->string('Dtel');
            $table->string('Price');
            $table->string('Padresse');
            $table->time('MWTStart');
            $table->time('MWTEnd');
            $table->time('EWTStart');
            $table->time('EWTEnd');
            $table->text('Dexpertize');
            $table->text('Ddiploma');
            $table->unsignedBigInteger('establishment_id')->nullable();
            $table->foreign('establishment_id')->references('id')->on('establishments');
            $table->unsignedBigInteger('specialty_id');
            $table->foreign('specialty_id')->references('id')->on('specialties');
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
        Schema::dropIfExists('doctors');
    }
}
