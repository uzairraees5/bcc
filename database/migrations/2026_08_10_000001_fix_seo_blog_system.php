<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('seo_metas')) {
            Schema::table('seo_metas', function (Blueprint $table) {
                if (!Schema::hasColumn('seo_metas', 'page_title')) {
                    $table->string('page_title')->nullable()->after('seoable_id');
                }
                if (!Schema::hasColumn('seo_metas', 'image_alt_text')) {
                    $table->string('image_alt_text')->nullable()->after('og_image');
                }
                if (!Schema::hasColumn('seo_metas', 'robots_index')) {
                    $table->boolean('robots_index')->default(true)->after('canonical_url');
                }
                if (!Schema::hasColumn('seo_metas', 'robots_follow')) {
                    $table->boolean('robots_follow')->default(true)->after('robots_index');
                }
            });

            if (Schema::hasColumn('seo_metas', 'title') && Schema::hasColumn('seo_metas', 'page_title')) {
                DB::table('seo_metas')
                    ->where('page_type', 'page')
                    ->whereNull('page_title')
                    ->update(['page_title' => DB::raw('title')]);
            }
        }

        if (Schema::hasTable('blog_categories')) {
            Schema::table('blog_categories', function (Blueprint $table) {
                if (!Schema::hasColumn('blog_categories', 'canonical_url')) {
                    $table->string('canonical_url')->nullable()->after('meta_description');
                }
                if (!Schema::hasColumn('blog_categories', 'robots_index')) {
                    $table->boolean('robots_index')->default(true)->after('canonical_url');
                }
                if (!Schema::hasColumn('blog_categories', 'robots_follow')) {
                    $table->boolean('robots_follow')->default(true)->after('robots_index');
                }
            });
        }

        if (Schema::hasTable('users') && !Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('role')->default('blog_admin')->after('is_admin');
            });

            DB::table('users')
                ->where('is_admin', true)
                ->whereNull('role')
                ->update(['role' => 'seo_admin']);
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('seo_metas')) {
            Schema::table('seo_metas', function (Blueprint $table) {
                foreach (['page_title', 'image_alt_text'] as $column) {
                    if (Schema::hasColumn('seo_metas', $column)) {
                        $table->dropColumn($column);
                    }
                }
            });
        }

        if (Schema::hasTable('blog_categories')) {
            Schema::table('blog_categories', function (Blueprint $table) {
                foreach (['canonical_url', 'robots_index', 'robots_follow'] as $column) {
                    if (Schema::hasColumn('blog_categories', $column)) {
                        $table->dropColumn($column);
                    }
                }
            });
        }

        if (Schema::hasTable('users') && Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('role');
            });
        }
    }
};
