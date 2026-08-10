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
            if (!Schema::hasColumn('seo_settings','schema_webpage')) $table->longText('schema_webpage')->nullable();
            if (!Schema::hasColumn('seo_settings','schema_faq')) $table->longText('schema_faq')->nullable();
        });
    }

    public function down(): void
    {
        if (!Schema::hasTable('seo_settings')) return;
        Schema::table('seo_settings', function (Blueprint $table) {
            if (Schema::hasColumn('seo_settings','schema_webpage')) $table->dropColumn('schema_webpage');
            if (Schema::hasColumn('seo_settings','schema_faq')) $table->dropColumn('schema_faq');
        });
    }
};
