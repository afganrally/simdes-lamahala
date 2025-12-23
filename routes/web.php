<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Redirect ke login jika belum login
Route::get('/', function () {
    return redirect()->route('login');
});

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

    // Test Toastr routes
    Route::get('/test-toastr', [\App\Http\Controllers\ToastrController::class, 'index'])->name('test-toastr');
    Route::post('/test-toastr-flash', [\App\Http\Controllers\ToastrController::class, 'testFlash'])->name('test-toastr-flash');

    // User management routes (admin only)
    Route::middleware('admin')->group(function () {
        // Livewire routes for user management
        Route::get('/users', function () {
            return view('users-index');
        })->name('users.index');

        // Livewire routes for penduduk management
        Route::get('/penduduks', function () {
            return view('penduduks-index');
        })->name('penduduks.index');

        // Livewire routes for fasilitas management
        Route::get('/fasilitas', function () {
            return view('fasilitas-index');
        })->name('fasilitas.index');

        // Livewire routes for bansos management
        Route::get('/bansos', function () {
            return view('bansos-index');
        })->name('bansos.index');

        // Livewire routes for artikels management
        Route::get('/artikels', function () {
            return view('artikels-index');
        })->name('artikels.index');
    });

    Route::post('/logout', function (Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});
