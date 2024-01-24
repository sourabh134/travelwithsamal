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
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('hosp_name')->nullable();
            $table->string('hosp_established')->nullable();
            $table->string('specialityId')->nullable();
            $table->string('hosp_email')->nullable();
            $table->string('hosp_password')->nullable();
            $table->string('country_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('city')->nullable();
            $table->text('hosp_address')->nullable();
            $table->text('hosp_description')->nullable();
            $table->text('hosp_about')->nullable();
            $table->text('hosp_infrastructure')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospitals');
    }
};
