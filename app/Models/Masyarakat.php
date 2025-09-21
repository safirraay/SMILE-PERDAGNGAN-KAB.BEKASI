<?php

namespace App\Models;

use App\Models\User;
use App\Models\Village;
use App\Models\Pengaduan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Masyarakat extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'masyarakat';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'nik',
        'address',
        'gender',
        'rt',
        'rw',
        'postal_code',
        'village_id',
    ];

    /**
     * Get the user that owns the Masyarakat profile.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        // [UPDATE] Parameter 'user_id' dan 'id' dihapus
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the pengaduan for the Masyarakat.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pengaduan()
    {
        // [UPDATE] Parameter 'masyarakat_id' dan 'id' dihapus
        return $this->hasMany(Pengaduan::class);
    }

    /**
     * Get the village that the Masyarakat belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function village()
    {
        // [UPDATE] Parameter 'village_id' dan 'id' dihapus
        return $this->belongsTo(Village::class);
    }
}
