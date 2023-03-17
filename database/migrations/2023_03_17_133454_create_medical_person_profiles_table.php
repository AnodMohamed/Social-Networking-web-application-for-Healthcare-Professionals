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
        Schema::create('medical_person_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->text('bio')->nullable();
            $table->string('occupation')->nullable();
            $table->string('specialization')->nullable();
            $table->string('degree')->nullable();
            $table->string('experience')->nullable();
            $table->string('Identification_card')->nullable();
            $table->string('license')->nullable();
            $table->string('certificate')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('medical_person_profiles');
    }
};
