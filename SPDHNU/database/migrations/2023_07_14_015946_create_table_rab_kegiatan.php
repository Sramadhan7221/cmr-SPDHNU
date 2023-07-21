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
        Schema::create('rab_kegiatan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('proposal')->nullable();
            $table->string('nama_kegiatan',500);
            $table->decimal('sub_total',10)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('proposal')->references('id_proposal')->on('proposal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rab_kegiatan');
    }
};
