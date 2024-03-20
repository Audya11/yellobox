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
        Schema::create('sekolahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("jadwal_id")->nullable();
            $table->timestamps();
            $table->string("nama");
            $table->string("logo");
            $table->text("alamat");
            $table->string("slug")->unique();
            $table->string("notelp");
            $table->string("pic");
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolahs');
    }
};
