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
        Schema::create('proposal', function (Blueprint $table) {
            $table->uuid('id_proposal')->primary();
            $table->uuid('lembaga')->nullable();
            $table->string('sumber_dana', 500)->nullable();
            $table->string('no_NPHD', 150)->unique();
            $table->string('peruntukan', 150);
            $table->string('file_proposal', 225)->nullable();
            $table->decimal('nilai_pengajuan',12,2)->nullable();
            $table->decimal('total_rab',12,2)->nullable();
            $table->string('tahun', 4);
            $table->timestamps();
            $table->softDeletes();

            $table->index('lembaga', 'lembaga_proposal_IDX');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposal');
    }
};
