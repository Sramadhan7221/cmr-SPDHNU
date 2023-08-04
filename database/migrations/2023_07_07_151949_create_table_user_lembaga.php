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
        Schema::create('user_lembaga', function (Blueprint $table) {
            $table->uuid('id_user_lembaga')->primary();
            $table->string('user_nik',16);
            $table->uuid('id_lembaga')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_nik')->references('nik')->on('register_user');
            $table->foreign('id_lembaga')->references('id_lembaga')->on('lembaga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_lembaga');
    }
};
