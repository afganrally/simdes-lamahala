<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bansos extends Model
{
    use HasFactory;

    protected $table = 'bansos';

    protected $fillable = [
        'jenis',
        'kategori',
        'jumlah',
        'tanggal_penyaluran',
        'sumber_dana',
        'periode',
        'status_penerima',
        'keterangan',
        'foto_dokumen',
        'id_user',
        'id_penduduk'
    ];

    protected $casts = [
        'jumlah' => 'decimal:2',
        'tanggal_penyaluran' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'id_penduduk');
    }
}
