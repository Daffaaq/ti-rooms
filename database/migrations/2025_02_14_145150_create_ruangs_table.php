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
        Schema::create('ruangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ruang');
            $table->string('kode_ruang')->unique();
            $table->boolean('is_active')->default(true);
            $table->integer('kapasitas_ruang');
            $table->enum('tipe_ruang', ['laboratorium', 'class', 'auditorium', 'meeting']);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('jurusans_id');
            $table->foreign('jurusans_id')->references('id')->on('jurusans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangs');
    }
};
