<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminMediasController;
use App\Http\Controllers\AdminGaleryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeSettingController;
use App\Http\Controllers\AboutSettingController;
use App\Http\Controllers\PortfolioSettingController;
use App\Http\Controllers\PricingSettingController;
use App\Http\Controllers\BlogSettingController;
use App\Http\Controllers\ContactSettingController;
use App\Http\Controllers\HeaderFooterSettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VideoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 Route::get("awards_achievements",[HomeController::class, 'about_story'])->name('about.story');
Route::group(['middleware' => 'setlang'], function () {
Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/search', [HomeController::class, 'search'])->name('search');
    Route::get('/changelanguage/{lang}', [HomeController::class, 'changeLanguage'])->name('changeLanguage');
    Route::get('/about-us', [HomeController::class, 'about'])->name('about');
    Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
    Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
    Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
    Route::get('/blog/{blogid}', [HomeController::class, 'blog_detail'])->name('blog-details');
    Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
    // Route::get('/contact', [HomeController::class, 'contactPost'])->name('contact.store');
    //Route::post('/contact', [HomeController::class, 'contactPost'])->name('contactPost');
    Route::get('/videos', [VideoController::class, 'index'])->name('videos');
    Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
    Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);
    
});

    Route::post('/book-appointment', [ClientController::class, 'store'])->name('book.appointment');
    Route::post('/query', [HomeController::class, 'contact_store'])->name('contact.query');
   Route::post('/upload.image', [HomeController::class, 'uploadTinyImage'])->name('upload.image');
   Route::post('/exportBlog', [BlogController::class, 'blogExport'])->name('exportBlog');

    Route::middleware(['author'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/media', AdminMediasController::class);
    
    Route::post('/admin/medianame', [AdminMediasController::class, 'updateAlt'])->name('admin/medianame');
    Route::post('/admin/galleryAltname', [AdminGaleryController::class, 'updateAlt'])->name('admin/galleryAltname');
    
    Route::delete('/delete/media', [AdminMediasController::class, 'deleteMedia'])->name('delete.media');
    Route::resource('admin/galery', AdminGaleryController::class);
    Route::resource('admin/post', PostController::class);
    Route::delete('/delete/post', [PostController::class, 'delete_post'])->name('delete.post');
    Route::resource('admin/category', CategoryController::class);
    Route::delete('/delete/category', [CategoryController::class, 'delete_category'])->name('delete.category');
});


    Route::middleware(['admin'])->group(function () {
    Route::delete('/delete/users', [UserController::class, 'delete_users'])->name('delete.users');
    Route::resource('admin/menu', MenuController::class);
    Route::delete('/delete/menu', [MenuController::class, 'delete_menu'])->name('delete.menu');
    Route::resource('admin/slider', SliderController::class);
    Route::delete('/delete/slider', [SliderController::class, 'delete_slider'])->name('delete.slider');
    Route::resource('admin/service', ServiceController::class);
    Route::delete('/delete/service', [ServiceController::class, 'delete_service'])->name('delete.service');
    Route::resource('admin/testimonial', TestimonialController::class);
    Route::delete('/delete/testimonial', [TestimonialController::class, 'delete_testimonial'])->name('delete.testimonial');
    Route::get('/admin/enquiry', [HomeController::class, 'enquiry'])->name('enquiry.list');
    Route::get('/admin/appoiment', [HomeController::class, 'appoiment'])->name('appoiment.list');
    Route::delete('/delete/appoiment', [HomeController::class, 'delete_appoiment'])->name('delete.appoiment');
    // Route::resource('admin/home', )
    Route::resource('admin/client', ClientController::class);
    Route::delete('/delete/client', [ClientController::class, 'delete_client'])->name('delete.client');
    Route::resource('admin/member', MemberController::class);
    Route::delete('/delete/member', [MemberController::class, 'delete_member'])->name('delete.member');
    Route::resource('admin/pricing', PricingController::class);
    Route::delete('/delete/pricing', [PricingController::class, 'delete_pricing'])->name('delete.pricing');
    Route::resource('admin/project', ProjectController::class);
    Route::delete('/delete/project', [ProjectController::class, 'delete_project'])->name('delete.project');
    Route::resource('admin/language', LanguageController::class);
    Route::delete('/delete/language', [LanguageController::class, 'delete_language'])->name('delete.language');
    Route::resource('admin/project-category', ProjectCategoryController::class);
    Route::delete('/delete/project-category', [ProjectCategoryController::class, 'delete_project_category'])->name('delete.project-category');
    Route::resource('admin/page', PageController::class);
    Route::delete('/delete/page', [PageController::class, 'delete_page'])->name('delete.page');
    Route::get('admin/custom-page', [PageController::class, 'index_custom'])->name('index-custom');
    
    // video 

    // Route::get('/video', [VideoController::class, 'index'])->name('videos');

    // Blog 
    Route::get('add/blog', [BlogController::class, 'addBlog'])->name('add/blog');
    
    Route::get('blog.list', [BlogController::class, 'index'])->name('blog.list');
    Route::post('blog.store', [BlogController::class, 'store'])->name('blog.store');
    Route::post('blog.excel', [BlogController::class, 'excelImport'])->name('blog.excel');
    Route::get('blog.edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/delete/blog', [BlogController::class, 'delete_blog'])->name('delete.blog');
    
    Route::get("galery/images",[HomeController::class, 'images'])->name('galery.images');
    
   
    
    Route::post('blog.updates',[BlogController::class, 'update'])->name('blog.updates');
    Route::get('admin/home-settings', [HomeSettingController::class, 'edit'])->name('home-setting.edit');
    Route::put('admin/home-settings/{langid}/update', [HomeSettingController::class, 'update'])->name('home-setting.update');

    Route::get('admin/about-settings', [AboutSettingController::class, 'edit'])->name('about-setting.edit');
    Route::put('admin/about-settings/{langid}/update', [AboutSettingController::class, 'update'])->name('about-setting.update');

    Route::get('admin/portfolio-settings', [PortfolioSettingController::class, 'edit'])->name('portfolio-setting.edit');
    Route::put('admin/portfolio-settings/{langid}/update', [PortfolioSettingController::class, 'update'])->name('portfolio-setting.update');

    Route::get('admin/pricing-settings', [PricingSettingController::class, 'edit'])->name('pricing-setting.edit');
    Route::put('admin/pricing-settings/{langid}/update', [PricingSettingController::class, 'update'])->name('pricing-setting.update');

    Route::get('admin/blog-settings', [BlogSettingController::class, 'edit'])->name('blog-setting.edit');
    Route::put('admin/blog-settings/{langid}/update', [BlogSettingController::class, 'update'])->name('blog-setting.update');

    Route::get('admin/contact-settings', [ContactSettingController::class, 'edit'])->name('contact-setting.edit');
    Route::put('admin/contact-settings/{langid}/update', [ContactSettingController::class, 'update'])->name('contact-setting.update');

    Route::get('admin/header-footer-settings', [HeaderFooterSettingController::class, 'edit'])->name('headerfooter-setting.edit');
    Route::put('admin/header-footer-settings/{langid}/update', [HeaderFooterSettingController::class, 'update'])->name('headerfooter-setting.update');
    Route::get('admin/header-footer-settings', [HeaderFooterSettingController::class, 'edit'])->name('headerfooter-setting.edit');
  //  Route::get('/action', [HeaderFooterSettingController::class, 'action'])->name('live_search.action');
  

    Route::get('admin/settings', [SettingController::class, 'edit'])->name('setting.edit');
    Route::put('admin/settings/{langid}/update', [SettingController::class, 'update'])->name('setting.update');


});
//  Route::get('blog/{id}', [HomeController::class, 'blogDetail'])->name('blog');
 // sirvices
    Route::get('services/{id}', [HomeController::class, 'servicesDetails'])->name('services');
    Route::get('services/{id?}', [HomeController::class, 'servicesAll'])->name('servicesall');
   
Route::middleware(['XSS'])->group(function () { 
   
});
Route::group(['middleware' => 'setlang'], function () {

    Route::get('/post/{slug}',  [PostController::class, 'show_slug']);
    Route::get('/project/{slug}',  [ProjectController::class, 'show_slug']);
    Route::get('/{slug}',  [PageController::class, 'show_slug']);
});











