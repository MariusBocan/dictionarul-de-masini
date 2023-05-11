<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('specs', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('brand');
            $table->string('model');
            $table->string('engine');
            $table->string('body_type');
            $table->string('doors');
            $table->string('seats');
            $table->string('lenght');
            $table->string('width');
            $table->string('height');
            $table->string('wheelbase');
            $table->string('weight');
            $table->string('engine_size');
            $table->string('engine_kw');
            $table->string('engine_hp');
            $table->string('torque');
            $table->string('fuel supply');
            $table->string('cylinders');
            $table->string('valves');
            $table->string('gears');
            $table->string('fuel_capacity');
            $table->string('eco_standard');
            $table->string('tires');
            $table->string('max_speed');
            $table->string('acceleration');
            $table->string('fuel_urban');
            $table->string('fuel_extra');
            $table->string('fuel_comb');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specs');
    }
};
