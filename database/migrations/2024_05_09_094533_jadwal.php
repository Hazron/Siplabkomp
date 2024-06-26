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
        Schema::create('jadwal', function(Blueprint $table){
            $table->id('id_jadwal');
            $table->string('hari');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('matakuliah');
            $table->string('status')->nullable();
            $table->string('programstudi');
            $table->string('kelas');
            $table->string('dosen');
            $table->string('tahunakademik');
            $table->unsignedBigInteger('ruang_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('active');   
            $table->timestamps();
            //FOREIGN KEY
            $table->foreign('ruang_id')->references('id_ruang')->on('ruang')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
