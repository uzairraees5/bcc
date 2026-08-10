<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seo_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('default_title')->nullable();
            $table->text('default_description')->nullable();
            $table->text('header_scripts')->nullable();
            $table->text('body_scripts')->nullable();
            $table->text('footer_scripts')->nullable();
            $table->string('google_analytics')->nullable();
            $table->string('google_tag_manager')->nullable();
            $table->string('meta_pixel')->nullable();
            $table->string('microsoft_clarity')->nullable();
            $table->string('default_robots')->default('index,follow');
            $table->string('default_canonical_base')->nullable();
            $table->boolean('schema_org_enabled')->default(true);
            $table->boolean('schema_local_business_enabled')->default(true);
            $table->timestamps();
        });

        Schema::create('seo_metas', function (Blueprint $table) {
            $table->id();
            $table->morphs('seoable');
            $table->string('title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('focus_keyword')->nullable();
            $table->string('slug')->nullable();
            $table->string('canonical_url')->nullable();
            $table->boolean('robots_index')->default(true);
            $table->boolean('robots_follow')->default(true);
            $table->string('og_image')->nullable();
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('h1')->nullable();
            $table->longText('seo_content')->nullable();
            $table->longText('custom_schema')->nullable();
            $table->string('schema_type')->nullable();
            $table->string('page_type')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('faq_items', function (Blueprint $table) {
            $table->id();
            $table->morphs('faqable');
            $table->string('question');
            $table->text('answer')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('redirect_rules', function (Blueprint $table) {
            $table->id();
            $table->string('source_url');
            $table->string('destination_url');
            $table->string('redirect_type')->default('301');
            $table->boolean('is_active')->default(true);
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('page_view_logs', function (Blueprint $table) {
            $table->id();
            $table->string('requested_url');
            $table->string('referrer')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamp('first_seen')->nullable();
            $table->timestamp('last_seen')->nullable();
            $table->integer('hit_count')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_view_logs');
        Schema::dropIfExists('redirect_rules');
        Schema::dropIfExists('faq_items');
        Schema::dropIfExists('seo_metas');
        Schema::dropIfExists('seo_settings');
    }
};
