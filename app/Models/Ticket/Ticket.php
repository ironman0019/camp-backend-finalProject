<?php

namespace App\Models\Ticket;

use App\Enums\TicketStatusEnum;
use App\Models\User;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $guarded = [
        'id',
        'reference_id',
        'user_id',
        'category_id',
        'parent_id',
        'subject',
        'body',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Casting
    protected function casts(): array
    {
        return [
            'status' => TicketStatusEnum::class
        ];
    }

//    protected $cascadeDeletes = ['children'];

    // Relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(TicketAdmin::class, 'reference_id')->with('user');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(TicketCategory::class, 'category_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'parent_id')
            ->withDefault([
                'subject' => 'تیکت اصلی'
            ]);
    }

    public function children(): HasMany
    {
        return $this->hasMany(__CLASS__, 'parent_id');
    }


}
