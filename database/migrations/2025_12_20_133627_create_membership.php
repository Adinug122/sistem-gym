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
        Schema::create('membership', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('member')->onDelete('cascade');
            $table->foreignid('paket_id')->constrained('paket')->onDelete('cascade');
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->enum('status',['active','nonactive','expired','schedule'])->default('nonactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership');
    }
};
