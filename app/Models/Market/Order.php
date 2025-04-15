<?php

namespace App\Models\Market;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    // Relation with order items table
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relation with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
