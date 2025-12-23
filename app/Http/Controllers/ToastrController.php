<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToastrController extends Controller
{
    /**
     * Display the Toastr test page.
     */
    public function index()
    {
        return view('test-toastr');
    }

    /**
     * Handle flash message test.
     */
    public function testFlash(Request $request)
    {
        return redirect()->route('test-toastr')
            ->with('success', 'Ini adalah contoh flash message yang berhasil ditampilkan menggunakan Toastr!');
    }

    /**
     * Test different types of notifications
     */
    public function testNotification(Request $request)
    {
        $type = $request->input('type', 'success');
        $message = $request->input('message', 'Test notification');

        return redirect()->route('test-toastr')
            ->with($type, $message);
    }
}
