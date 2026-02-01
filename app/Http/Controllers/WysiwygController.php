<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WysiwygController extends Controller
{
    /**
     * Upload image from WYSIWYG editor
     */
    public function uploadImage(Request $request)
    {
        // Validate request
        if (!$request->hasFile('image')) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada file yang diupload'
            ], 400);
        }

        $file = $request->file('image');

        // Validate file type
        $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
        if (!\in_array($file->getMimeType(), $allowedTypes)) {
            return response()->json([
                'success' => false,
                'message' => 'Tipe file tidak diizinkan. Hanya JPG, PNG, GIF, dan WebP.'
            ], 400);
        }

        // Validate file size (max 2MB)
        if ($file->getSize() > 2 * 1024 * 1024) {
            return response()->json([
                'success' => false,
                'message' => 'Ukuran file maksimal 2MB'
            ], 400);
        }

        try {
            // Generate unique filename
            $filename = 'wysiwyg-' . \time() . '-' . \uniqid() . '.' . $file->getClientOriginalExtension();

            // Store file
            $path = $file->storeAs('wysiwyg-images', $filename, 'public');

            // Build URL manually to ensure correct path
            $url = request()->getSchemeAndHttpHost() . '/storage/' . $path;

            return response()->json([
                'success' => true,
                'url' => $url,
                'path' => $path,
                'message' => 'Gambar berhasil diupload'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupload gambar: ' . $e->getMessage()
            ], 500);
        }
    }
}
