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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("instruktur_id");
            $table->foreignId("sekolah_id");
            $table->string("slug")->unique();
            $table->time("jammengajar");
            $table->time("matapelajaran");
            $table->date("tanggal");
            $table->string("asisten");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
