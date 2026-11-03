<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $fillable = [
        'kode',
        'nama',
        'kategori',
        'jumlah',
        'kondisi',
        'harga',
        'tanggal_beli',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_beli' => 'date',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'kode';
    }
}
