<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogCategory extends Model
{
    protected $fillable = ['name','slug','description','seo_title','meta_description','canonical_url','robots_index','robots_follow','is_active'];
    protected $casts = ['robots_index' => 'boolean','robots_follow' => 'boolean','is_active' => 'boolean'];
    public function posts(): HasMany { return $this->hasMany(BlogPost::class, 'category_id'); }
}
