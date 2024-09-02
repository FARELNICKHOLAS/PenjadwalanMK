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
            $table->unsignedBigInteger('id_pengajar');
            $table->unsignedBigInteger('ruang_kelas');
            $table->timestamps();

            $table->foreign('ruang_kelas')->references('id')->on('ruangan')->OnUpdate('CASCADE')->OnDelete('CASCADE');
            $table->foreign('id_pengajar')->references('id')->on('pengajar')->OnUpdate('CASCADE')->OnDelete('CASCADE');
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
