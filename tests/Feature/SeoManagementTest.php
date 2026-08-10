<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class SeoManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_dashboard_requires_admin_access(): void
    {
        $user = User::factory()->create([
            'is_admin' => false,
        ]);

        $this->actingAs($user)
            ->get('/admin')
            ->assertRedirect('/');
    }

    public function test_unauthenticated_admin_access_redirects_to_admin_login(): void
    {
        $this->get('/admin')
            ->assertRedirect('/admin/login');
    }

    public function test_admin_can_login_and_access_dashboard(): void
    {
        $user = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'is_admin' => true,
        ]);

        $this->post('/admin/login', [
            'email' => 'admin@example.com',
            'password' => 'password123',
        ])->assertRedirect('/admin');

        $this->assertAuthenticatedAs($user);

        $this->get('/admin')->assertOk();
    }

    public function test_seo_settings_can_be_saved(): void
    {
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        $this->actingAs($admin)
            ->post('/admin/seo/website', [
                'site_name' => 'Bright Cleaning',
                'default_title' => 'Bright Cleaning Services',
                'default_description' => 'Professional cleaning services',
                'google_analytics' => 'G-ABC123',
                'google_tag_manager' => 'GTM-XYZ',
                'meta_pixel' => 'pixel-id',
                'microsoft_clarity' => 'clarity-id',
            ])
            ->assertRedirect('/admin/seo/website');
    }

    public function test_admin_pages_view_renders_without_error(): void
    {
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        $this->actingAs($admin)
            ->get('/admin/seo/pages')
            ->assertOk()
            ->assertSee('Page SEO');
    }

    public function test_admin_can_update_page_seo(): void
    {
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        $page = \App\Models\SeoMeta::create([
            'title' => 'Original Title',
            'slug' => '/home',
            'page_type' => 'page',
            'is_active' => true,
        ]);

        $this->actingAs($admin)
            ->put('/admin/seo/pages/' . $page->id, [
                'title' => 'Updated SEO Title',
                'meta_description' => 'Updated page description',
                'focus_keyword' => 'cleaning services',
            ])
            ->assertRedirect('/admin/seo/pages');

        $this->assertDatabaseHas('seo_metas', [
            'id' => $page->id,
            'title' => 'Updated SEO Title',
            'meta_description' => 'Updated page description',
            'focus_keyword' => 'cleaning services',
        ]);
    }
}
