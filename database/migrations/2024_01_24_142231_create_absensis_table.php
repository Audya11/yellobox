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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
          
            $table->foreignId("user_id");
            $table->string("tanggal");
            $table->string("slug")->unique();
            $table->string("kelas");
            $table->enum('status',['Hadir', 'Izin', 'Sakit', 'Alpha']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
