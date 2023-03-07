<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->string('personalname',50);
            $table->string('paternallastname',30);
            $table->string('maternallastname',30);
            $table->date('birthdate');
            $table->string('curp',20);
            $table->string('gender',8);
            $table->string('cellphonenumber',20);
            $table->string('homenumber',8);
            $table->timestamps();
            $table->integer('fkuser')->unsigned();
            $table->foreign('fkuser')->references('id')->on('users');

         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
