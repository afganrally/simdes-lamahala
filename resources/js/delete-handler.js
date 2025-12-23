// Global function for delete confirmation
window.confirmDeleteWithSweetAlert = function(component, method, id, message) {
    Swal.fire({
        title: 'Konfirmasi',
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
        reverseButtons: true,
        showLoaderOnConfirm: true,
        preConfirm: () => {
            return component.call(method, id);
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data berhasil dihapus',
                timer: 2000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        }
    });
};

// Helper for fasilitas delete
window.deleteFasilitas = function(id) {
    const message = 'Apakah Anda yakin ingin menghapus fasilitas ini?';
    const wireId = document.querySelector('[wire\\:id]')?.getAttribute('wire:id');
    if (wireId) {
        confirmDeleteWithSweetAlert(Livewire.find(wireId), 'delete', id, message);
    } else {
        console.error('Wire component not found');
    }
};

// Helper for penduduk delete
window.deletePenduduk = function(id) {
    const message = 'Apakah Anda yakin ingin menghapus data penduduk ini?';
    const wireId = document.querySelector('[wire\\:id]')?.getAttribute('wire:id');
    if (wireId) {
        confirmDeleteWithSweetAlert(Livewire.find(wireId), 'delete', id, message);
    } else {
        console.error('Wire component not found');
    }
};

// Helper for user delete
window.deleteUser = function(id) {
    const message = 'Apakah Anda yakin ingin menghapus pengguna ini?';
    const wireId = document.querySelector('[wire\\:id]')?.getAttribute('wire:id');
    if (wireId) {
        confirmDeleteWithSweetAlert(Livewire.find(wireId), 'delete', id, message);
    } else {
        console.error('Wire component not found');
    }
};