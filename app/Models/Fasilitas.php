<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fasilitas extends Model
{
    protected $fillable = [
        'nama',
        'jenis',
        'detail',
        'jumlah',
        'lokasi',
        'kondisi',
        'keterangan',
        'gambar',
        'id_user',
    ];

    /**
     * Get the user that owns the fasilitas.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * Get the kondisi label with color
     */
    public function getKondisiLabelAttribute()
    {
        return match($this->kondisi) {
            'baik' => '<span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Baik</span>',
            'rusak_ringan' => '<span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">Rusak Ringan</span>',
            'rusak_berat' => '<span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800">Rusak Berat</span>',
            'maintenance' => '<span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Maintenance</span>',
            default => $this->kondisi,
        };
    }

    /**
     * Get the jenis label with icon
     */
    public function getJenisLabelAttribute()
    {
        return match($this->jenis) {
            'gedung' => '<span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-gray-100 text-gray-800"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v5m0 0h3m-3 0v5"></path></svg>Gedung</span>',
            'ruangan' => '<span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-gray-100 text-gray-800"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13h16"></path></svg>Ruangan</span>',
            'kendaraan' => '<span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-gray-100 text-gray-800"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 12v-5a2 2 0 00-2-2H4a2 2 0 00-2 2v5a2 2 0 002 2h3.586l-1.293-1.293a1 1 0 00-1.414 0l-5.586 5.586a1 1 0 000 1.414L11.414 15H16a2 2 0 002-2zM4 6h16"></path></svg>Kendaraan</span>',
            'elektronik' => '<span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-gray-100 text-gray-800"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>Elektronik</span>',
            'olahraga' => '<span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-gray-100 text-gray-800"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>Olahraga</span>',
            'lainnya' => '<span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-gray-100 text-gray-800"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>Lainnya</span>',
            default => $this->jenis,
        };
    }
}
