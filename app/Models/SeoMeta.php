<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class SeoMeta extends Model
{
    protected $fillable = [
        'seoable_type','seoable_id','page_title','title','meta_description','focus_keyword','slug','canonical_url','robots_index','robots_follow','og_image','image_alt_text','og_title','og_description','h1','seo_content','custom_schema','schema_type','page_type','is_active',
    ];

    protected $casts = ['robots_index' => 'boolean', 'robots_follow' => 'boolean', 'is_active' => 'boolean'];

    public function seoable(): MorphTo { return $this->morphTo(); }
}
