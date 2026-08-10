<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('seo_metas')) {
            Schema::table('seo_metas', function (Blueprint $table) {
                if (!Schema::hasColumn('seo_metas', 'seoable_type')) $table->string('seoable_type')->nullable()->index();
                if (!Schema::hasColumn('seo_metas', 'seoable_id')) $table->unsignedBigInteger('seoable_id')->nullable()->index();
                if (!Schema::hasColumn('seo_metas', 'page_title')) $table->string('page_title')->nullable();
                if (!Schema::hasColumn('seo_metas', 'title')) $table->string('title')->nullable();
                if (!Schema::hasColumn('seo_metas', 'meta_description')) $table->text('meta_description')->nullable();
                if (!Schema::hasColumn('seo_metas', 'focus_keyword')) $table->string('focus_keyword')->nullable();
                if (!Schema::hasColumn('seo_metas', 'slug')) $table->string('slug')->nullable()->index();
                if (!Schema::hasColumn('seo_metas', 'canonical_url')) $table->string('canonical_url')->nullable();
                if (!Schema::hasColumn('seo_metas', 'robots_index')) $table->boolean('robots_index')->default(true);
                if (!Schema::hasColumn('seo_metas', 'robots_follow')) $table->boolean('robots_follow')->default(true);
                if (!Schema::hasColumn('seo_metas', 'og_image')) $table->string('og_image')->nullable();
                if (!Schema::hasColumn('seo_metas', 'image_alt_text')) $table->string('image_alt_text')->nullable();
                if (!Schema::hasColumn('seo_metas', 'og_title')) $table->string('og_title')->nullable();
                if (!Schema::hasColumn('seo_metas', 'og_description')) $table->text('og_description')->nullable();
                if (!Schema::hasColumn('seo_metas', 'h1')) $table->string('h1')->nullable();
                if (!Schema::hasColumn('seo_metas', 'seo_content')) $table->longText('seo_content')->nullable();
                if (!Schema::hasColumn('seo_metas', 'custom_schema')) $table->longText('custom_schema')->nullable();
                if (!Schema::hasColumn('seo_metas', 'schema_type')) $table->string('schema_type')->nullable();
                if (!Schema::hasColumn('seo_metas', 'page_type')) $table->string('page_type')->nullable()->index();
                if (!Schema::hasColumn('seo_metas', 'is_active')) $table->boolean('is_active')->default(true);
            });
        }

        if (Schema::hasTable('blog_posts')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                if (!Schema::hasColumn('blog_posts', 'category_id')) $table->unsignedBigInteger('category_id')->nullable()->index();
                if (!Schema::hasColumn('blog_posts', 'image_alt_text')) $table->string('image_alt_text')->nullable();
                if (!Schema::hasColumn('blog_posts', 'image_title')) $table->string('image_title')->nullable();
                if (!Schema::hasColumn('blog_posts', 'image_caption')) $table->text('image_caption')->nullable();
                if (!Schema::hasColumn('blog_posts', 'image_description')) $table->text('image_description')->nullable();
            });
        }
    }

    public function down(): void
    {
        // Existing installations may have had these fields before this migration,
        // so no destructive rollback is performed.
    }
};
