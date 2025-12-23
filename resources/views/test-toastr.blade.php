@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Test Toastr Notifications</h1>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
        <h2 class="text-lg font-semibold mb-4">Test Buttons</h2>

        <div class="space-y-4">
            <div>
                <button onclick="showNotification('success', 'This is a success message!', 'Success')"
                        class="btn-primary mr-2">
                    Show Success
                </button>

                <button onclick="showNotification('error', 'This is an error message!', 'Error')"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg mr-2">
                    Show Error
                </button>

                <button onclick="showNotification('warning', 'This is a warning message!', 'Warning')"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg mr-2">
                    Show Warning
                </button>

                <button onclick="showNotification('info', 'This is an info message!', 'Info')"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                    Show Info
                </button>
            </div>

            <div class="mt-6">
                <h3 class="text-md font-semibold mb-2">Flash Message Test</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                    Click the button below to set a flash message and refresh the page to see it in action:
                </p>

                <form method="POST" action="/test-toastr-flash" class="inline">
                    @csrf
                    <button type="submit" class="btn-primary">
                        Test Flash Message
                    </button>
                </form>
            </div>

            <div class="mt-6">
                <h3 class="text-md font-semibold mb-2">SweetAlert2 Confirmation Test</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                    Click the button below to test SweetAlert2 confirmation dialog:
                </p>

                <button onclick="testSweetAlert()" class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg mr-2">
                    Test SweetAlert2
                </button>

                <button onclick="testCustomConfirm()" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg">
                    Test Custom Confirm
                </button>
            </div>
        </div>
    </div>

    <script>
        function testSweetAlert() {
            showConfirmDialog({
                title: 'SweetAlert2 Test!',
                text: 'Ini adalah contoh dialog konfirmasi menggunakan SweetAlert2.',
                icon: 'info',
                confirmButtonText: 'Mengerti!',
                cancelButtonText: 'Tutup'
            }).then((result) => {
                if (result.isConfirmed) {
                    showNotification('success', 'Anda mengklik tombol konfirmasi!', 'Sukses');
                }
            });
        }

        function testCustomConfirm() {
            showConfirmDialog({
                title: 'Konfirmasi Kustom',
                text: 'Apakah Anda ingin melanjutkan dengan pengaturan kustom ini?',
                icon: 'question',
                confirmButtonColor: '#10b981',
                cancelButtonColor: '#ef4444',
                confirmButtonText: 'Ya, lanjutkan!',
                cancelButtonText: 'Tidak, batalkan'
            }).then((result) => {
                if (result.isConfirmed) {
                    showNotification('info', 'Aksi dilanjutkan dengan pengaturan kustom', 'Info');
                } else if (result.isDismissed) {
                    showNotification('warning', 'Aksi dibatalkan', 'Dibatalkan');
                }
            });
        }
    </script>
</div>
@endsection
