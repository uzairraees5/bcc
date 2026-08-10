<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    protected $fillable = [
        'site_name',
        'default_title',
        'default_description',
        'google_analytics',
        'google_tag_manager',
        'meta_pixel',
        'microsoft_clarity',
        'header_scripts',
        'body_scripts',
        'footer_scripts',
        'default_robots',
        'default_canonical_base',
        'schema_org_enabled',
        'schema_local_business_enabled',
    ];
}
