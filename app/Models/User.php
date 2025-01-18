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
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
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
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Check if the user has read permissions.
     *
     * @return bool
     */
    public function canRead(): bool
    {
        return (bool) ($this->permissions & 4);
    }

    /**
     * Check if the user has write permissions.
     *
     * @return bool
     */
    public function canWrite(): bool
    {
        return (bool) ($this->permissions & 2);
    }

    /**
     * Check if the user has execute permissions.
     *
     * @return bool
     */
    public function canExecute(): bool
    {
        return (bool) ($this->permissions & 1);
    }

    /**
     * Check if the user has full permissions (read, write, execute).
     *
     * @return bool
     */
    public function hasFullPermissions(): bool
    {
        return $this->permissions === 7;
    }

    /**
     * Grant specific permissions to the user.
     *
     * @param int $permission
     * @return void
     */
    public function grantPermission(int $permission): void
    {
        $this->permissions |= $permission;
        $this->save();
    }

    /**
     * Revoke specific permissions from the user.
     *
     * @param int $permission
     * @return void
     */
    public function revokePermission(int $permission): void
    {
        $this->permissions &= ~$permission;
        $this->save();
    }

    /**
     * Set exact permissions for the user.
     *
     * @param int $permissions
     * @return void
     */
    public function setPermissions(int $permissions): void
    {
        $this->permissions = $permissions;
        $this->save();
    }
}
