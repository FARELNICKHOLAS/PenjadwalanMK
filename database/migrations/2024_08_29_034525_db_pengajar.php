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
        Schema::create('pengajar', function (Blueprint $table) {
            $table->id();
            $table->string('kode_ajaran')->unique();
            $table->unsignedBigInteger('id_dosen');
            $table->unsignedBigInteger('kode_matkul');
            $table->unsignedBigInteger('id_namakelas');
            $table->timestamps();

            $table->foreign('kode_matkul')->references('id')->on('matakuliah')->OnUpdate('CASCADE')->OnDelete('CASCADE');
            $table->foreign('id_dosen')->references('id')->on('dosen')->OnUpdate('CASCADE')->OnDelete('CASCADE');
            $table->foreign('id_namakelas')->references('id')->on('kelas')->OnUpdate('CASCADE')->OnDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajar');
    }
};
