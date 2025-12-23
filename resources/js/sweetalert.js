// SweetAlert2 will be loaded from CDN

// Make Swal available globally
window.Swal = Swal;

// Override the default confirm dialog globally
window.confirm = (message) => {
    if (typeof Swal === 'undefined') {
        console.error('SweetAlert2 is not loaded');
        return confirm(message);
    }

    return Swal.fire({
        title: 'Konfirmasi',
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        return result.isConfirmed;
    });
};

// Override the default alert dialog globally
window.alert = (message) => {
    if (typeof Swal === 'undefined') {
        console.error('SweetAlert2 is not loaded');
        return alert(message);
    }

    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: message,
        timer: 2000,
        timerProgressBar: true,
        showConfirmButton: false
    });
};

// Listen for Livewire initialization
document.addEventListener('livewire:init', () => {
    // Listen for SweetAlert events from Livewire
    Livewire.on('sweetAlert', (data) => {
        if (typeof Swal === 'undefined') {
            console.error('SweetAlert2 is not loaded');
            return;
        }

        Swal.fire({
            icon: data.type,
            title: data.title,
            text: data.text,
            timer: data.type === 'success' ? 2000 : null,
            timerProgressBar: data.type === 'success',
            showConfirmButton: data.type !== 'success'
        });
    });
});

// Fallback for non-Livewire pages
document.addEventListener('DOMContentLoaded', function() {
    // Check if Swal is available
    if (typeof Swal === 'undefined') {
        console.error('SweetAlert2 is not loaded');
        return;
    }
});