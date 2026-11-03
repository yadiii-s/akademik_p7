<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ukm extends Model
{
    protected $table = 'ukm';

    protected $fillable = ['kode', 'nama', 'kategori', 'tahun_berdiri'];

    public function getRouteKeyName(): string
    {
        return 'kode';
    }

    public function anggota(): BelongsToMany
    {
        return $this->belongsToMany(Mahasiswa::class, 'keanggotaan', 'ukm_id', 'mahasiswa_id')
            ->withPivot('jabatan', 'bergabung_pada')
            ->withTimestamps();
    }

    #[Scope]
    protected function kategori(Builder $query, ?string $kategori): void
    {
        if ($kategori) {
            $query->where('kategori', $kategori);
        }
    }
}
