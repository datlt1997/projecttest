<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->char('date');
            $table->char('month');
            $table->char('year');
            $table->string('phone');
            $table->string('recruitment');
            $table->string('language');
            $table->string('technical');
            $table->string('specialskill');
            $table->string('achievement');
            $table->string('sixmonth');
            $table->string('oneyear');
            $table->string('threeyear');
            $table->string('project');
            $table->string('income');
            $table->string('email');
            $table->string('filepdf');   
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
        Schema::dropIfExists('candidate');
    }
}
