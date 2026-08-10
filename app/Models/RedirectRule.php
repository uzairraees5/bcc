<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedirectRule extends Model
{
    protected $fillable = [
        'source_url',
        'destination_url',
        'redirect_type',
        'is_active',
        'notes',
    ];
}
