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
        Schema::create('harijam', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kode_harijam');
            $table->unsignedBigInteger('id_hari')->nullable();
            $table->unsignedBigInteger('id_jam')->nullable();
            $table->timestamps();

            $table->foreign('id_hari')->references('kode')->on('hari')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_jam')->references('id')->on('jam')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harijam');
    }
};
