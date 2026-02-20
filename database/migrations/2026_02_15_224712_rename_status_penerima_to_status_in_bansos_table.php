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
        // First, update existing data - change all 'Aktif', 'Berhenti', 'Pindah' to 'Disalurkan'
        \DB::statement("UPDATE bansos SET status_penerima = 'Disalurkan' WHERE status_penerima IN ('Aktif', 'Berhenti', 'Pindah', 'Meninggal')");

        // Then change the column type from string to enum
        \DB::statement("ALTER TABLE bansos MODIFY COLUMN status_penerima ENUM('Pending', 'Disalurkan', 'Proses', 'Batal') DEFAULT 'Pending'");

        // Then rename the column
        Schema::table('bansos', function (Blueprint $table) {
            $table->renameColumn('status_penerima', 'status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // First rename back
        Schema::table('bansos', function (Blueprint $table) {
            $table->renameColumn('status', 'status_penerima');
        });

        // Revert to string type
        \DB::statement("ALTER TABLE bansos MODIFY COLUMN status_penerima VARCHAR(255)");
    }
};
