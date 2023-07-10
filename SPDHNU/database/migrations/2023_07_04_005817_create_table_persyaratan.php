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
        Schema::create('persyaratan', function (Blueprint $table) {
            $table->uuid('id_persyaratan')->primary();
            $table->uuid('id_lembaga');
            $table->string('nama_persyaratan', 125);
            $table->string('nomor_surat', 125);
            $table->string('yang_mengeluarkan', 225);
            $table->string('file', 225);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('lembaga')->references('id_lembaga')->on('lembaga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persyaratan');
    }
};
