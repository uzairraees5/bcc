<?php

namespace Tests\Feature;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AdminBlogPostTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_blog_post(): void
    {
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        $this->actingAs($admin)
            ->post('/admin/blog/posts', [
                'title' => 'Office Cleaning Tips',
                'slug' => 'office-cleaning-tips',
                'content' => 'Keep your office spotless every day.',
                'excerpt' => 'A short summary',
                'status' => 'published',
                'category' => 'Tips',
                'image' => UploadedFile::fake()->create('cover.jpg', 100, 'image/jpeg'),
            ])
            ->assertRedirect('/admin/blog/posts');

        $this->assertDatabaseHas('blog_posts', [
            'slug' => 'office-cleaning-tips',
        ]);

        $this->assertDatabaseHas('blog_posts', [
            'image_path' => $this->app['db']->table('blog_posts')->latest('id')->value('image_path'),
        ]);
    }

    public function test_admin_can_edit_blog_post(): void
    {
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        $post = BlogPost::create([
            'title' => 'Original Title',
            'slug' => 'original-title',
            'content' => 'Original content',
            'status' => 'draft',
            'author_id' => $admin->id,
        ]);

        $this->actingAs($admin)
            ->put('/admin/blog/posts/' . $post->id, [
                'title' => 'Updated Title',
                'slug' => 'updated-title',
                'content' => 'Updated content',
                'excerpt' => 'Updated excerpt',
                'status' => 'published',
                'category' => 'News',
            ])
            ->assertRedirect('/admin/blog/posts');

        $this->assertDatabaseHas('blog_posts', [
            'id' => $post->id,
            'title' => 'Updated Title',
            'slug' => 'updated-title',
            'content' => 'Updated content',
            'status' => 'published',
            'category' => 'News',
        ]);
    }

    public function test_admin_can_delete_blog_post(): void
    {
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        $post = BlogPost::create([
            'title' => 'Delete Me',
            'slug' => 'delete-me',
            'content' => 'Remove this',
            'status' => 'draft',
            'author_id' => $admin->id,
        ]);

        $this->actingAs($admin)
            ->delete('/admin/blog/posts/' . $post->id)
            ->assertRedirect('/admin/blog/posts');

        $this->assertDatabaseMissing('blog_posts', [
            'id' => $post->id,
        ]);
    }

    public function test_admin_can_create_blog_category(): void
    {
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        $this->actingAs($admin)
            ->post('/admin/blog/categories', [
                'name' => 'Commercial Cleaning',
                'slug' => 'commercial-cleaning',
                'description' => 'Commercial cleaning articles',
                'seo_title' => 'Commercial Cleaning Tips',
                'meta_description' => 'Helpful commercial cleaning posts',
            ])
            ->assertRedirect('/admin/blog/categories');

        $this->assertDatabaseHas('blog_categories', [
            'slug' => 'commercial-cleaning',
        ]);
    }

    public function test_public_blog_page_lists_published_posts(): void
    {
        $category = BlogCategory::create([
            'name' => 'Cleaning Tips',
            'slug' => 'cleaning-tips',
        ]);

        BlogPost::create([
            'title' => 'Office Cleaning Tips',
            'slug' => 'office-cleaning-tips',
            'content' => 'A useful article',
            'excerpt' => 'Short summary',
            'status' => 'published',
            'category_id' => $category->id,
            'published_at' => now(),
            'author_id' => 1,
        ]);

        $this->get('/blog')
            ->assertOk()
            ->assertSee('Office Cleaning Tips');
    }
}
