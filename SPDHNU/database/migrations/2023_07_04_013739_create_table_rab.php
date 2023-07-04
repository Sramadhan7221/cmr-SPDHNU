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
        Schema::create('rab', function (Blueprint $table) {
            $table->uuid('id_rab')->primary();
            $table->uuid('proposal')->nullable();
            $table->string('uraian', 150);
            $table->string('satuan', 100);
            $table->decimal('harga');
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
        Schema::dropIfExists('rab');
    }
};
