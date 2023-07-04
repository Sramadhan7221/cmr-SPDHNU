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
        Schema::create('kepengurusan', function (Blueprint $table) {
            $table->uuid('id_pengurus')->primary();
            $table->string('nama_pengurus', 125);
            $table->string('jabatan', 125)->nullable();
            $table->string('no_ktp', 50);
            $table->string('no_telp', 16)->nullable();
            $table->string('file_ktp', 225)->nullable();
            $table->string('alamat_ktp', 550);
            $table->string('role', 50)->default('OPERATOR');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepengurusan');
    }
};
