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
        Schema::create('reminders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        
        $table->string('title');       // Contoh: Pengingat 1
        $table->string('description'); // Contoh: Pembayaran Bulanan
        $table->string('status')->default('Aktif'); // Aktif / Tidak Aktif
        $table->string('media')->default('Whatsapp'); // Whatsapp / Email
        
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reminders');
    }
};
