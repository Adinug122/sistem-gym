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
      Schema::table('users', function (Blueprint $table) {
        $table->string('avatar')->nullable()->after('email');
    });

    // Nambah kolom image di tabel program_latihan
    Schema::table('program_latihan', function (Blueprint $table) {
        $table->string('image')->nullable()->after('desciption');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('users', function (Blueprint $table) {
      $table->dropColumn('avatar');
    });

    // Nambah kolom image di tabel program_latihan
    Schema::table('program_latihan', function (Blueprint $table) {
   $table->dropColumn('image');
    });
    }
};
