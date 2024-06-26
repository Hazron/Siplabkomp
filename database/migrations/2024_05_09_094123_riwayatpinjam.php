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
        Schema::create('riwayatpinjam', function (Blueprint $table) {
            $table->id('id_riwayat');
            $table->string('status');
            $table->timestamp('waktu_booking')->nullable();
            $table->timestamp('jam_pengambilan')->nullable();
            $table->timestamp('jam_pengembalian')->nullable();
            $table->string('kode_pinjam')->nullable();
            $table->string('hari');
            $table->string('user_id');
            $table->date('tanggal_riwayat');
            $table->unsignedBigInteger('jadwal_id');
            $table->unsignedBigInteger('tahunakademik_id');
            $table->string('active')->default('active')->nullable();
            $table->timestamps();
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
