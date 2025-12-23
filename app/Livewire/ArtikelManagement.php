<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Artikel;

class ArtikelManagement extends Component
{
    use WithPagination, WithFileUploads;

    public $artikel_id, $judul, $isi, $penulis, $tanggal, $gambar;
    public $search = '';
    public $isOpen = false;

    protected $rules = [
        'judul' => 'required|string|max:255',
        'isi' => 'required|string',
        'penulis' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ];

    public function render()
    {
        $artikels = Artikel::with(['user'])
            ->where(function($query) {
                $query->where('judul', 'like', '%'.$this->search.'%')
                      ->orWhere('penulis', 'like', '%'.$this->search.'%')
                      ->orWhere('isi', 'like', '%'.$this->search.'%');
            })
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('livewire.artikel-management', [
            'artikels' => $artikels
        ]);
    }

    public function create()
    {
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
        $this->artikel_id = '';
        $this->judul = '';
        $this->isi = '';
        $this->penulis = '';
        $this->tanggal = '';
        $this->gambar = null;
        $this->resetErrorBag();
    }

    public function store()
    {
        $this->validate();

        $data = [
            'judul' => $this->judul,
            'isi' => $this->isi,
            'penulis' => $this->penulis,
            'tanggal' => $this->tanggal,
            'id_user' => auth()->user()->id
        ];

        if ($this->gambar) {
            $data['gambar'] = $this->gambar->store('artikel-images', 'public');
        }

        Artikel::updateOrCreate(['id' => $this->artikel_id], $data);

        $message = $this->artikel_id ? 'Artikel berhasil diperbarui!' : 'Artikel berhasil ditambahkan!';
        $this->dispatchBrowserEvent('success', ['message' => $message]);

        $this->closeModal();
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        $this->artikel_id = $id;
        $this->judul = $artikel->judul;
        $this->isi = $artikel->isi;
        $this->penulis = $artikel->penulis;
        $this->tanggal = $artikel->tanggal;

        $this->openModal();
    }

    public function delete($id)
    {
        $artikel = Artikel::findOrFail($id);
        if ($artikel->gambar) {
            \Storage::disk('public')->delete($artikel->gambar);
        }
        $artikel->delete();

        $this->dispatchBrowserEvent('success', ['message' => 'Artikel berhasil dihapus!']);
    }
}
