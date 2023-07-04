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
        Schema::create('lembaga', function (Blueprint $table) {
            $table->uuid('id_lembaga')->primary();
            $table->string('nama_lembaga',225);
            $table->string('alamat_lembaga', 550)->nullable();
            $table->string('no_telp', 25);
            $table->string('email_lembaga', 225);
            $table->string('kabupaten', 13);
            $table->string('kecamatan', 13);
            $table->string('desa', 13);
            $table->string('kop_surat', 225);
            $table->string('domisili', 225);
            $table->string('bank', 50)->nullable();
            $table->string('no_rek', 50)->nullable();
            $table->string('nama_rekening', 225)->nullable();
            $table->string('cabang_bank', 50)->nullable();
            $table->string('file_buku_tabungan', 225)->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index('nama_lembaga', 'nama_lembaga_IDX');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lembaga');
    }
};
