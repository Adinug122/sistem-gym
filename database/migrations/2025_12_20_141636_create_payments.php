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
        Schema::create('payments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('membership_id')->constrained('membership')->onDelete('cascade');
                $table->string('order_id')->unique(); 
                $table->decimal('amount', 12, 2);
                $table->string('payment_type');
                $table->string('transaction_status'); // bank_transfer, qris, ewallet
                $table->enum('status',['pending',
                'success','expired'])->default("pending"); // pending, success, failed, expired
                $table->string('transaction_id')->nullable(); // dari Midtrans
                $table->timestamp('paid_at')->nullable();
                $table->json('raw_response')->nullable(); // response Midtrans
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
