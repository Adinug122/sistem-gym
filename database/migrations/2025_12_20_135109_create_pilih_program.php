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
        Schema::create('pilih_program', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('member')->onDelete('cascade');
            $table->foreignId('program_id')->constrained('program_latihan')->onDelete('cascade');
            $table->foreignId('trainer_id')->constrained('trainer')->onDelete('cascade');
            $table->enum('status',['active','nonactive'])->default('active');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilih_program');
    }
};
