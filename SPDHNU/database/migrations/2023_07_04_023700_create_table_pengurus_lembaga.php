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
        Schema::create('pengurus_lembaga', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('lembaga');
            $table->uuid('pengurus');
            $table->uuid('persyaratan');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('lembaga')->references('id_lembaga')->on('lembaga');
            $table->foreign('pengurus')->references('id_pengurus')->on('kepengurusan');
            $table->foreign('persyaratan')->references('id_persyaratan')->on('persyaratan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengurus_lembaga');
    }
};
