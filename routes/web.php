<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('frontend.pages.home', [
        'title' => "Page Home"
    ]);
});

Route::get('/dashboard', function (){
    return view('backend.pages.dashboard', [
        'title' => 'Page Dashboard admin'
    ]);
})->middleware('admin');

Route::get('/blog', [BlogController::class, 'index'])->middleware('auth');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');


// filter by name author, status and date;
Route::get('/posts/filter', [BlogController::class, 'filter'])->name('posts.filter')->middleware('auth');
Route::get('/posts/all', [BlogController::class, 'all'])->name('posts.all');


// Login Container
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/register', [LoginController::class, 'register'])->middleware('guest');
Route::post('/regis_account', [LoginController::class, 'regis_account'])->middleware('guest');
Route::post('/logincheck', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);


// Post Controller
Route::get('/allpost', [PostController::class, 'index']);
Route::get('/mypost', [PostController::class, 'mypost'])->middleware('auth');
Route::get('/filters', [PostController::class, 'filters'])->name('filters');
Route::get('/searchs', [PostController::class, 'searchs'])->name('searchs');
Route::get('/smypost', [ExampleController::class, 'smypost'])->name('smypost');