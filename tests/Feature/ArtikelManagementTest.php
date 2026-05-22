<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Artikel;
use App\Livewire\ArtikelManagement;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ArtikelManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
    }

    private function createAdminUser()
    {
        return User::factory()->create([
            'role' => 'admin',
            'name' => 'Test Admin',
        ]);
    }

    public function test_can_render_artikel_management_component()
    {
        $user = $this->createAdminUser();

        Livewire::actingAs($user)
            ->test(ArtikelManagement::class)
            ->assertStatus(200)
            ->assertSee('Manajemen Artikel');
    }

    public function test_can_create_artikel_with_cover_image()
    {
        $user = $this->createAdminUser();
        $file = UploadedFile::fake()->create('cover.jpg', 100, 'image/jpeg');

        Livewire::actingAs($user)
            ->test(ArtikelManagement::class)
            ->set('judul', 'Judul Artikel Baru')
            ->set('isi', 'Isi dari artikel baru yang sangat menarik.')
            ->set('gambar', $file)
            ->call('store')
            ->assertHasNoErrors()
            ->assertDispatched('success', 'Artikel berhasil ditambahkan!')
            ->assertSet('isOpen', false);

        $artikel = Artikel::first();
        $this->assertNotNull($artikel);
        $this->assertEquals('Judul Artikel Baru', $artikel->judul);
        $this->assertEquals('Isi dari artikel baru yang sangat menarik.', $artikel->isi);
        $this->assertNotNull($artikel->gambar);
        
        // Assert file exists in public storage
        Storage::disk('public')->assertExists($artikel->gambar);
    }

    public function test_can_edit_artikel_and_replace_cover_image()
    {
        $user = $this->createAdminUser();
        
        // Seed initial article
        $oldFile = UploadedFile::fake()->create('old-cover.jpg', 100, 'image/jpeg');
        $oldPath = $oldFile->store('artikels', 'public');
        $artikel = Artikel::create([
            'judul' => 'Judul Lama',
            'isi' => 'Isi Lama',
            'penulis' => $user->name,
            'tanggal' => now()->toDateString(),
            'gambar' => $oldPath,
            'id_user' => $user->id,
        ]);

        Storage::disk('public')->assertExists($oldPath);

        $newFile = UploadedFile::fake()->create('new-cover.jpg', 100, 'image/jpeg');

        Livewire::actingAs($user)
            ->test(ArtikelManagement::class)
            ->call('edit', $artikel->id)
            ->assertSet('judul', 'Judul Lama')
            ->assertSet('isi', 'Isi Lama')
            ->assertSet('oldGambar', $oldPath)
            ->set('judul', 'Judul Baru')
            ->set('gambar', $newFile)
            ->call('store')
            ->assertHasNoErrors()
            ->assertDispatched('success', 'Artikel berhasil diperbarui!');

        $artikel->refresh();
        $this->assertEquals('Judul Baru', $artikel->judul);
        $this->assertNotEquals($oldPath, $artikel->gambar);
        
        // Old image should be deleted from storage
        Storage::disk('public')->assertMissing($oldPath);
        // New image should exist in storage
        Storage::disk('public')->assertExists($artikel->gambar);
    }

    public function test_can_delete_artikel_and_removes_cover_image()
    {
        $user = $this->createAdminUser();

        $file = UploadedFile::fake()->create('delete-cover.jpg', 100, 'image/jpeg');
        $path = $file->store('artikels', 'public');
        $artikel = Artikel::create([
            'judul' => 'Judul Dihapus',
            'isi' => 'Isi Dihapus',
            'penulis' => $user->name,
            'tanggal' => now()->toDateString(),
            'gambar' => $path,
            'id_user' => $user->id,
        ]);

        Storage::disk('public')->assertExists($path);

        Livewire::actingAs($user)
            ->test(ArtikelManagement::class)
            ->call('delete', $artikel->id)
            ->assertDispatched('success', 'Artikel berhasil dihapus!');

        $this->assertDatabaseMissing('artikels', ['id' => $artikel->id]);
        Storage::disk('public')->assertMissing($path);
    }
}
