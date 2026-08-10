<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class FaqItem extends Model
{
    protected $fillable = [
        'faqable_type',
        'faqable_id',
        'question',
        'answer',
        'sort_order',
        'is_active',
    ];

    public function faqable(): MorphTo
    {
        return $this->morphTo();
    }
}
