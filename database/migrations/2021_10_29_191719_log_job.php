<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LogJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logjob', function (Blueprint $table) {
            $table->id();
            $table->string('evento');
            $table->string('controlador');
            $table->date('fecha_registro');
            $table->string('estado');
            $table->string('detalle');
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
        Schema::dropIfExists('logjob');
    }
}
