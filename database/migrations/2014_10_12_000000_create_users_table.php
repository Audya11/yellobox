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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->boolean('is_admin')->default(true);
            $table->rememberToken();
            $table->timestamps();

            $table->text("alamat")->nullable();
            $table->string("keahlian")->nullable();
            $table->string("slug")->unique();
            $table->string("notelp")->nullable();
            $table->string("photo")->nullable();
            $table->foreignId("sekolah_id")->nullable();
            $table->foreignId("perminggu_id")->nullable();
            $table->foreignId("jadwal_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};