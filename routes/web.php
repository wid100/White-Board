<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\YearController;
use App\Http\Controllers\Admin\IssueController;
use App\Http\Controllers\Admin\EditornoteController;
use App\Http\Controllers\Admin\HomeSettingController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PolicyStreamController;
use App\Http\Controllers\Admin\PoliticController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\IssueController as FrontendIssueController;

use App\Http\Controllers\User\PostController as UserPostController;


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


Route::get('/clear-cache', function () {
    // Clear route cache
    Artisan::call('route:clear');

    // Optimize class loading
    Artisan::call('optimize');

    // Optimize configuration loading
    Artisan::call('config:cache');

    // Optimize views loading
    Artisan::call('view:cache');

    // Additional optimizations you may want to run

    return "Cache cleared and optimizations done successfully.";
});


Route::get('/', [HomeController::class, 'index'])->name('root');

Route::get('/posts/{post}', [UserPostController::class, 'show'])->name('posts.show');
Route::get('/policy-streams/{policyStream}', [PolicyStreamController::class, 'show'])->name('policy-streams.show');
Route::get('/issue', [FrontendIssueController::class, 'index'])->name('issue');
Route::get('/issues-by-year/{year}', [FrontendIssueController::class, 'getIssuesByYear'])->name('issues.by.year');

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::namespace('App\Http\Controllers')->group(function () {
    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::post('/upload/image', 'PostController@uploadImage')->name('upload.image');

        Route::resource('/year', YearController::class);
        Route::resource('/issue', IssueController::class);
        Route::resource('/editornote', EditornoteController::class);
        Route::resource('/post', PostController::class);
        Route::resource('/policy/stream', PolicyStreamController::class);
        Route::resource('/category', CategoryController::class);
        Route::resource('/tag', TagController::class);
        Route::resource('/home/setting', HomeSettingController::class);
        Route::get('/issue/{id}/posts', [IssueController::class, 'getPosts'])->name('issue.posts');

        Route::resource('/politic', PoliticController::class);
    });
});

// ================================user AND ROUTE=============
Route::namespace('App\Http\Controllers')->group(
    function () {
        Route::group(['as' => 'user.', 'prefix' => 'user', 'namespace' => 'User', 'middleware' => ['auth', 'user']], function () {
            Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
        });
    }
);
// ================================user AND ROUTE END=============
