<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    protected $fillable = [
        'site_name','default_title','default_description','google_analytics','google_tag_manager','meta_pixel','microsoft_clarity',
        'header_scripts','body_scripts','footer_scripts','default_robots','default_canonical_base','schema_org_enabled','schema_local_business_enabled',
        'schema_organization','schema_website','schema_local_business','schema_service','schema_product','schema_breadcrumb','schema_custom',
        'social_og_title','social_og_description','social_og_image','twitter_card','twitter_title','twitter_description','twitter_image',
        'linkedin_title','linkedin_description','linkedin_image','search_console_property','search_console_verification','robots_txt',
    ];
}
