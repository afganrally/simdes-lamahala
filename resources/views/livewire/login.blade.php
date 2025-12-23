<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-white to-primary-100 dark:from-neutral-900 dark:to-neutral-800 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">


        <!-- Logo/Header -->
        <div class="text-center mb-8 animate-in">
            <div class="mx-auto h-16 w-16 bg-gradient-to-r from-primary-300 to-primary-500 rounded-full flex items-center justify-center shadow-lg float-animation">
                <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            <h2 class="mt-6 text-3xl font-bold text-neutral-900 dark:text-neutral-100">
                Selamat Datang Kembali
            </h2>
            <p class="mt-2 text-sm text-neutral-600 dark:text-neutral-400">
                Masuk ke akun Anda untuk melanjutkan
            </p>
        </div>

        <!-- Login Card -->
        <div class="card p-8 slide-up">
            <form class="space-y-6" wire:submit.prevent="login">
                <!-- Username Field -->
                <div>
                    <label for="username" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Username
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <input
                            id="username"
                            name="username"
                            type="text"
                            wire:model.live="username"
                            required
                            class="input pl-10"
                        >
                        @error('username')
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="h-5 w-5 text-error-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        @enderror
                    </div>
                    @error('username')
                        <p class="mt-2 text-sm text-error-600 dark:text-error-400 flex items-center">
                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            wire:model="password"
                            required
                            class="input pl-10"
                        >
                        @error('password')
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="h-5 w-5 text-error-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        @enderror
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-error-600 dark:text-error-400 flex items-center">
                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input
                            id="remember"
                            name="remember"
                            type="checkbox"
                            wire:model="remember"
                            class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-neutral-300 dark:border-neutral-600 rounded"
                        >
                        <label for="remember" class="ml-2 block text-sm text-neutral-700 dark:text-neutral-300">
                            Ingat saya
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button
                        type="submit"
                        class="w-full btn-primary flex justify-center items-center py-3 shadow-clean-lg hover:shadow-clean-xl cursor-pointer"
                    >
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Masuk ke Akun
                    </button>
                </div>

                <!-- Demo Credentials Info -->
                <div class="bg-secondary-50 dark:bg-secondary-900/20 border border-secondary-200 dark:border-secondary-800 rounded-lg p-4">
                    <p class="text-xs text-secondary-800 dark:text-secondary-200 font-medium mb-2">Akun Demo:</p>
                    <div class="space-y-1">
                        <p class="text-xs text-secondary-700 dark:text-secondary-300">
                            <span class="font-semibold">Admin:</span> username: <code class="bg-secondary-100 dark:bg-secondary-800 px-1 rounded">admin</code>, password: <code class="bg-secondary-100 dark:bg-secondary-800 px-1 rounded">password</code>
                        </p>
                        <p class="text-xs text-secondary-700 dark:text-secondary-300">
                            <span class="font-semibold">User:</span> username: <code class="bg-secondary-100 dark:bg-secondary-800 px-1 rounded">user</code>, password: <code class="bg-secondary-100 dark:bg-secondary-800 px-1 rounded">password</code>
                        </p>
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center">
            <p class="text-sm text-neutral-500 dark:text-neutral-400">
                © 2025 {{ config('app.name', 'Laravel') }}. Semua hak dilindungi.
            </p>
        </div>
    </div>
</div>
