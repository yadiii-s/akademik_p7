<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Nilai extends Pivot
{
    public $incrementing = true;

    protected function casts(): array
    {
        return ['nilai' => 'float'];
    }

    protected function huruf(): Attribute
    {
        return Attribute::get(fn() => match (true) {
            $this->nilai === null => '-',
            $this->nilai >= 80 => 'A',
            $this->nilai >= 70 => 'B',
            $this->nilai >= 60 => 'C',
            $this->nilai >= 50 => 'D',
            default => 'E',
        });
    }

    protected function bobot(): Attribute
    {
        return Attribute::get(fn() => match ($this->huruf) {
            'A' => 4,
            'B' => 3,
            'C' => 2,
            'D' => 1,
            'E' => 0,
            default => null,
        });
    }
}
