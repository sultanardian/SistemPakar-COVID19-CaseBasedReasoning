<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagsympsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagsymps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('symptom_id');
            $table->foreign('symptom_id')->references('id')->on('symptoms');
            $table->unsignedBigInteger('diagnosis_id');
            $table->foreign('diagnosis_id')->references('id')->on('diagnoses');
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
        Schema::dropIfExists('diagsymps');
    }
}
