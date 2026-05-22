<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Artikel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ArtikelManagement extends Component
{
    use WithPagination, WithFileUploads;

    public $artikel_id, $judul, $isi;
    public $gambar; // Holds the newly uploaded cover image
    public $oldGambar; // Holds the path of the existing cover image
    public $search = '';
    public $isOpen = false;

    protected $rules = [
        'judul' => 'required|string|max:255',
        'isi' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ];

    public function render()
    {
        $artikels = Artikel::with(['user'])
            ->where(function ($query) {
                $query->where('judul', 'like', '%' . $this->search . '%')
                    ->orWhere('penulis', 'like', '%' . $this->search . '%')
                    ->orWhere('isi', 'like', '%' . $this->search . '%');
            })
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        // Get current user permissions
        $currentUser = auth()->user();
        $canCreate = $currentUser->hasPermission('create_artikels');
        $canEdit = $currentUser->hasPermission('edit_artikels');
        $canDelete = $currentUser->hasPermission('delete_artikels');

        return view('livewire.artikel-management', [
            'artikels' => $artikels,
            'canCreate' => $canCreate,
            'canEdit' => $canEdit,
            'canDelete' => $canDelete,
        ]);
    }

    public function create()
    {
        if (!auth()->user()->hasPermission('create_artikels')) {
            $this->dispatch('sweetAlert', [
                'type' => 'error',
                'title' => 'Akses Ditolak',
                'text' => 'Anda tidak memiliki izin untuk menambah artikel.'
            ]);
            return;
        }

        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
        $this->dispatch('wysiwyg-editor-init');
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
        $this->gambar = null;
        $this->oldGambar = null;
        $this->resetErrorBag();
    }

    public function store()
    {
        if ($this->artikel_id) {
            // Edit permission check
            if (!auth()->user()->hasPermission('edit_artikels')) {
                $this->dispatch('sweetAlert', [
                    'type' => 'error',
                    'title' => 'Akses Ditolak',
                    'text' => 'Anda tidak memiliki izin untuk mengubah artikel.'
                ]);
                return;
            }
        } else {
            // Create permission check
            if (!auth()->user()->hasPermission('create_artikels')) {
                $this->dispatch('sweetAlert', [
                    'type' => 'error',
                    'title' => 'Akses Ditolak',
                    'text' => 'Anda tidak memiliki izin untuk menambah artikel.'
                ]);
                return;
            }
        }

        $this->validate();

        $data = [
            'judul' => $this->judul,
            'isi' => $this->isi,
            'penulis' => auth()->user()->name,
            'tanggal' => Carbon::now()->toDateString(),
            'id_user' => auth()->user()->id
        ];

        if ($this->gambar) {
            // If editing and has existing image, delete it
            if ($this->artikel_id) {
                $artikel = Artikel::find($this->artikel_id);
                if ($artikel && $artikel->gambar) {
                    Storage::disk('public')->delete($artikel->gambar);
                }
            }
            // Store the new image
            $data['gambar'] = $this->gambar->store('artikels', 'public');
        }

        Artikel::updateOrCreate(['id' => $this->artikel_id], $data);

        $message = $this->artikel_id ? 'Artikel berhasil diperbarui!' : 'Artikel berhasil ditambahkan!';
        $this->dispatch('success', $message);

        $this->closeModal();
    }

    public function edit($id)
    {
        if (!auth()->user()->hasPermission('edit_artikels')) {
            $this->dispatch('sweetAlert', [
                'type' => 'error',
                'title' => 'Akses Ditolak',
                'text' => 'Anda tidak memiliki izin untuk mengedit artikel.'
            ]);
            return;
        }

        $artikel = Artikel::findOrFail($id);
        $this->artikel_id = $id;
        $this->judul = $artikel->judul;
        $this->isi = $artikel->isi;
        $this->oldGambar = $artikel->gambar;

        $this->openModal();

        // Dispatch event to update WYSIWYG editor content after modal opens
        $this->dispatch('wysiwyg-editor-update', ['content' => $this->isi]);
    }

    public function delete($id)
    {
        if (!auth()->user()->hasPermission('delete_artikels')) {
            $this->dispatch('sweetAlert', [
                'type' => 'error',
                'title' => 'Akses Ditolak',
                'text' => 'Anda tidak memiliki izin untuk menghapus artikel.'
            ]);
            return;
        }

        $artikel = Artikel::findOrFail($id);
        if ($artikel->gambar) {
            Storage::disk('public')->delete($artikel->gambar);
        }
        $artikel->delete();

        $this->dispatch('success', 'Artikel berhasil dihapus!');
    }
}
