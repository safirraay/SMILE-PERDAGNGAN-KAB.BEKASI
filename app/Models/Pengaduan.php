<?php

namespace App\Models;

use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pengaduan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'report_date',
        'masyarakat_id',
        'title',
        'incident_date',
        'location',
        'content',
        'photo',
        'status',
    ];

    /**
     * Get the masyarakat that owns the Pengaduan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'masyarakat_id', 'id');
    }

    /**
     * Get all of the tanggapan for the Pengaduan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class);
    }
}
