<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stock extends Model
{
    use HasFactory;

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }


    public function shelf(): BelongsTo
    {
        return $this->belongsTo(Shelf::class);
    }


}
