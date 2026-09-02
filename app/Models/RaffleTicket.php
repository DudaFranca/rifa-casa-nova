<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RaffleTicket extends Model
{
    protected $fillable = [
        'number',
        'guest_name',
        'phone',
        'status',
    ];
}
