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
    public function index(){ $posts=BlogPost::with('category')->orderByDesc('created_at')->paginate(20); return view('admin.blog.index',compact('posts')); }
    public function create(){ $categories=BlogCategory::orderBy('name')->get(); return view('admin.blog.create',compact('categories')); }
    public function store(Request $request){ $data=$this->validated($request); $data['slug']=$data['slug'] ?: Str::slug($data['title']); $data['author_id']=auth()->id(); if($request->hasFile('image'))$data['image_path']=$request->file('image')->store('blog-images','public'); if(empty($data['category_id'])&&!empty($data['category']))$data['category_id']=BlogCategory::firstOrCreate(['slug'=>Str::slug($data['category'])],['name'=>$data['category']])->id; unset($data['category']); BlogPost::create($data); return redirect()->route('admin.blog.posts')->with('success','Blog post created.'); }
    public function edit(BlogPost $blogPost){ $categories=BlogCategory::orderBy('name')->get(); return view('admin.blog.edit',compact('blogPost','categories')); }
    public function update(Request $request,BlogPost $blogPost){ $data=$this->validated($request,$blogPost); $data['slug']=$data['slug'] ?: Str::slug($data['title']); if($request->hasFile('image')){if($blogPost->image_path&&Storage::disk('public')->exists($blogPost->image_path))Storage::disk('public')->delete($blogPost->image_path);$data['image_path']=$request->file('image')->store('blog-images','public');} if(empty($data['category_id'])&&!empty($data['category']))$data['category_id']=BlogCategory::firstOrCreate(['slug'=>Str::slug($data['category'])],['name'=>$data['category']])->id; unset($data['category']); $blogPost->fill($data)->save(); return redirect()->route('admin.blog.posts')->with('success','Blog post updated.'); }
    public function destroy(BlogPost $blogPost){if($blogPost->image_path&&Storage::disk('public')->exists($blogPost->image_path))Storage::disk('public')->delete($blogPost->image_path);$blogPost->delete();return back()->with('success','Blog post deleted.');}
    public function publicIndex(){ $posts=BlogPost::published()->with('category')->orderByDesc('published_at')->paginate(10); return view('blog.index',compact('posts')); }
    public function show(BlogPost $blogPost){abort_unless($blogPost->status==='published'&&(!$blogPost->published_at||$blogPost->published_at->lte(now())),404);$blogPost->load(['category','author','seo']);return view('blog.show',compact('blogPost'));}
    public function category(BlogCategory $category){abort_unless($category->is_active??true,404);$posts=$category->posts()->published()->with('category')->orderByDesc('published_at')->paginate(10);return view('blog.category',compact('category','posts'));}
    private function validated(Request $request,?BlogPost $post=null):array{$uniqueSlug='unique:blog_posts,slug'.($post?','.$post->id:'');return $request->validate(['title'=>['required','string','max:255'],'slug'=>['nullable','string','max:255',$uniqueSlug],'content'=>['nullable','string'],'excerpt'=>['nullable','string'],'status'=>['nullable','string','max:50'],'category_id'=>['nullable','exists:blog_categories,id'],'category'=>['nullable','string','max:255'],'image'=>['nullable','image','mimes:jpg,jpeg,png,webp','max:4096'],'image_alt_text'=>['nullable','string','max:255'],'image_title'=>['nullable','string','max:255'],'image_caption'=>['nullable','string'],'image_description'=>['nullable','string'],'published_at'=>['nullable','date']]);}
}
