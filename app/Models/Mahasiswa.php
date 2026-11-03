<?php

namespace App\Models;

use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Models\Prodi;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = ['nim', 'nama', 'angkatan', 'prodi_id', 'dosen_wali_id'];
    public function getRouteKeyName(): string
    {
        return 'nim';
    }

    public function prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class);
    }

    public function dosenWali(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'dosen_wali_id');
    }
    public function mataKuliah(): BelongsToMany
    {
        return $this->belongsToMany(MataKuliah::class)
            ->withPivot('semester', 'nilai')
            ->withTimestamps();
    }
    public function ukm(): BelongsToMany
    {
        return $this->belongsToMany(Ukm::class, 'keanggotaan', 'mahasiswa_id', 'ukm_id')
            ->withPivot('jabatan', 'bergabung_pada')
            ->withTimestamps();
    }


    protected function ipk(): Attribute
    {
        return Attribute::get(function () {
            $dinilai = $this->mataKuliah->filter(fn($mk) => $mk->pivot->nilai !== null);
            $sks = $dinilai->sum('sks');

            return $sks
                ? round($dinilai->sum(fn($mk) => $mk->pivot->bobot * $mk->sks) / $sks, 2)
                : null;
        });
    }

    #[Scope]
    protected function cari(Builder $query, ?string $kata): void
    {
        if ($kata) {
            $query->where('nama', 'like', "%{$kata}%");
        }
    }

    #[Scope]
    protected function diProdi(Builder $query, ?int $prodiId): void
    {
        if ($prodiId) {
            $query->where('prodi_id', $prodiId);
        }
    }

    #[Scope]
    protected function berprestasi(Builder $query, int $batas = 80): void
    {
        $query->denganNilai()->having('rata_nilai', '>=', $batas);
    }

    #[Scope]
    protected function denganNilai(Builder $query): void
    {
        $query->withCount('mataKuliah')
            ->withAvg('mataKuliah as rata_nilai', 'mahasiswa_mata_kuliah.nilai');
    }

    #[Scope]
    protected function rangkapUkm(Builder $query): void
    {
        $query->has('ukm', '>=', 2);
    }
}
