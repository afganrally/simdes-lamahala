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
        // Tabel permissions untuk menyimpan daftar hak akses/menu
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // Nama permission (contoh: view_dashboard, manage_users)
            $table->string('display_name');  // Nama yang ditampilkan di UI
            $table->string('description')->nullable();
            $table->string('category')->nullable(); // Kategori untuk grouping
            $table->string('route_name')->nullable(); // Nama route yang diakses
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Tabel pivot untuk many-to-many relationship antara user dan permission
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('permission_id')->constrained()->onDelete('cascade');
            $table->boolean('can_access')->default(true); // Bisa dinonaktifkan tanpa menghapus relasi
            $table->timestamps();

            $table->unique(['user_id', 'permission_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_permissions');
        Schema::dropIfExists('permissions');
    }
};
