<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('blog_categories')) {
            return;
        }

        Schema::table('blog_categories', function (Blueprint $table) {
            if (!Schema::hasColumn('blog_categories', 'description')) {
                $table->text('description')->nullable();
            }
            if (!Schema::hasColumn('blog_categories', 'seo_title')) {
                $table->string('seo_title')->nullable();
            }
            if (!Schema::hasColumn('blog_categories', 'meta_description')) {
                $table->text('meta_description')->nullable();
            }
            if (!Schema::hasColumn('blog_categories', 'canonical_url')) {
                $table->string('canonical_url')->nullable();
            }
            if (!Schema::hasColumn('blog_categories', 'robots_index')) {
                $table->boolean('robots_index')->default(true);
            }
            if (!Schema::hasColumn('blog_categories', 'robots_follow')) {
                $table->boolean('robots_follow')->default(true);
            }
            if (!Schema::hasColumn('blog_categories', 'is_active')) {
                $table->boolean('is_active')->default(true);
            }
        });
    }

    public function down(): void
    {
        // Non-destructive: these columns may have existed before this migration.
    }
};
