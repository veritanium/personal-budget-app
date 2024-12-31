<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Period extends Model
{
    use HasFactory, SoftDeletes;

    public function budget(): BelongsTo
    {
        return $this->belongsTo(Budget::class);
    }

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    public function getFormattedStartDate(string $format = 'Y-m-d'): string
    {
        return Carbon::parse($this->start_date)->format($format);
    }

    public function getFormattedEndDate(string $format = 'Y-m-d'): string
    {
        return Carbon::parse($this->end_date)->format($format);
    }
}
