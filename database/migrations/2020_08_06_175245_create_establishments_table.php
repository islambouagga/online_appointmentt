<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establishments', function (Blueprint $table) {
            $table->id();
            $table->string('Ename');
            $table->string('Etel');
            $table->string('Eadresse');
            $table->string('Etype');
            $table->string('Eemail');
            $table->string('contactname')->nullable();
            $table->string('contactfname')->nullable();
            $table->string('contactntel')->nullable();
            $table->string('contactemail')->nullable();
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
        Schema::dropIfExists('establishments');
    }
}
