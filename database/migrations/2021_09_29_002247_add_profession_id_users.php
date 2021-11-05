<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfessionIdUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table){
            $table->unsignedInteger('profession_id')->nullable();
            $table->foreign('profession_id')->references('id')->on('profession');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table){
            $table->dropForeign(['profession_id']);
            $table->dropColumn('profession_id');
    
            });

    }
}
