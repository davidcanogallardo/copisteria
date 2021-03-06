<?php


namespace App\Http\Controllers;

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

// Route::get('/',[SessionController::class, 'accessSessionData']);
Route::get('/',[CopyCenter::class, 'uwu']);
Route::get('/print',[CopyCenter::class, 'printQueue']);
Route::get('/queue',[CopyCenter::class, 'addToQueue']);

Route::get('/session/reset',[SessionController::class, 'resetSession']);