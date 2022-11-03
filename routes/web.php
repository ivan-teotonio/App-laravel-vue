<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use \App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('/about',function(){
    return Inertia::render('About',[
        'name' => 'Ivan'
    ]);
})->name('about');

Route::get('/home',[PostController::class,'index'])->name('home');

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return Inertia::render('Dashboard');
//    })->name('dashboard');
//});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[PostController::class,'index'])->name('dashboard');
    Route::get('/dashboard/create',[PostController::class,'create'])->name('dashboard.create');
    Route::post('/dashboard/store',[PostController::class,'store'])->name('dashboard.store');
    Route::delete('/dashboard/destroy/{id}',[PostController::class,'destroy'])->name('dashboard.destroy');
    Route::get('/dashboard/edit/{id}',[PostController::class,'edit'])->name('dashboard.edit');
    Route::put('/dashboard/update/{id}',[PostController::class,'update'])->name('dashboard.update');
});


