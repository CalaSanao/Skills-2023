<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visit extends Model
{
    use HasFactory;


    public function interest_point(): BelongsTo
    {
        return $this->belongsTo(InterestPoint::class, 'interest_point_id');
    }
}
