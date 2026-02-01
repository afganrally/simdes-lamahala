import "./bootstrap";
import toastr from "toastr";
import "toastr/build/toastr.min.css";
import Swal from "sweetalert2";
import "./sweetalert.js";
import "./delete-handler.js";
import "./editors/wysiwyg-editor-init.js";

// Configure Toastr defaults
toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: true,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};

// Global function to show notifications
window.showNotification = function (type, message, title = "") {
    switch (type) {
        case "success":
            toastr.success(message, title);
            break;
        case "error":
            toastr.error(message, title);
            break;
        case "warning":
            toastr.warning(message, title);
            break;
        case "info":
            toastr.info(message, title);
            break;
        default:
            toastr.info(message, title);
    }
};

// Function to display flash messages from Laravel
window.displayFlashMessages = function () {
    const flashMessages = {
        success: document
            .querySelector('meta[name="flash-success"]')
            ?.getAttribute("content"),
        error: document
            .querySelector('meta[name="flash-error"]')
            ?.getAttribute("content"),
        warning: document
            .querySelector('meta[name="flash-warning"]')
            ?.getAttribute("content"),
        info: document
            .querySelector('meta[name="flash-info"]')
            ?.getAttribute("content"),
    };

    Object.keys(flashMessages).forEach((type) => {
        if (flashMessages[type]) {
            window.showNotification(type, flashMessages[type]);
        }
    });
};

// SweetAlert2 helper functions
window.showConfirmDialog = function (options = {}) {
    const defaultOptions = {
        title: "Apakah Anda yakin?",
        text: "Tindakan ini tidak dapat dibatalkan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, lanjutkan!",
        cancelButtonText: "Batal",
    };

    const mergedOptions = { ...defaultOptions, ...options };
    return Swal.fire(mergedOptions);
};

// Helper for delete confirmation
window.confirmDelete = function (url, itemName = "item ini") {
    return window
        .showConfirmDialog({
            title: "Hapus Data?",
            text: `Apakah Anda yakin ingin menghapus ${itemName}?`,
            icon: "warning",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal",
        })
        .then((result) => {
            if (result.isConfirmed) {
                // Create form and submit
                const form = document.createElement("form");
                form.method = "POST";
                form.action = url;

                // Add CSRF token
                const csrfToken = document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content");
                const csrfInput = document.createElement("input");
                csrfInput.type = "hidden";
                csrfInput.name = "_token";
                csrfInput.value = csrfToken;
                form.appendChild(csrfInput);

                // Add DELETE method
                const methodInput = document.createElement("input");
                methodInput.type = "hidden";
                methodInput.name = "_method";
                methodInput.value = "DELETE";
                form.appendChild(methodInput);

                document.body.appendChild(form);
                form.submit();
            }
        });
};

// Display flash messages on page load
document.addEventListener("DOMContentLoaded", function () {
    window.displayFlashMessages();
});
