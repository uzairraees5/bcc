<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = BlogCategory::withCount('posts')->when($request->filled('q'), fn($q)=>$q->where('name','like','%'.$request->q.'%'))->orderBy('name')->paginate(20)->withQueryString();
        return view('admin.blog.categories.index', compact('categories'));
    }
    public function create() { return view('admin.blog.categories.create'); }
    public function store(Request $request)
    {
        $data=$this->validated($request); $data['slug']=$data['slug'] ?: Str::slug($data['name']); BlogCategory::create($data);
        return redirect()->route('admin.blog.categories')->with('success','Category created.');
    }
    public function quickStore(Request $request)
    {
        $data=$request->validate(['name'=>['required','string','max:255'],'slug'=>['nullable','string','max:255']]);
        $slug=$data['slug'] ?: Str::slug($data['name']);
        $category=BlogCategory::firstOrCreate(['slug'=>$slug],['name'=>$data['name'],'description'=>null,'is_active'=>true]);
        return response()->json(['id'=>$category->id,'name'=>$category->name,'slug'=>$category->slug]);
    }
    public function edit(BlogCategory $blogCategory) { return view('admin.blog.categories.edit', compact('blogCategory')); }
    public function update(Request $request,BlogCategory $blogCategory) { $data=$this->validated($request,$blogCategory); $data['slug']=$data['slug'] ?: Str::slug($data['name']); $blogCategory->fill($data)->save(); return redirect()->route('admin.blog.categories')->with('success','Category updated.'); }
    public function destroy(BlogCategory $blogCategory) { BlogCategory::whereKey($blogCategory->id)->update(['is_active'=>false]); BlogCategory::whereKey($blogCategory->id)->delete(); return back()->with('success','Category deleted.'); }
    private function validated(Request $request,?BlogCategory $category=null): array { return $request->validate(['name'=>['required','string','max:255'],'slug'=>['nullable','string','max:255','unique:blog_categories,slug'.($category?','.$category->id:'')],'description'=>['nullable','string'],'seo_title'=>['nullable','string','max:255'],'meta_description'=>['nullable','string'],'canonical_url'=>['nullable','string','max:255'],'robots_index'=>['nullable','boolean'],'robots_follow'=>['nullable','boolean'],'is_active'=>['nullable','boolean']]); }
}
