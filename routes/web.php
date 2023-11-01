<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyBlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthorProfileController;
use App\Http\Controllers\NewsletterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(MyBlogController::class)->group(function (){
    Route::get('/', 'index')->name('home');
    Route::get('/blog/index', 'allBlog')->name('blog.index');
    Route::get('/blog/details/{id}', 'detail')->name('blog.details');
    Route::get('/category/index/{id}', 'category')->name('category.index');


    Route::post('subscribe-newsletter','subscribeNewsletter')->name('subscribe-newsletter');
});

Route::controller(AboutController::class)->group(function (){
    Route::get('/about/index', 'index')->name('about.index');
});




Route::controller(ContactController::class)->group(function (){
    Route::get('/contact/index', 'index')->name('contact.index');

});








Route::get('/dashboard', function () {
   if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard'); // Redirect admin to the admin.dashboard route
    } else {
       return view('website.home.index');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
});
require __DIR__.'/auth.php';




Route::middleware(['auth','role:admin'])->group(function(){

    Route::controller(AdminController::class)->group(function() {
        Route::get('/admin/dashboard','dashboard')->name('admin.dashboard');
        Route::get('/admin/logout','destroy')->name('admin.logout');
        Route::get('/admin/profile','profile')->name('admin.profile');
        Route::get('/admin/edit','editProfile')->name('admin.edit');
        Route::post('/admin/update','updateProfile')->name('admin.update');
        Route::get('/admin/change-password','changePassword')->name('admin.change-password');
        Route::post('/admin/update-password','updatePassword')->name('admin.update-password');
    });
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/category/add', [CategoryController::class, 'index'])->name('category.add');
        Route::post('/category/new', [CategoryController::class, 'create'])->name('category.new');
        Route::get('/category/manage', [CategoryController::class, 'manage'])->name('category.manage');
        Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    });
    Route::controller(BlogController::class)->group(function(){
        Route::get('/blog/add',  'index')->name('blog.add');
        Route::post('/blog/create',  'create')->name('blog.new');
        Route::get('/blog/manage',  'manage')->name('blog.manage');
        Route::get('/blog/detail/{id}',  'detail')->name('blog.detail');
        Route::get('/blog/edit/{id}',  'edit')->name('blog.edit');
        Route::post('/blog/update/{id}',  'update')->name('blog.update');
        Route::get('/blog/delete/{id}',  'delete')->name('blog.delete');
    });


    Route::controller(AuthorProfileController::class)->group(function (){
        Route::get('/author/add',  'index')->name('author.add');
        Route::post('/author/create',  'create')->name('author.new');
        Route::get('/author/manage',  'manage')->name('author.manage');
        Route::get('/author/edit/{id}',  'edit')->name('author.edit');
        Route::post('/author/update/{id}',  'update')->name('author.update');
    });



     Route::controller(NewsletterController::class)->group(function (){
        Route::get('/subscriber/index',  'index')->name('subscriber.index');
        Route::post('/subscriber/store',  'store')->name('subscriber.store');
        Route::get('/subscriber/delete/{id}',  'delete')->name('subscriber.delete');
        
    });

});




//Route::middleware(['auth','role:website'])->group(function(){
//
//Route::controller(UserController::class)->group(function() {
//    Route::get('/website/dashboard','dashboard')->name('website.dashboard');
//    });
//
//});
