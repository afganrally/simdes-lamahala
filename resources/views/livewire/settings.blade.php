<div>
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-neutral-900 dark:text-white">Pengaturan</h1>
        <p class="text-neutral-600 dark:text-neutral-400 mt-2">Kelola preferensi dan konfigurasi aplikasi</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Theme Settings -->
        <div class="lg:col-span-2">
            <div class="card">
                <div class="px-6 py-4 border-b border-neutral-200 dark:border-neutral-700">
                    <h2 class="text-lg font-semibold text-neutral-900 dark:text-white">Pengaturan Tampilan</h2>
                    <p class="text-sm text-neutral-600 dark:text-neutral-400 mt-1">Kustomisasi tampilan aplikasi</p>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">Tema</label>
                            <div class="flex space-x-4">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" wire:model="theme" value="light" class="mr-2 text-primary-600 focus:ring-primary-500">
                                    <span class="text-neutral-700 dark:text-neutral-300">Terang</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" wire:model="theme" value="dark" class="mr-2 text-primary-600 focus:ring-primary-500">
                                    <span class="text-neutral-700 dark:text-neutral-300">Gelap</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" wire:model="theme" value="auto" class="mr-2 text-primary-600 focus:ring-primary-500">
                                    <span class="text-neutral-700 dark:text-neutral-300">Otomatis</span>
                                </label>
                            </div>
                        </div>

                        <div class="pt-4">
                            <button wire:click="saveThemeSettings" class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg transition-colors duration-200">
                                Simpan Tampilan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div>
            <div class="card">
                <div class="px-6 py-4 border-b border-neutral-200 dark:border-neutral-700">
                    <h3 class="text-lg font-semibold text-neutral-900 dark:text-white">Aksi Cepat</h3>
                </div>
                <div class="p-6 space-y-3">
                    <button wire:click="resetSettings" class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200">
                        Reset Semua Pengaturan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- General Settings -->
    <div class="mt-6">
        <div class="card">
            <div class="px-6 py-4 border-b border-neutral-200 dark:border-neutral-700">
                <h2 class="text-lg font-semibold text-neutral-900 dark:text-white">Pengaturan Umum</h2>
                <p class="text-sm text-neutral-600 dark:text-neutral-400 mt-1">Konfigurasi umum aplikasi</p>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">Bahasa</label>
                        <select wire:model="language" class="w-full px-3 py-2 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-neutral-700 dark:border-neutral-600 dark:text-white">
                            <option value="id">Bahasa Indonesia</option>
                            <option value="en">English</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">Item per Halaman</label>
                        <select wire:model="itemsPerPage" class="w-full px-3 py-2 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-neutral-700 dark:border-neutral-600 dark:text-white">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" wire:model="autoSave" class="mr-2 rounded text-primary-600 focus:ring-primary-500">
                            <span class="text-neutral-700 dark:text-neutral-300">Auto-simpan data formulir</span>
                        </label>
                    </div>
                </div>

                <div class="mt-6">
                    <button wire:click="saveGeneralSettings" class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg transition-colors duration-200">
                        Simpan Pengaturan Umum
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Notification Settings -->
    <div class="mt-6">
        <div class="card">
            <div class="px-6 py-4 border-b border-neutral-200 dark:border-neutral-700">
                <h2 class="text-lg font-semibold text-neutral-900 dark:text-white">Pengaturan Notifikasi</h2>
                <p class="text-sm text-neutral-600 dark:text-neutral-400 mt-1">Kelola preferensi notifikasi</p>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" wire:model="notifications" class="mr-2 rounded text-primary-600 focus:ring-primary-500">
                        <div>
                            <span class="text-neutral-700 dark:text-neutral-300">Notifikasi Browser</span>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400">Tampilkan notifikasi langsung di browser</p>
                        </div>
                    </label>

                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" wire:model="emailNotifications" class="mr-2 rounded text-primary-600 focus:ring-primary-500">
                        <div>
                            <span class="text-neutral-700 dark:text-neutral-300">Notifikasi Email</span>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400">Kirim notifikasi melalui email</p>
                        </div>
                    </label>
                </div>

                <div class="mt-6">
                    <button wire:click="saveNotificationSettings" class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg transition-colors duration-200">
                        Simpan Notifikasi
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
