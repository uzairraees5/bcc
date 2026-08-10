<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageViewLog extends Model
{
    protected $fillable = [
        'requested_url',
        'referrer',
        'user_agent',
        'ip_address',
        'first_seen',
        'last_seen',
        'hit_count',
    ];
}
