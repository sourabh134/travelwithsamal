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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('hosp_id')->nullable();
            $table->string('doc_name')->nullable();
            $table->string('doc_email')->nullable();
            $table->string('doc_password')->nullable();
            $table->string('doc_image')->nullable();
            $table->string('doc_number')->nullable();
            $table->string('address')->nullable();
            $table->string('speciality_id')->nullable();
            $table->string('designation')->nullable();
            $table->string('experience')->nullable();
            $table->string('Nationality')->nullable();
            $table->text('present_working')->nullable();
            $table->text('about')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
