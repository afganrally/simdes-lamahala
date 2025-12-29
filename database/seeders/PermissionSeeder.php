<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Menu Utama
            [
                'name' => 'view_dashboard',
                'display_name' => 'Dashboard',
                'description' => 'Akses ke halaman dashboard',
                'category' => 'Menu Utama',
                'route_name' => 'dashboard',
                'is_active' => true,
            ],
            [
                'name' => 'view_profile',
                'display_name' => 'Profil',
                'description' => 'Akses ke halaman profil',
                'category' => 'Menu Utama',
                'route_name' => 'profile',
                'is_active' => true,
            ],
            [
                'name' => 'view_settings',
                'display_name' => 'Pengaturan',
                'description' => 'Akses ke halaman pengaturan',
                'category' => 'Menu Utama',
                'route_name' => 'settings',
                'is_active' => true,
            ],
            [
                'name' => 'view_activity',
                'display_name' => 'Aktivitas',
                'description' => 'Akses ke halaman aktivitas',
                'category' => 'Menu Utama',
                'route_name' => 'activity',
                'is_active' => true,
            ],

            // Manajemen Pengguna
            [
                'name' => 'view_users',
                'display_name' => 'Manajemen Pengguna',
                'description' => 'Akses ke halaman manajemen pengguna',
                'category' => 'Manajemen Pengguna',
                'route_name' => 'users.index',
                'is_active' => true,
            ],
            [
                'name' => 'create_users',
                'display_name' => 'Tambah Pengguna',
                'description' => 'Dapat menambah pengguna baru',
                'category' => 'Manajemen Pengguna',
                'route_name' => null,
                'is_active' => true,
            ],
            [
                'name' => 'edit_users',
                'display_name' => 'Edit Pengguna',
                'description' => 'Dapat mengedit data pengguna',
                'category' => 'Manajemen Pengguna',
                'route_name' => null,
                'is_active' => true,
            ],
            [
                'name' => 'delete_users',
                'display_name' => 'Hapus Pengguna',
                'description' => 'Dapat menghapus pengguna',
                'category' => 'Manajemen Pengguna',
                'route_name' => null,
                'is_active' => true,
            ],

            // Manajemen Penduduk
            [
                'name' => 'view_penduduks',
                'display_name' => 'Manajemen Penduduk',
                'description' => 'Akses ke halaman manajemen penduduk',
                'category' => 'Manajemen Penduduk',
                'route_name' => 'penduduks.index',
                'is_active' => true,
            ],
            [
                'name' => 'create_penduduks',
                'display_name' => 'Tambah Penduduk',
                'description' => 'Dapat menambah data penduduk',
                'category' => 'Manajemen Penduduk',
                'route_name' => null,
                'is_active' => true,
            ],
            [
                'name' => 'edit_penduduks',
                'display_name' => 'Edit Penduduk',
                'description' => 'Dapat mengedit data penduduk',
                'category' => 'Manajemen Penduduk',
                'route_name' => null,
                'is_active' => true,
            ],
            [
                'name' => 'delete_penduduks',
                'display_name' => 'Hapus Penduduk',
                'description' => 'Dapat menghapus data penduduk',
                'category' => 'Manajemen Penduduk',
                'route_name' => null,
                'is_active' => true,
            ],

            // Manajemen Fasilitas
            [
                'name' => 'view_fasilitas',
                'display_name' => 'Manajemen Fasilitas',
                'description' => 'Akses ke halaman manajemen fasilitas',
                'category' => 'Manajemen Fasilitas',
                'route_name' => 'fasilitas.index',
                'is_active' => true,
            ],
            [
                'name' => 'create_fasilitas',
                'display_name' => 'Tambah Fasilitas',
                'description' => 'Dapat menambah data fasilitas',
                'category' => 'Manajemen Fasilitas',
                'route_name' => null,
                'is_active' => true,
            ],
            [
                'name' => 'edit_fasilitas',
                'display_name' => 'Edit Fasilitas',
                'description' => 'Dapat mengedit data fasilitas',
                'category' => 'Manajemen Fasilitas',
                'route_name' => null,
                'is_active' => true,
            ],
            [
                'name' => 'delete_fasilitas',
                'display_name' => 'Hapus Fasilitas',
                'description' => 'Dapat menghapus data fasilitas',
                'category' => 'Manajemen Fasilitas',
                'route_name' => null,
                'is_active' => true,
            ],

            // Manajemen Bantuan Sosial
            [
                'name' => 'view_bansos',
                'display_name' => 'Manajemen Bantuan Sosial',
                'description' => 'Akses ke halaman manajemen bantuan sosial',
                'category' => 'Manajemen Bansos',
                'route_name' => 'bansos.index',
                'is_active' => true,
            ],
            [
                'name' => 'create_bansos',
                'display_name' => 'Tambah Bantuan Sosial',
                'description' => 'Dapat menambah data bantuan sosial',
                'category' => 'Manajemen Bansos',
                'route_name' => null,
                'is_active' => true,
            ],
            [
                'name' => 'edit_bansos',
                'display_name' => 'Edit Bantuan Sosial',
                'description' => 'Dapat mengedit data bantuan sosial',
                'category' => 'Manajemen Bansos',
                'route_name' => null,
                'is_active' => true,
            ],
            [
                'name' => 'delete_bansos',
                'display_name' => 'Hapus Bantuan Sosial',
                'description' => 'Dapat menghapus data bantuan sosial',
                'category' => 'Manajemen Bansos',
                'route_name' => null,
                'is_active' => true,
            ],

            // Manajemen Artikel
            [
                'name' => 'view_artikels',
                'display_name' => 'Manajemen Artikel',
                'description' => 'Akses ke halaman manajemen artikel',
                'category' => 'Manajemen Artikel',
                'route_name' => 'artikels.index',
                'is_active' => true,
            ],
            [
                'name' => 'create_artikels',
                'display_name' => 'Tambah Artikel',
                'description' => 'Dapat menambah artikel baru',
                'category' => 'Manajemen Artikel',
                'route_name' => null,
                'is_active' => true,
            ],
            [
                'name' => 'edit_artikels',
                'display_name' => 'Edit Artikel',
                'description' => 'Dapat mengedit artikel',
                'category' => 'Manajemen Artikel',
                'route_name' => null,
                'is_active' => true,
            ],
            [
                'name' => 'delete_artikels',
                'display_name' => 'Hapus Artikel',
                'description' => 'Dapat menghapus artikel',
                'category' => 'Manajemen Artikel',
                'route_name' => null,
                'is_active' => true,
            ],

            // Manajemen Hak Akses
            [
                'name' => 'view_access',
                'display_name' => 'Manajemen Hak Akses',
                'description' => 'Akses ke halaman manajemen hak akses',
                'category' => 'Manajemen Hak Akses',
                'route_name' => 'access.index',
                'is_active' => true,
            ],
            [
                'name' => 'assign_permissions',
                'display_name' => 'Assign Hak Akses',
                'description' => 'Dapat mengatur hak akses pengguna',
                'category' => 'Manajemen Hak Akses',
                'route_name' => null,
                'is_active' => true,
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['name' => $permission['name']],
                $permission
            );
        }
    }
}
