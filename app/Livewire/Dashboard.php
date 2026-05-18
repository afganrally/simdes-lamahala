<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Penduduk;
use App\Models\Fasilitas;
use App\Models\Bansos;

class Dashboard extends Component
{
    public function render()
    {
        $data = [];
        
        if (Auth::user()->role === 'kepala_desa') {
            // Data for charts
            
            // 1. Demografi Penduduk
            $data['pendudukByGender'] = Penduduk::selectRaw('jenis_kelamin, count(*) as total')
                ->groupBy('jenis_kelamin')
                ->pluck('total', 'jenis_kelamin')
                ->toArray();
                
            $data['pendudukByAgama'] = Penduduk::selectRaw('agama, count(*) as total')
                ->groupBy('agama')
                ->pluck('total', 'agama')
                ->toArray();
                
            $data['pendudukByStatusTinggal'] = Penduduk::selectRaw('status_tinggal, count(*) as total')
                ->groupBy('status_tinggal')
                ->pluck('total', 'status_tinggal')
                ->toArray();
                
            $data['pendudukByDusun'] = Penduduk::selectRaw('dusun, count(*) as total')
                ->groupBy('dusun')
                ->pluck('total', 'dusun')
                ->toArray();
                
            // 2. Fasilitas berdasarkan kondisi
            $data['fasilitasByKondisi'] = Fasilitas::selectRaw('kondisi, count(*) as total')
                ->groupBy('kondisi')
                ->pluck('total', 'kondisi')
                ->toArray();
                
            // 3. Bansos berdasarkan status
            $data['bansosByStatus'] = Bansos::selectRaw('status, count(*) as total')
                ->groupBy('status')
                ->pluck('total', 'status')
                ->toArray();
                
            // Summary numbers
            $data['totalPenduduk'] = Penduduk::count();
            $data['totalFasilitas'] = Fasilitas::count();
            $data['totalBansos'] = Bansos::count();
        }

        return view('livewire.dashboard', $data);
    }
}
