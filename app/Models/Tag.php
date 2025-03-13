<?php

namespace App\Models;

use App\Models\Market\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'status'];

    // Relations
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
