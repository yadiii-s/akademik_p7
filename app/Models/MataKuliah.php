<?php

namespace App\Models;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';

    protected $fillable = ['kode', 'nama', 'sks', 'dosen_id'];
    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class);
    }



    public function mahasiswa(): BelongsToMany
    {
        return $this->belongsToMany(Mahasiswa::class)
            ->withPivot('semester', 'nilai')
            ->withTimestamps();
    }

    public function getRouteKeyName(): string
    {
        return 'kode'; // /matkul/TIF301
    }


    #[Scope]
    protected function denganPeserta(Builder $query): void
    {
        $query->withCount('mahasiswa')
            ->withAvg('mahasiswa as rata_nilai', 'mahasiswa_mata_kuliah.nilai');
    }
}
