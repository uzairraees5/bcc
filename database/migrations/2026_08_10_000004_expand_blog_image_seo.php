<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('blog_posts')) return;
        Schema::table('blog_posts', function (Blueprint $table) {
            if (!Schema::hasColumn('blog_posts','image_title')) $table->string('image_title')->nullable();
            if (!Schema::hasColumn('blog_posts','image_caption')) $table->text('image_caption')->nullable();
            if (!Schema::hasColumn('blog_posts','image_description')) $table->text('image_description')->nullable();
        });
    }
    public function down(): void
    {
        if (!Schema::hasTable('blog_posts')) return;
        Schema::table('blog_posts', function (Blueprint $table) {
            foreach(['image_title','image_caption','image_description'] as $column) if(Schema::hasColumn('blog_posts',$column)) $table->dropColumn($column);
        });
    }
};
