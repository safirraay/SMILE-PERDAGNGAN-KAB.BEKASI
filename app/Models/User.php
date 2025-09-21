<?php

namespace App\Models;

use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'phone_number',
        'level',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all of the tanggapan for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class);
    }

    /**
     * Get the masyarakat associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function masyarakat()
    {
        // [UPDATE] Parameter 'user_id' dan 'id' dihapus karena sudah sesuai konvensi Laravel
        return $this->hasOne(Masyarakat::class);
    }
}
