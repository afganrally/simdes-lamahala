<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Penduduk;
use App\Models\Fasilitas;
use App\Models\Bansos;

class PublicController extends Controller
{
    /**
     * Display public portfolio page with all articles
     */
    public function index()
    {
        $artikels = Artikel::orderBy('tanggal', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('public.portfolio', compact('artikels'));
    }

    /**
     * Display single article detail
     */
    public function show($slug)
    {
        // Find article by ID (since we don't have slug field yet)
        $artikel = Artikel::findOrFail($slug);

        // Get related articles (same author or latest)
        $relatedArtikels = Artikel::where('id', '!=', $artikel->id)
            ->orderBy('tanggal', 'desc')
            ->limit(3)
            ->get();

        return view('public.artikel-detail', compact('artikel', 'relatedArtikels'));
    }

    /**
     * Display profil desa page
     */
    public function profil()
    {
        return view('public.profil');
    }

    /**
     * Display penduduk page
     */
    public function penduduk()
    {
        return view('public.penduduk');
    }

    /**
     * Display fasilitas page
     */
    public function fasilitas()
    {
        return view('public.fasilitas');
    }

    /**
     * Display bansos page
     */
    public function bansos()
    {
        return view('public.bansos');
    }
}
