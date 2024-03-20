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
        Schema::create('laporan_presensis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("sekolah_id")->nullable();
            $table->string("nama");
            $table->string("tanggal");
            $table->string("slug")->unique();
            $table->string("kelas");
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_presensis');
    }
};
