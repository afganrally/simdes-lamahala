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
        Schema::create('bansos', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('kategori');
            $table->decimal('jumlah', 15, 2);
            $table->date('tanggal_penyaluran');
            $table->string('sumber_dana');
            $table->string('periode');
            $table->string('status_penerima');
            $table->text('keterangan')->nullable();
            $table->string('foto_dokumen')->nullable();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_penduduk')->constrained('penduduks')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bansos');
    }
};
