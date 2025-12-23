<?php

namespace App\Livewire;

use Livewire\Component;
class Settings extends Component
{
    public $theme = 'light';
    public $language = 'id';
    public $notifications = true;
    public $emailNotifications = true;
    public $autoSave = true;
    public $itemsPerPage = 10;

    public function mount()
    {
        // Load settings from session or config
        $this->theme = session('theme', 'light');
        $this->language = session('language', config('app.locale', 'id'));
        $this->notifications = session('notifications', true);
        $this->emailNotifications = session('email_notifications', true);
        $this->autoSave = session('auto_save', true);
        $this->itemsPerPage = session('items_per_page', 10);
    }

    public function saveThemeSettings()
    {
        session(['theme' => $this->theme]);

        // Apply theme immediately
        if ($this->theme === 'dark') {
            session(['dark_mode' => true]);
        } else {
            session(['dark_mode' => false]);
        }

        $this->dispatch('success', 'Pengaturan tema berhasil disimpan');
    }

    public function saveNotificationSettings()
    {
        session([
            'notifications' => $this->notifications,
            'email_notifications' => $this->emailNotifications
        ]);

        $this->dispatch('success', 'Pengaturan notifikasi berhasil disimpan');
    }

    public function saveGeneralSettings()
    {
        session([
            'language' => $this->language,
            'auto_save' => $this->autoSave,
            'items_per_page' => $this->itemsPerPage
        ]);

        $this->dispatch('success', 'Pengaturan umum berhasil disimpan');
    }

    public function resetSettings()
    {
        // Reset all settings to defaults
        session()->forget(['theme', 'dark_mode', 'language', 'notifications', 'email_notifications', 'auto_save', 'items_per_page']);

        // Reload defaults
        $this->mount();

        $this->dispatch('success', 'Semua pengaturan telah direset ke default');
    }

    public function render()
    {
        return view('livewire.settings');
    }
}
