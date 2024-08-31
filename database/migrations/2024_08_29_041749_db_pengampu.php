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
        Schema::create('pengampu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dosen');
            $table->string('kode_matkul')->nullable();
            $table->string('ruang_kelas');

            $table->foreign('kode_matkul')->references('kode_matkul')->on('matakuliah')->OnUpdate('CASCADE')->OnDelete('CASCADE');
            $table->foreign('id_dosen')->references('id')->on('dosen')->OnUpdate('CASCADE')->OnDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengampu');
    }
};
