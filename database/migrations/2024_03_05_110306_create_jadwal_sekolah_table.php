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
        Schema::create('jadwal_sekolah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')->constrained();
            $table->foreignId('sekolah_id')->constrained();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('jadwal_sekolah');
    }
};
