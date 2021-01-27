<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExampleController;
use Illuminate\Support\Facades\Route;

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
Route::get('/example1', [ExampleController::class, 'example1']);
Route::get('/example2', [ExampleController::class, 'example2']);

// CRUD
// create
// read
// update
// delete
// convention
// ProductController
Route::get('categories/example', [CategoryController::class, 'example']);
Route::resource('categories', CategoryController::class);
