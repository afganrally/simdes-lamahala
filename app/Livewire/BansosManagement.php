<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Bansos;
use App\Models\Penduduk;

class BansosManagement extends Component
{
    use WithPagination, WithFileUploads;

    public $bansos_id, $jenis, $kategori, $jumlah, $tanggal_penyaluran, $sumber_dana, $periode, $status, $keterangan;
    public $foto_dokumen, $id_penduduk;
    public $search = '';
    public $isOpen = false;

    protected $rules = [
        'jenis' => 'required|string',
        'kategori' => 'required|string',
        'jumlah' => 'required|numeric|min:0',
        'tanggal_penyaluran' => 'required|date',
        'sumber_dana' => 'required|string',
        'periode' => 'required|string',
        'status' => 'required|in:Pending,Disalurkan,Proses,Batal',
        'keterangan' => 'nullable|string',
        'foto_dokumen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'id_penduduk' => 'required|exists:penduduks,id'
    ];

    public function render()
    {
        $bansos = Bansos::with(['user', 'penduduk'])
            ->where(function($query) {
                $query->where('jenis', 'like', '%'.$this->search.'%')
                      ->orWhere('kategori', 'like', '%'.$this->search.'%')
                      ->orWhere('status', 'like', '%'.$this->search.'%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $penduduks = Penduduk::all();

        // Get current user permissions
        $currentUser = auth()->user();
        $canCreate = $currentUser->hasPermission('create_bansos');
        $canEdit = $currentUser->hasPermission('edit_bansos');
        $canDelete = $currentUser->hasPermission('delete_bansos');

        return view('livewire.bansos-management', [
            'bansos' => $bansos,
            'penduduks' => $penduduks,
            'canCreate' => $canCreate,
            'canEdit' => $canEdit,
            'canDelete' => $canDelete,
        ]);
    }

    public function create()
    {
        if (!auth()->user()->hasPermission('create_bansos')) {
            $this->dispatch('sweetAlert', [
                'type' => 'error',
                'title' => 'Akses Ditolak',
                'text' => 'Anda tidak memiliki izin untuk menambah data bansos.'
            ]);
            return;
        }

        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->bansos_id = '';
        $this->jenis = '';
        $this->kategori = '';
        $this->jumlah = '';
        $this->tanggal_penyaluran = '';
        $this->sumber_dana = '';
        $this->periode = '';
        $this->status = '';
        $this->keterangan = '';
        $this->foto_dokumen = null;
        $this->id_penduduk = '';
        $this->resetErrorBag();
    }

    public function store()
    {
        if (!auth()->user()->hasPermission('create_bansos')) {
            $this->dispatch('sweetAlert', [
                'type' => 'error',
                'title' => 'Akses Ditolak',
                'text' => 'Anda tidak memiliki izin untuk menambah data bansos.'
            ]);
            return;
        }

        $this->validate();

        $data = [
            'jenis' => $this->jenis,
            'kategori' => $this->kategori,
            'jumlah' => $this->jumlah,
            'tanggal_penyaluran' => $this->tanggal_penyaluran,
            'sumber_dana' => $this->sumber_dana,
            'periode' => $this->periode,
            'status' => $this->status,
            'keterangan' => $this->keterangan,
            'id_user' => auth()->user()->id,
            'id_penduduk' => $this->id_penduduk
        ];

        if ($this->foto_dokumen) {
            $data['foto_dokumen'] = $this->foto_dokumen->store('bansos-documents', 'public');
        }

        Bansos::updateOrCreate(['id' => $this->bansos_id], $data);

        $message = $this->bansos_id ? 'Data Bansos berhasil diperbarui!' : 'Data Bansos berhasil ditambahkan!';
        $this->dispatch('success', $message);

        $this->closeModal();
    }

    public function edit($id)
    {
        if (!auth()->user()->hasPermission('edit_bansos')) {
            $this->dispatch('sweetAlert', [
                'type' => 'error',
                'title' => 'Akses Ditolak',
                'text' => 'Anda tidak memiliki izin untuk mengedit data bansos.'
            ]);
            return;
        }

        $bansos = Bansos::findOrFail($id);
        $this->bansos_id = $id;
        $this->jenis = $bansos->jenis;
        $this->kategori = $bansos->kategori;
        $this->jumlah = $bansos->jumlah;
        $this->tanggal_penyaluran = $bansos->tanggal_penyaluran;
        $this->sumber_dana = $bansos->sumber_dana;
        $this->periode = $bansos->periode;
        $this->status = $bansos->status;
        $this->keterangan = $bansos->keterangan;
        $this->id_penduduk = $bansos->id_penduduk;

        $this->openModal();
    }

    public function delete($id)
    {
        if (!auth()->user()->hasPermission('delete_bansos')) {
            $this->dispatch('sweetAlert', [
                'type' => 'error',
                'title' => 'Akses Ditolak',
                'text' => 'Anda tidak memiliki izin untuk menghapus data bansos.'
            ]);
            return;
        }

        $bansos = Bansos::findOrFail($id);
        if ($bansos->foto_dokumen) {
            \Storage::disk('public')->delete($bansos->foto_dokumen);
        }
        $bansos->delete();

        $this->dispatch('success', 'Data Bansos berhasil dihapus!');
    }
}
