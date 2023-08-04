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
        Schema::table('rab', function (Blueprint $table) {
            $table->dropForeign(['proposal']);
            $table->renameColumn('proposal', 'rab_kegiatan');
            $table->foreign('rab_kegiatan')->references('id')->on('rab_kegiatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('rab',function (Blueprint $table) {
            $table->dropForeign(['rab_kegiatan']);
            $table->renameColumn('rab_kegiatan', 'proposal');
            $table->foreign('proposal')->references('id_proposal')->on('proposal')->onDelete('cascade');
        });
    }
};
