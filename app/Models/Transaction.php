<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Number;
use Illuminate\Support\Str;
use function PHPUnit\Framework\stringContains;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    public function budget(): BelongsTo
    {
        return $this->belongsTo(Budget::class);
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function entity(): BelongsTo
    {
        return $this->belongsTo(Entity::class);
    }

    public function amountCentsToDollars(): string
    {
        // total amount stored as cents
        $dollars = $this->amount / 100;
        return Number::currency($dollars, 'USD');
    }

    static public function amountDollarsToCents($amount): int
    {
        if (Str::contains($amount, '.')) {
            return (int) str_replace([',','.'], '', $amount);
        } else {
            $amount = (int) str_replace(',', '', $amount);
            return $amount * 100;
        }
    }

    public function transactionTypeStyle(): string
    {
        if($this->attributes['type'] === 'debit') {
            return 'text-red-500 dark:text-red-500';
        }
        return '';
    }

    // Override save method to convert amount to integer
    public function save(array $options = []): bool
    {
        if (get_debug_type($this->attributes['amount']) !== 'int') {
            $this->attributes['amount'] = self::amountDollarsToCents($this->attributes['amount']);
        }
        if ($this->attributes['type'] === 'debit' && $this->attributes['amount'] > 0) {
            $this->attributes['amount'] = $this->attributes['amount'] * -1;
        } else if ($this->attributes['type'] === 'credit' && $this->attributes['amount'] < 0) {
            $this->attributes['amount'] = $this->attributes['amount'] * -1;
        }
        return parent::save($options);
    }
}
