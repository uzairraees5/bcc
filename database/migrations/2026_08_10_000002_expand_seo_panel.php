<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('seo_settings')) return;

        Schema::table('seo_settings', function (Blueprint $table) {
            $columns = [
                'schema_organization' => fn () => $table->longText('schema_organization')->nullable(),
                'schema_website' => fn () => $table->longText('schema_website')->nullable(),
                'schema_local_business' => fn () => $table->longText('schema_local_business')->nullable(),
                'schema_service' => fn () => $table->longText('schema_service')->nullable(),
                'schema_product' => fn () => $table->longText('schema_product')->nullable(),
                'schema_breadcrumb' => fn () => $table->longText('schema_breadcrumb')->nullable(),
                'schema_custom' => fn () => $table->longText('schema_custom')->nullable(),
                'social_og_title' => fn () => $table->string('social_og_title')->nullable(),
                'social_og_description' => fn () => $table->text('social_og_description')->nullable(),
                'social_og_image' => fn () => $table->string('social_og_image')->nullable(),
                'twitter_card' => fn () => $table->string('twitter_card')->default('summary_large_image'),
                'twitter_title' => fn () => $table->string('twitter_title')->nullable(),
                'twitter_description' => fn () => $table->text('twitter_description')->nullable(),
                'twitter_image' => fn () => $table->string('twitter_image')->nullable(),
                'linkedin_title' => fn () => $table->string('linkedin_title')->nullable(),
                'linkedin_description' => fn () => $table->text('linkedin_description')->nullable(),
                'linkedin_image' => fn () => $table->string('linkedin_image')->nullable(),
                'search_console_property' => fn () => $table->string('search_console_property')->nullable(),
                'search_console_verification' => fn () => $table->string('search_console_verification')->nullable(),
                'robots_txt' => fn () => $table->longText('robots_txt')->nullable(),
            ];

            foreach ($columns as $name => $callback) {
                if (!Schema::hasColumn('seo_settings', $name)) $callback();
            }
        });
    }

    public function down(): void
    {
        if (!Schema::hasTable('seo_settings')) return;
        Schema::table('seo_settings', function (Blueprint $table) {
            foreach ([
                'schema_organization','schema_website','schema_local_business','schema_service','schema_product','schema_breadcrumb','schema_custom',
                'social_og_title','social_og_description','social_og_image','twitter_card','twitter_title','twitter_description','twitter_image',
                'linkedin_title','linkedin_description','linkedin_image','search_console_property','search_console_verification','robots_txt'
            ] as $column) {
                if (Schema::hasColumn('seo_settings', $column)) $table->dropColumn($column);
            }
        });
    }
};
