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
        Schema::create('register_user', function (Blueprint $table) {
            $table->id();
            $table->uuid('role_id');
            $table->string('nik',16)->unique('register_user_nik_IDX')->nullable();
            $table->string('kecamatan', 13)->nullable();
            $table->string('nama',150)->nullable();
            $table->string('nama_mwc',150)->nullable();
            $table->string('email', 150);
            $table->string('no_telp', 16)->nullable();
            $table->string('password', 225);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register_user');
    }
};
