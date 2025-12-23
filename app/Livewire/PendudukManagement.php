<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Penduduk;
use Illuminate\Validation\Rule;

class PendudukManagement extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $nik, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $agama, $pendidikan, $pekerjaan, $status_perkawinan, $alamat, $dusun, $rt, $rw, $status_keluarga, $no_kk, $status_tinggal, $tanggal_masuk, $tanggal_keluar;
    public $penduduk_id;
    public $isOpen = false;
    public $isEdit = false;
    public $confirmDelete = false;
    public $pendudukToDelete = null;
    public $isDetailModalOpen = false;
    public $selectedPenduduk = null;

    protected $listeners = ['closeModal' => 'closeModal', 'closeDetailModal' => 'closeDetailModal'];

    protected $rules = [
        'nik' => 'required|string|max:16|unique:penduduks',
        'nama' => 'required|string|max:255',
        'jenis_kelamin' => 'required|string|max:255',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'agama' => 'required|string|max:255',
        'pendidikan' => 'required|string|max:255',
        'pekerjaan' => 'required|string|max:255',
        'status_perkawinan' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'dusun' => 'required|string|max:255',
        'rt' => 'required|string|max:255',
        'rw' => 'required|string|max:255',
        'status_keluarga' => 'required|string|max:255',
        'no_kk' => 'required|string|max:255',
        'status_tinggal' => 'required|string|max:255',
        'tanggal_masuk' => 'nullable|date',
        'tanggal_keluar' => 'nullable|date',
    ];

    public function render()
    {
        // Debug: Log ke file
        \Log::info('PendudukManagement render called');

        try {
            $penduduks = Penduduk::where('nama', 'like', '%' . $this->search . '%')
                ->orWhere('nik', 'like', '%' . $this->search . '%')
                ->orWhere('alamat', 'like', '%' . $this->search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage);

            \Log::info('Found ' . $penduduks->count() . ' penduduks');

            // Statistics
            $totalPenduduk = Penduduk::count();
            $statusTetap = Penduduk::where('status_tinggal', 'Tetap')->count();
            $totalLaki = Penduduk::where('jenis_kelamin', 'L')->count();
            $totalPerempuan = Penduduk::where('jenis_kelamin', 'P')->count();

            return view('livewire.penduduk-management', [
                'penduduks' => $penduduks,
                'totalPenduduk' => $totalPenduduk,
                'statusTetap' => $statusTetap,
                'totalLaki' => $totalLaki,
                'totalPerempuan' => $totalPerempuan
            ]);
        } catch (\Exception $e) {
            \Log::error('Error in PendudukManagement: ' . $e->getMessage());
            throw $e;
        }
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isEdit = false;
        $this->isOpen = true;
    }

    public function store()
    {
        $this->validate();

        Penduduk::create([
            'nik' => $this->nik,
            'nama' => $this->nama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'agama' => $this->agama,
            'pendidikan' => $this->pendidikan,
            'pekerjaan' => $this->pekerjaan,
            'status_perkawinan' => $this->status_perkawinan,
            'alamat' => $this->alamat,
            'dusun' => $this->dusun,
            'rt' => $this->rt,
            'rw' => $this->rw,
            'status_keluarga' => $this->status_keluarga,
            'no_kk' => $this->no_kk,
            'status_tinggal' => $this->status_tinggal,
            'tanggal_masuk' => $this->tanggal_masuk ?: null,
            'tanggal_keluar' => $this->tanggal_keluar ?: null,
        ]);

        $this->dispatch('closeModal');
        $this->dispatch('success', 'Data penduduk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $this->penduduk_id = $id;
        $this->nik = $penduduk->nik;
        $this->nama = $penduduk->nama;
        $this->jenis_kelamin = $penduduk->jenis_kelamin;
        $this->tempat_lahir = $penduduk->tempat_lahir;
        $this->tanggal_lahir = $penduduk->tanggal_lahir;
        $this->agama = $penduduk->agama;
        $this->pendidikan = $penduduk->pendidikan;
        $this->pekerjaan = $penduduk->pekerjaan;
        $this->status_perkawinan = $penduduk->status_perkawinan;
        $this->alamat = $penduduk->alamat;
        $this->dusun = $penduduk->dusun;
        $this->rt = $penduduk->rt;
        $this->rw = $penduduk->rw;
        $this->status_keluarga = $penduduk->status_keluarga;
        $this->no_kk = $penduduk->no_kk;
        $this->status_tinggal = $penduduk->status_tinggal;
        $this->tanggal_masuk = $penduduk->tanggal_masuk;
        $this->tanggal_keluar = $penduduk->tanggal_keluar;
        $this->isEdit = true;
        $this->isOpen = true;
    }

    public function update()
    {
        $rules = [
            'nik' => 'required|string|max:16|unique:penduduks,nik,'.$this->penduduk_id,
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:255',
            'pendidikan' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'status_perkawinan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'dusun' => 'required|string|max:255',
            'rt' => 'required|string|max:255',
            'rw' => 'required|string|max:255',
            'status_keluarga' => 'required|string|max:255',
            'no_kk' => 'required|string|max:255',
            'status_tinggal' => 'required|string|max:255',
            'tanggal_masuk' => 'nullable|date',
            'tanggal_keluar' => 'nullable|date',
        ];

        $this->validate($rules);

        $penduduk = Penduduk::find($this->penduduk_id);
        $penduduk->update([
            'nik' => $this->nik,
            'nama' => $this->nama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'agama' => $this->agama,
            'pendidikan' => $this->pendidikan,
            'pekerjaan' => $this->pekerjaan,
            'status_perkawinan' => $this->status_perkawinan,
            'alamat' => $this->alamat,
            'dusun' => $this->dusun,
            'rt' => $this->rt,
            'rw' => $this->rw,
            'status_keluarga' => $this->status_keluarga,
            'no_kk' => $this->no_kk,
            'status_tinggal' => $this->status_tinggal,
            'tanggal_masuk' => $this->tanggal_masuk ?: null,
            'tanggal_keluar' => $this->tanggal_keluar ?: null,
        ]);

        $this->dispatch('closeModal');
        $this->dispatch('success', 'Data penduduk berhasil diperbarui.');
    }

    public function delete($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->delete();
        // Dispatch SweetAlert success
        $this->dispatch('sweetAlert', [
            'type' => 'success',
            'title' => 'Berhasil',
            'text' => 'Data penduduk berhasil dihapus'
        ]);
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->confirmDelete = false;
        $this->pendudukToDelete = null;
        $this->resetInputFields();
    }

    public function viewDetail($id)
    {
        $this->selectedPenduduk = Penduduk::findOrFail($id);
        $this->isDetailModalOpen = true;
    }

    public function closeDetailModal()
    {
        $this->isDetailModalOpen = false;
        $this->selectedPenduduk = null;
    }

    private function resetInputFields()
    {
        $this->nik = '';
        $this->nama = '';
        $this->jenis_kelamin = '';
        $this->tempat_lahir = '';
        $this->tanggal_lahir = '';
        $this->agama = '';
        $this->pendidikan = '';
        $this->pekerjaan = '';
        $this->status_perkawinan = '';
        $this->alamat = '';
        $this->dusun = '';
        $this->rt = '';
        $this->rw = '';
        $this->status_keluarga = '';
        $this->no_kk = '';
        $this->status_tinggal = '';
        $this->tanggal_masuk = '';
        $this->tanggal_keluar = '';
        $this->penduduk_id = null;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
