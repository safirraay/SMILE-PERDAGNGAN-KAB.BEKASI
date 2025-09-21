<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tanggapan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tanggapan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pengaduan_id',
        'response_date',
        'response',
        'user_id',
    ];

    /**
     * Get the pengaduan that owns the Tanggapan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }

    /**
     * Get the user that owns the Tanggapan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        // [UPDATE] Parameter 'user_id' dan 'id' dihapus
        return $this->belongsTo(User::class);
    }
}
