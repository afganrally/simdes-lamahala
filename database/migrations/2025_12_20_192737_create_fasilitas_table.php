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
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jenis', ['gedung', 'ruangan', 'kendaraan', 'elektronik', 'olahraga', 'lainnya'])->default('lainnya');
            $table->text('detail')->nullable();
            $table->integer('jumlah')->default(1);
            $table->string('lokasi');
            $table->enum('kondisi', ['baik', 'rusak_ringan', 'rusak_berat', 'maintenance'])->default('baik');
            $table->text('keterangan')->nullable();
            $table->string('gambar')->nullable();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas');
    }
};
