<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, update existing data - change all 'Aktif', 'Berhenti', 'Pindah', 'Meninggal' to 'Disalurkan'
        DB::table('bansos')
            ->whereIn('status_penerima', ['Aktif', 'Berhenti', 'Pindah', 'Meninggal'])
            ->update(['status_penerima' => 'Disalurkan']);

        // Then change the column type and rename the column
        Schema::table('bansos', function (Blueprint $table) {
            $table->string('status_penerima')->default('Pending')->change();
            $table->renameColumn('status_penerima', 'status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bansos', function (Blueprint $table) {
            $table->renameColumn('status', 'status_penerima');
        });

        Schema::table('bansos', function (Blueprint $table) {
            $table->string('status_penerima')->default(null)->change();
        });
    }
};
