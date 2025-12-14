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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
        
        // Menghubungkan ke tabel user
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        
        // Data Pembayaran
        $table->string('account_name');   // Contoh: Kos Berkah Jaya 1
        $table->boolean('is_primary')->default(false); // Penanda akun Utama
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
