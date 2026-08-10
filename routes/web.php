<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\SeoViewController;

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/book-walkthrough', [ContactController::class, 'detailedStore'])->name('contact.detailed');

Route::get('/', function () {
    return view('home');
});

Route::get('/about-us', function () {
    return view('about');
});

Route::get('/commercial-cleaning', function () {
    return view('commercial-cleaning');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/locations', function () {
    return view('locations');
});

Route::get('/case-studies', function () {
    return view('casestudies');
});

Route::get('/book-walkthrough', function () {
    return view('bookwalkthrough');
});

Route::get('/seo/meta', [SeoViewController::class, 'renderMeta'])->name('seo.meta');
Route::get('/blog', [BlogController::class, 'publicIndex'])->name('blog.index');
Route::get('/blog/{blogPost:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/category/{category:slug}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [SeoController::class, 'robots'])->name('robots');

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::get('/admin/register', [AdminAuthController::class, 'showRegister'])->name('admin.register');
    Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register.submit');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [SeoController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout.post');
    Route::get('/seo/website', [SeoController::class, 'website'])->name('admin.seo.website');
    Route::post('/seo/website', [SeoController::class, 'storeWebsite'])->name('admin.seo.website.store');
    Route::get('/seo/pages', [SeoController::class, 'pages'])->name('admin.seo.pages');
    Route::get('/blog/posts', [BlogController::class, 'index'])->name('admin.blog.posts');
    Route::get('/blog/posts/create', [BlogController::class, 'create'])->name('admin.blog.posts.create');
    Route::post('/blog/posts', [BlogController::class, 'store'])->name('admin.blog.posts.store');
    Route::get('/blog/posts/{blogPost}/edit', [BlogController::class, 'edit'])->name('admin.blog.posts.edit');
    Route::put('/blog/posts/{blogPost}', [BlogController::class, 'update'])->name('admin.blog.posts.update');
    Route::delete('/blog/posts/{blogPost}', [BlogController::class, 'destroy'])->name('admin.blog.posts.destroy');
    Route::get('/blog/categories', [BlogCategoryController::class, 'index'])->name('admin.blog.categories');
    Route::get('/blog/categories/create', [BlogCategoryController::class, 'create'])->name('admin.blog.categories.create');
    Route::post('/blog/categories', [BlogCategoryController::class, 'store'])->name('admin.blog.categories.store');
    Route::get('/blog/categories/{blogCategory}/edit', [BlogCategoryController::class, 'edit'])->name('admin.blog.categories.edit');
    Route::put('/blog/categories/{blogCategory}', [BlogCategoryController::class, 'update'])->name('admin.blog.categories.update');
    Route::delete('/blog/categories/{blogCategory}', [BlogCategoryController::class, 'destroy'])->name('admin.blog.categories.destroy');
    Route::get('/seo/pages/{seoMeta}/edit', [SeoController::class, 'editPage'])->name('admin.seo.pages.edit');
    Route::put('/seo/pages/{seoMeta}', [SeoController::class, 'updatePage'])->name('admin.seo.pages.update');
    Route::get('/seo/blog', [SeoController::class, 'blog'])->name('admin.seo.blog');
    Route::get('/seo/schema', [SeoController::class, 'schema'])->name('admin.seo.schema');
    Route::get('/seo/redirects', [SeoController::class, 'redirects'])->name('admin.seo.redirects');
    Route::post('/seo/redirects', [SeoController::class, 'storeRedirect'])->name('admin.seo.redirects.store');
    Route::delete('/seo/redirects/{redirect}', [SeoController::class, 'destroyRedirect'])->name('admin.seo.redirects.destroy');
    Route::get('/seo/404', [SeoController::class, 'fourOhFour'])->name('admin.seo.four-oh-four');
    Route::get('/seo/sitemap', [SeoController::class, 'sitemap'])->name('admin.seo.sitemap');
    Route::get('/seo/robots', [SeoController::class, 'robots'])->name('admin.seo.robots');
    Route::get('/seo/reports', [SeoController::class, 'reports'])->name('admin.seo.reports');
    Route::get('/seo/integrations', [SeoController::class, 'integrations'])->name('admin.seo.integrations');
    Route::post('/seo/pages/{seoMeta}/faq', [SeoController::class, 'storeFaq'])->name('admin.seo.faq.store');
});