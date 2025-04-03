<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductItem extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    // Relation with product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}
