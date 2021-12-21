<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoriesController;
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


Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth'])->name('dashboard');


Route::get('/', function () {
    return view('index');
});

Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

Route::get('404', function () {
    return view('404');
});

Route::get('blank', function () {
    return view('blank');
});
Route::get('buttons', function () {
    return view('buttons');
});

Route::get('forgot-password', function () {
    return view('forgot-password');
});

Route::get('tables', function () {
    return view('tables');
});

Route::get('cards', function () {
    return view('cards');
});
Route::get('charts', function () {
    return view('charts');
});
// Routing of the categories
Route::get('categories', [categoriesController::class, 'index'])->name('categories');
Route::post('categories', [categoriesController::class, 'store']);
Route::get('categories/delete/{id}', [categoriesController::class, 'destroy']);
Route::get('categories/status/{id}', [categoriesController::class, 'show']);
Route::get('categories/update/{id}', [categoriesController::class, 'edit']);
Route::post('categories/update', [categoriesController::class, 'update']);





require __DIR__ . '/auth.php';
