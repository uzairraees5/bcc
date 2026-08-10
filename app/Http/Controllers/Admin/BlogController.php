<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::query()->orderByDesc('created_at')->get();

        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        $categories = BlogCategory::query()->orderBy('name')->get();

        return view('admin.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blog_posts,slug'],
            'content' => ['nullable', 'string'],
            'excerpt' => ['nullable', 'string'],
            'status' => ['nullable', 'string', 'max:50'],
            'category_id' => ['nullable', 'exists:blog_categories,id'],
            'category' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'image_alt_text' => ['nullable', 'string', 'max:255'],
            'published_at' => ['nullable', 'date'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['author_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('blog-images', 'public');
            $data['image_path'] = $path;
        }

        if (empty($data['category_id']) && !empty($data['category'])) {
            $category = BlogCategory::firstOrCreate([
                'slug' => Str::slug($data['category']),
            ], [
                'name' => $data['category'],
                'description' => null,
            ]);
            $data['category_id'] = $category->id;
        }

        BlogPost::create($data);

        return redirect()->route('admin.blog.posts')->with('success', 'Blog post created.');
    }

    public function edit(BlogPost $blogPost)
    {
        $categories = BlogCategory::query()->orderBy('name')->get();

        return view('admin.blog.edit', compact('blogPost', 'categories'));
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blog_posts,slug,' . $blogPost->id],
            'content' => ['nullable', 'string'],
            'excerpt' => ['nullable', 'string'],
            'status' => ['nullable', 'string', 'max:50'],
            'category_id' => ['nullable', 'exists:blog_categories,id'],
            'category' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'image_alt_text' => ['nullable', 'string', 'max:255'],
            'published_at' => ['nullable', 'date'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);

        if ($request->hasFile('image')) {
            if ($blogPost->image_path && Storage::disk('public')->exists($blogPost->image_path)) {
                Storage::disk('public')->delete($blogPost->image_path);
            }

            $path = $request->file('image')->store('blog-images', 'public');
            $data['image_path'] = $path;
        }

        if (empty($data['category_id']) && !empty($data['category'])) {
            $category = BlogCategory::firstOrCreate([
                'slug' => Str::slug($data['category']),
            ], [
                'name' => $data['category'],
                'description' => null,
            ]);
            $data['category_id'] = $category->id;
        }

        $blogPost->fill($data)->save();

        return redirect()->route('admin.blog.posts')->with('success', 'Blog post updated.');
    }

    public function destroy(BlogPost $blogPost)
    {
        if ($blogPost->image_path && Storage::disk('public')->exists($blogPost->image_path)) {
            Storage::disk('public')->delete($blogPost->image_path);
        }

        $blogPost->delete();

        return redirect()->route('admin.blog.posts')->with('success', 'Blog post deleted.');
    }

    public function publicIndex()
    {
        $posts = BlogPost::query()->where('status', 'published')->whereNotNull('published_at')->orderByDesc('published_at')->paginate(10);

        return view('blog.index', compact('posts'));
    }

    public function show(BlogPost $blogPost)
    {
        if ($blogPost->status !== 'published') {
            abort(404);
        }

        return view('blog.show', compact('blogPost'));
    }

    public function category(BlogCategory $category)
    {
        $posts = $category->posts()->where('status', 'published')->whereNotNull('published_at')->orderByDesc('published_at')->paginate(10);

        return view('blog.category', compact('category', 'posts'));
    }
}
