<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class BlogPost extends Model
{
    protected $fillable = ['title','slug','content','excerpt','status','category','author_id','published_at','image_path','image_alt_text','image_title','image_caption','image_description','category_id'];
    protected $casts = ['published_at' => 'datetime'];
    public function author(): BelongsTo { return $this->belongsTo(User::class, 'author_id'); }
    public function category(): BelongsTo { return $this->belongsTo(BlogCategory::class, 'category_id'); }
    public function seo(): MorphOne { return $this->morphOne(SeoMeta::class, 'seoable'); }
    public function scopePublished($query){ return $query->where('status','published')->where(function($q){$q->whereNull('published_at')->orWhere('published_at','<=',now());}); }
}
