<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class Ticket extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $guarded = ['id'];

    protected $cascadeDeletes = ['children'];

    
}
