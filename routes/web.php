<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::middleware('islogin')->group(function(){
    Route::get('/dashboard/dashboard', [TodoController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/createtodo', [TodoController::class, 'createtodo']);
    Route::post('/store', [TodoController::class, 'store']);
    Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('edit');
    Route::patch('/dashboard/update/{id}', [TodoController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [TodoController::class, 'destroy'])->name('delete');
    Route::patch('/complated/{id}', [TodoController::class, 'updateComplated'])->name('update-complated');

});
Route::middleware('isGuest')->group(function(){
    Route::get('/', [TodoController::class, 'index']);
    Route::get('/register', [TodoController::class, 'register'])->name('register-page');
    Route::get('/login', [TodoController::class, 'login']);
    Route::post('/login', [TodoController::class, 'loginAccount']);
    Route::post('/register/input', [TodoController::class, 'registerAccount'])->name('register.input');
    
});
Route::get('/new', [TodoController::class, 'new']);
Route::get('/logout', [TodoController::class, 'logout']);

