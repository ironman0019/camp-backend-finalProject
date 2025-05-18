<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'status'];

    // Relation with ticket admins
    public function ticketAdmins(): HasMany
    {
        return $this->hasMany(TicketAdmin::class);
    }


}
