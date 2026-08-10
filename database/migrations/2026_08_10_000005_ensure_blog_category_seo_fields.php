<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('blog_categories')) {
            Schema::table('blog_categories', function (Blueprint $table) {
                if (!Schema::hasColumn('blog_categories', 'description')) $table->text('description')->nullable();
                if (!Schema::hasColumn('blog_categories', 'seo_title')) $table->string('seo_title')->nullable();
                if (!Schema::hasColumn('blog_categories', 'meta_description')) $table->text('meta_description')->nullable();
                if (!Schema::hasColumn('blog_categories', 'canonical_url')) $table->string('canonical_url')->nullable();
                if (!Schema::hasColumn('blog_categories', 'robots_index')) $table->boolean('robots_index')->default(true);
                if (!Schema::hasColumn('blog_categories', 'robots_follow')) $table->boolean('robots_follow')->default(true);
                if (!Schema::hasColumn('blog_categories', 'is_active')) $table->boolean('is_active')->default(true);
            });
        }

        if (Schema::hasTable('blog_posts') && Schema::hasColumn('blog_posts', 'category_id')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                // Existing installations may already have a nullable category_id.
                // No new category relationship is created here.
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasTable('blog_categories')) return;

        Schema::table('blog_categories', function (Blueprint $table) {
            foreach (['description','seo_title','meta_description','canonical_url','robots_index','robots_follow','is_active'] as $column) {
                if (Schema::hasColumn('blog_categories', $column)) $table->dropColumn($column);
            }
        });
    }
};
