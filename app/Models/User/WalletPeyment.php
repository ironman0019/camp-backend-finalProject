<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WalletPeyment extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
}
