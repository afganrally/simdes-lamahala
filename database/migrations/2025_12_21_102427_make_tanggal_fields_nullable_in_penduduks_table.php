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
        Schema::table('penduduks', function (Blueprint $table) {
            $table->date('tanggal_masuk')->nullable()->change();
            $table->date('tanggal_keluar')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penduduks', function (Blueprint $table) {
            $table->date('tanggal_masuk')->nullable(false)->change();
            $table->date('tanggal_keluar')->nullable(false)->change();
        });
    }
};
