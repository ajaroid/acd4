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
// root path
Route::get('/', [ExampleController::class, 'index']);
Route::get('/example1', [ExampleController::class, 'example1']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit']);
