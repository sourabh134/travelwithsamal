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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('to_user')->nullable();
            $table->string('from_user')->nullable();
            $table->string('heading')->nullable();
            $table->text('message')->nullable();
            $table->string('user_type')->nullable()->comment('1 hospital, 2 staff, 3 doctor');
            $table->string('seen_msg')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
