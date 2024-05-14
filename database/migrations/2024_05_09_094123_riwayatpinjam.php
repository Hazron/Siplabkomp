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
        Schema::create('riwayatpinjam', function (Blueprint $table){
            $table->id('id_riwayat');
            $table->string('status');
            $table->timestamp('waktu_booking');
            $table->string('kode_pinjam');
            $table->string('user_id');
            $table->string('jadwal_id');
            $table->string('active')->default('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayatpinjam');
    }
};
