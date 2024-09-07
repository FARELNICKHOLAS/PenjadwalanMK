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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('id_pengajar');
            $table->unsignedBigInteger('id_hari');
            $table->unsignedBigInteger('id_jam');
            $table->string('ruang_kelas');
            $table->integer('tipe')->nullable();
            $table->double('value')->nullable();
            $table->string('value_proses')->nullable();
            $table->timestamps();

            $table->foreign('id_pengajar')->references('kode_ajaran')->on('pengajar')->OnUpdate('CASCADE')->OnDelete('CASCADE');
            $table->foreign('id_hari')->references('kode')->on('hari')->OnUpdate('CASCADE')->OnDelete('CASCADE');
            $table->foreign('id_jam')->references('id')->on('jam')->OnUpdate('CASCADE')->OnDelete('CASCADE');
            $table->foreign('ruang_kelas')->references('kode_ruangan')->on('ruangan')->OnUpdate('CASCADE')->OnDelete('CASCADE');
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
