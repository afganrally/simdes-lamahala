<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the username field for authentication.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /**
     * Permissions yang dimiliki user
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions')
            ->withPivot('can_access')
            ->withTimestamps();
    }

    /**
     * Cek apakah user memiliki permission tertentu
     */
    public function hasPermission($permissionName): bool
    {
        // Admin memiliki semua akses
        if ($this->role === 'admin') {
            return true;
        }

        // Kepala Desa HANYA memiliki akses ke dashboard (dan grafik)
        if ($this->role === 'kepala_desa') {
            return in_array($permissionName, ['view_dashboard']);
        }

        return $this->permissions()
            ->where('name', $permissionName)
            ->where('is_active', true)
            ->where('can_access', true)
            ->exists();
    }

    /**
     * Grant permission ke user
     */
    public function givePermission($permissionId)
    {
        $this->permissions()->syncWithoutDetaching([
            $permissionId => ['can_access' => true]
        ]);
    }

    /**
     * Revoke permission dari user
     */
    public function revokePermission($permissionId)
    {
        $this->permissions()->detach($permissionId);
    }

    /**
     * Sync permissions untuk user
     */
    public function syncPermissions(array $permissionIds)
    {
        $syncData = [];
        foreach ($permissionIds as $id) {
            $syncData[$id] = ['can_access' => true];
        }
        $this->permissions()->sync($syncData);
    }
}
