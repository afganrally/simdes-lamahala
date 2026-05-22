<?php

namespace App\Listeners;

use Livewire\Component;

trait DispatchSweetAlert
{
    /**
     * Dispatch SweetAlert success
     */
    public function sweetAlertSuccess($message)
    {
        $this->dispatch('sweetAlert', [
            'type' => 'success',
            'title' => 'Berhasil',
            'text' => $message
        ]);
    }

    /**
     * Dispatch SweetAlert error
     */
    public function sweetAlertError($message)
    {
        $this->dispatch('sweetAlert', [
            'type' => 'error',
            'title' => 'Error',
            'text' => $message
        ]);
    }

    /**
     * Dispatch SweetAlert warning
     */
    public function sweetAlertWarning($message)
    {
        $this->dispatch('sweetAlert', [
            'type' => 'warning',
            'title' => 'Peringatan',
            'text' => $message
        ]);
    }

    /**
     * Dispatch SweetAlert info
     */
    public function sweetAlertInfo($message)
    {
        $this->dispatch('sweetAlert', [
            'type' => 'info',
            'title' => 'Info',
            'text' => $message
        ]);
    }

    /**
     * Dispatch SweetAlert confirmation
     */
    public function sweetAlertConfirm($title, $text, $confirmButtonText = 'Ya', $cancelButtonText = 'Batal', $callback = null)
    {
        $this->dispatch('sweetAlertConfirm', [
            'title' => $title,
            'text' => $text,
            'confirmButtonText' => $confirmButtonText,
            'cancelButtonText' => $cancelButtonText,
            'callback' => $callback
        ]);
    }
}