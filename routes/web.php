<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect(route('view.user'));
    })->name('dashboard');
});

// UserController

Route::prefix('admin')->middleware('isAdmin')->group(function () {
    Route::get('/delete/user/{id}', [UserController::class, 'UserDelete'])->name('delete.user');
});
Route::get('/userlist', [UserController::class, 'ViewUserlist'])->name('view.user');
Route::get('/create/user', [UserController::class, 'CreateUser'])->name('create.user');
Route::post('/insert/user', [UserController::class, 'InsertUser'])->name('insert.user');
Route::get('/show/user/{id}', [UserController::class, 'ShowUser'])->name('show.user');
Route::get('/edit/user/{id}', [UserController::class, 'EditUser'])->name('edit.user');
Route::post('/update/user/{id}', [UserController::class, 'UpdateUser'])->name('update.user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');



//  Product Controller

Route::resource('/products', ProductController::class);
// Route::post('product-sortable','ProductController@update');
Route::post('/product-sortable', [ProductController::class, 'update']);
Route::get('/products)', [ProductController::class, 'restoreProduct'])->name('view.products.restore');
Route::post('/products/{id}', [ProductController::class, 'restoreDelete'])->name('products.restore');

