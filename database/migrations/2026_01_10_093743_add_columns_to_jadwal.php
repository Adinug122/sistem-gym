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
        Schema::table('jadwal', function (Blueprint $table) {
            $table->string('ruangan')->nullable();

        // 3. Sistem Kuota (Booking)
        // Contoh: 20 orang. Nanti dikurang jumlah booking masuk.
        $table->integer('kuota_maksimal')->default(20);

        // 4. Status Kelas
        // Buat jaga-jaga kalau kelas batal/libur mendadak
        $table->enum('status', ['active', 'cancelled', 'full'])->default('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->dropColumn(['ruangan', 'kuota_maksimal', 'status']);
        });
    }
};
