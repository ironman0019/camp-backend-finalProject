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

    // Search filter
    public function scopeFilter($query, array $filters)
    {
        $query->when(filled($filters['search'] ?? null), function ($q) use ($filters) {
            $q->where(function ($subquery) use ($filters) {
                $subquery->where('name', 'like', '%' . $filters['search'] . '%')
                         ->orWhere('description', 'like', '%' . $filters['search'] . '%');
            });
        });
    
        $query->when(filled($filters['product-category'] ?? null), function ($q) use ($filters) {
            $q->whereRelation('productCategory', 'name', '=', $filters['product-category']);
        });

        $query->when(filled($filters['tag'] ?? null), function ($q) use ($filters) {
            $q->whereHas('tags', function ($q) use ($filters) {
                $q->where('name', $filters['tag']);
            });
        });
    
        $query->when(isset($filters['marketable']) && $filters['marketable'] == 1, function ($q) {
            $q->where('marketable', 1);
        });
    
        $query->when(isset($filters['image-products']) && $filters['image-products'] == 1, function ($q) {
            $q->whereNotNull('image');
        });
    
        if (filled($filters['start-price'] ?? null) || filled($filters['end-price'] ?? null)) {
            $query->when(filled($filters['start-price']), function ($q) use ($filters) {
                $q->where('price', '>=', $filters['start-price']);
            });
        
            $query->when(filled($filters['end-price']), function ($q) use ($filters) {
                $q->where('price', '<=', $filters['end-price']);
            });
        }

        // Sort
        if (filled($filters['sort'] ?? null)) {
            switch ($filters['sort']) {
                case 'expensive':
                    $query->orderBy('price', 'desc');
                    break;
                case 'cheap':
                    $query->orderBy('price', 'asc');
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'most-viewed':
                    $query->orderBy('view_count', 'desc');
                    break;
                case 'sold-number':
                    $query->orderBy('sold_number', 'desc');
                    break;
                default:
                    break;
            }
        } else {
            $query->latest();
        }
    }
    

}
