<?php

namespace App\Models\Market;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, Sluggable;

    protected $guarded = ['id'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    } 

    // Relation with tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Relation with product category
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    // Relation with product items
    public function productItems()
    {
        return $this->hasMany(ProductItem::class);
    }

}
