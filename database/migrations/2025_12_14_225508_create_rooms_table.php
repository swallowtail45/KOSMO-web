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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            $table->string('name');          // Contoh: Kamar 1
            $table->string('property_type'); // Contoh: Kost Putra
            $table->string('tenant_name')->nullable(); // Contoh: Asep (Bisa kosong jika belum ada penyewa)
            $table->string('tenant_phone')->nullable(); // Contoh: 0812345
            $table->date('start_date')->nullable();     // Contoh: 01/01/2025
            $table->string('status')->default('Tersedia'); // Sudah disewa / Tersedia
            $table->bigInteger('price');     // Contoh: 500000
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
