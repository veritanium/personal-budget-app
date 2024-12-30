<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    /** @use HasFactory<\Database\Factories\AccountFactory> */
    use HasFactory;

    public function budgets(): BelongsTo {
        return $this->belongsTo(Budget::class);
    }

    public function transactions(): HasMany {
        return $this->hasMany(Transaction::class);
    }
}
