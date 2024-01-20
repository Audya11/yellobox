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
        Schema::create('instrukturs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nama");
            $table->text("alamat");
            $table->string("keahlian");
            $table->string("slug")->unique();
            $table->string("notelp");
            $table->string("email");
            $table->string("photo");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instrukturs');
    }
};
