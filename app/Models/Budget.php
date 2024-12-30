<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Budget extends Model
{
    use HasFactory;

    public function user(): belongsTo {
        return $this->belongsTo(User::class);
    }

    public function categories(): HasMany {
        return $this->hasMany(Category::class);
    }

    public function accounts(): HasMany {
        return $this->hasMany(Account::class);
    }

    public function entities(): HasMany {
        return $this->hasMany(Entity::class);
    }

    public function tags(): HasMany {
        return $this->hasMany(Tag::class);
    }
}
