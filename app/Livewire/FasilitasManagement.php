<?php

namespace App\Livewire;

use Laravel\Pail\ValueObjects\Origin\Console;
use Livewire\Component;
use App\Models\Fasilitas;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FasilitasManagement extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $perPage = 10;
    public $isOpen = false;
    public $isEdit = false;
    public $confirmDelete = false;

    // Form fields
    public $nama, $jenis = 'lainnya', $detail, $jumlah = 1, $lokasi, $kondisi = 'baik', $keterangan;
    public $gambar, $oldGambar;

    public $fasilitasId;
    public $fasilitas;

    protected function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'jenis' => 'required|in:gedung,ruangan,kendaraan,elektronik,olahraga,lainnya',
            'detail' => 'nullable|string',
            'jumlah' => 'required|integer|min:1',
            'lokasi' => 'required|string|max:255',
            'kondisi' => 'required|in:baik,rusak_ringan,rusak_berat,maintenance',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function resetForm()
    {
        $this->nama = '';
        $this->jenis = 'lainnya';
        $this->detail = '';
        $this->jumlah = 1;
        $this->lokasi = '';
        $this->kondisi = 'baik';
        $this->keterangan = '';
        $this->gambar = null;
        $this->oldGambar = null;
        $this->fasilitasId = null;
        $this->fasilitas = null;
        $this->isEdit = false;
    }

    public function openModal()
    {
        $this->resetForm();
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetForm();
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate();

        $gambarPath = null;
        if ($this->gambar) {
            $gambarPath = $this->gambar->store('fasilitas', 'public');
        }

        Fasilitas::create([
            'nama' => $this->nama,
            'jenis' => $this->jenis,
            'detail' => $this->detail,
            'jumlah' => $this->jumlah,
            'lokasi' => $this->lokasi,
            'kondisi' => $this->kondisi,
            'keterangan' => $this->keterangan,
            'gambar' => $gambarPath,
            'id_user' => Auth::id(),
        ]);

        $this->dispatch('success', 'Fasilitas berhasil ditambahkan');
        $this->closeModal();
    }

    public function edit($id)
    {
        $this->isEdit = true;
        $this->fasilitasId = $id;
        $this->fasilitas = Fasilitas::findOrFail($id);

        $this->nama = $this->fasilitas->nama;
        $this->jenis = $this->fasilitas->jenis;
        $this->detail = $this->fasilitas->detail;
        $this->jumlah = $this->fasilitas->jumlah;
        $this->lokasi = $this->fasilitas->lokasi;
        $this->kondisi = $this->fasilitas->kondisi;
        $this->keterangan = $this->fasilitas->keterangan;
        $this->oldGambar = $this->fasilitas->gambar;

        $this->isOpen = true;
    }

    public function update()
    {
        $this->validate();

        $fasilitas = Fasilitas::findOrFail($this->fasilitasId);

        $gambarPath = $this->oldGambar;
        if ($this->gambar) {
            // Delete old image
            if ($this->oldGambar) {
                Storage::disk('public')->delete($this->oldGambar);
            }
            $gambarPath = $this->gambar->store('fasilitas', 'public');
        }

        $fasilitas->update([
            'nama' => $this->nama,
            'jenis' => $this->jenis,
            'detail' => $this->detail,
            'jumlah' => $this->jumlah,
            'lokasi' => $this->lokasi,
            'kondisi' => $this->kondisi,
            'keterangan' => $this->keterangan,
            'gambar' => $gambarPath,
        ]);

        $this->dispatch('success', 'Fasilitas berhasil diperbarui');
        $this->closeModal();
    }

    public function delete($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        // Delete image if exists
        if ($fasilitas->gambar) {
            Storage::disk('public')->delete($fasilitas->gambar);
        }

        $fasilitas->delete();

        // Dispatch SweetAlert success
        $this->dispatch('sweetAlert', [
            'type' => 'success',
            'title' => 'Berhasil',
            'text' => 'Fasilitas berhasil dihapus'
        ]);
    }

    public function cancelDelete()
    {
        $this->confirmDelete = false;
        $this->fasilitasId = null;
        $this->fasilitas = null;
    }

    public function updatingGambar()
    {
        $this->validateOnly('gambar');
    }

    public function render()
    {
        
        // Get statistics
        $totalFasilitas = Fasilitas::count();
        $kondisiBaik = Fasilitas::where('kondisi', 'baik')->count();
        $perluMaintenance = Fasilitas::where('kondisi', 'maintenance')->count();
        $rusak = Fasilitas::whereIn('kondisi', ['rusak_ringan', 'rusak_berat'])->count();

        // Get fasilitas with pagination
        $query = Fasilitas::with('user');

        if ($this->search) {
            $searchTerm = '%'.$this->search.'%';
            $query->where(function($q) use ($searchTerm) {
                $q->where('nama', 'like', $searchTerm)
                  ->orWhere('lokasi', 'like', $searchTerm)
                  ->orWhere('keterangan', 'like', $searchTerm);
            });
        }

        $fasilitas = $query->latest()->paginate($this->perPage);

        // Debug
        logger("Fasilitas count: " . $fasilitas->count());
        logger("Fasilitas items: " . json_encode($fasilitas->pluck('nama')));

        error_log ($fasilitas);
        return view('livewire.fasilitas-management', [
            'fasilitasList' => $fasilitas,
            'totalFasilitas' => $totalFasilitas,
            'kondisiBaik' => $kondisiBaik,
            'perluMaintenance' => $perluMaintenance,
            'rusak' => $rusak
        ]);
    }
}
