<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Public portfolio routes (tanpa login)
Route::get('/', [\App\Http\Controllers\PublicController::class, 'index'])->name('public.portfolio');
Route::get('/artikel/{id}', [\App\Http\Controllers\PublicController::class, 'show'])->name('public.artikel.show');
Route::get('/profil-desa', [\App\Http\Controllers\PublicController::class, 'profil'])->name('public.profil');
Route::get('/data-penduduk', [\App\Http\Controllers\PublicController::class, 'penduduk'])->name('public.penduduk');
Route::get('/sarana-fasilitas', [\App\Http\Controllers\PublicController::class, 'fasilitas'])->name('public.fasilitas');
Route::get('/bantuan-sosial', [\App\Http\Controllers\PublicController::class, 'bansos'])->name('public.bansos');

// Redirect ke login jika belum login (legacy route)
Route::get('/dashboard', function () {
    return redirect()->route('login');
})->name('login-redirect');

// Route untuk guest (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', \App\Livewire\Login::class)->name('login');
});

// Route untuk authenticated user
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard-index');
    })->name('dashboard');

    // Profile route
    Route::get('/profile', function () {
        return view('profile-index');
    })->name('profile');

    // Settings route
    Route::get('/settings', function () {
        return view('settings-index');
    })->name('settings');

    // Activity route
    Route::get('/activity', function () {
        return view('activity-index');
    })->name('activity');

    // Livewire routes for user management (permission handled in component)
    Route::get('/users', function () {
        return view('users-index');
    })->name('users.index');

    // Livewire routes for access management (permission handled in component)
    Route::get('/access', function () {
        return view('access-index');
    })->name('access.index');

    // Livewire routes for penduduk management (permission handled in component)
    Route::get('/penduduks', function () {
        return view('penduduks-index');
    })->name('penduduks.index');

    // Livewire routes for fasilitas management (permission handled in component)
    Route::get('/fasilitas', function () {
        return view('fasilitas-index');
    })->name('fasilitas.index');

    // Livewire routes for bansos management (permission handled in component)
    Route::get('/bansos', function () {
        return view('bansos-index');
    })->name('bansos.index');

    // Livewire routes for artikels management (permission handled in component)
    Route::get('/artikels', function () {
        return view('artikels-index');
    })->name('artikels.index');

    // WYSIWYG editor image upload
    Route::post('/wysiwyg/upload-image', [\App\Http\Controllers\WysiwygController::class, 'uploadImage'])->name('wysiwyg.upload-image');

    Route::post('/logout', function (Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});
