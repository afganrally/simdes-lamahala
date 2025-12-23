<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // For testing Toastr - remove this line after testing
        // session()->flash('success', 'Selamat datang di halaman Penduduk!');

        $penduduks = Penduduk::orderBy('created_at', 'desc')->paginate(10);
        return view('penduduks.index', compact('penduduks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('penduduks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
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
        ]);

        Penduduk::create($validated);

        return redirect()->route('penduduks.index')
            ->with('success', 'Data penduduk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk): View
    {
        return view('penduduks.show', compact('penduduk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penduduk $penduduk): View
    {
        return view('penduduks.edit', compact('penduduk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penduduk $penduduk): RedirectResponse
    {
        $validated = $request->validate([
            'nik' => 'required|string|max:16|unique:penduduks,nik,'.$penduduk->id,
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
        ]);

        $penduduk->update($validated);

        return redirect()->route('penduduks.index')
            ->with('success', 'Data penduduk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk): RedirectResponse
    {
        $penduduk->delete();

        return redirect()->route('penduduks.index')
            ->with('success', 'Data penduduk berhasil dihapus.');
    }
}
