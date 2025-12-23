<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Penduduk;

class Activity extends Component
{
    public $search = '';
    public $filter = 'all'; // all, users, penduduks
    public $perPage = 10;

    public function setFilter($filter)
    {
        $this->filter = $filter;
    }

    public function render()
    {
        $activities = [];

        // Get recent users created
        if ($this->filter === 'all' || $this->filter === 'users') {
            $users = User::latest()
                ->when($this->search, function($query) {
                    $query->where('name', 'like', '%'.$this->search.'%')
                          ->orWhere('email', 'like', '%'.$this->search.'%')
                          ->orWhere('username', 'like', '%'.$this->search.'%');
                })
                ->take($this->perPage)
                ->get();

            foreach ($users as $user) {
                $activities[] = [
                    'type' => 'user',
                    'action' => 'Pengguna baru ditambahkan',
                    'description' => "{$user->name} ({$user->username})",
                    'time' => $user->created_at->diffForHumans(),
                    'icon' => 'user',
                    'color' => 'blue'
                ];
            }
        }

        // Get recent penduduks created
        if ($this->filter === 'all' || $this->filter === 'penduduks') {
            $penduduks = Penduduk::latest()
                ->when($this->search, function($query) {
                    $query->where('nama', 'like', '%'.$this->search.'%')
                          ->orWhere('nik', 'like', '%'.$this->search.'%');
                })
                ->take($this->perPage)
                ->get();

            foreach ($penduduks as $penduduk) {
                $activities[] = [
                    'type' => 'penduduk',
                    'action' => 'Data penduduk baru ditambahkan',
                    'description' => "{$penduduk->nama} - {$penduduk->nik}",
                    'time' => $penduduk->created_at->diffForHumans(),
                    'icon' => 'users',
                    'color' => 'green'
                ];
            }
        }

        // Sort activities by time
        usort($activities, function($a, $b) {
            return strtotime($b['time']) - strtotime($a['time']);
        });

        // Get statistics
        $stats = [
            'total_users' => User::count(),
            'total_penduduks' => Penduduk::count(),
            'recent_activities' => count($activities),
        ];

        return view('livewire.activity', [
            'activities' => array_slice($activities, 0, $this->perPage),
            'stats' => $stats
        ]);
    }
}
