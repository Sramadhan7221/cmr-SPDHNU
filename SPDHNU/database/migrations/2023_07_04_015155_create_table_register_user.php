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
            $table->string('nik',16)->primary();
            $table->string('kecamatan', 13);
            $table->string('nama',150);
            $table->string('nama_mwc',150);
            $table->string('email', 150);
            $table->string('no_telp', 16);
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
