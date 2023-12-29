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
        Schema::create('treatmeants', function (Blueprint $table) {
            $table->id();
            $table->integer('specialityId');
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->integer('status')->comment("1=Active 0=inactive");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatmeants');
    }
};
