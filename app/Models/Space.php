<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Space extends Model
{
    use HasFactory;

    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'space_id', 'id');
    }
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function type(): BelongsTo
    {
        return $this->belongsTo(Types::class, 'type_id');
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comments::class, 'space_id');
    }
}
