<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    public function variants() : HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function images() : HasMany
    {
        return $this->hasMany(Image::class);
    }
}
