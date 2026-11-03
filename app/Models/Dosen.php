<?php

namespace App\Models;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dosen extends Model
{
    protected $table = 'dosen';

    protected $fillable = ['nidn', 'nama', 'email'];

    public function mataKuliahs(): HasMany
    {
        return $this->hasMany(MataKuliah::class);
    }

    public function mahasiswaWali(): HasMany
    {
        return $this->hasMany(Mahasiswa::class, 'dosen_wali_id');
    }
}
