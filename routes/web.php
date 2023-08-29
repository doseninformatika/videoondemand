<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/video', [App\Http\Controllers\VideoController::class, 'index'])->name('videoindex');
Route::get('/newvideo', [App\Http\Controllers\VideoController::class, 'newvideo'])->name('newvideo');
Route::post('/video', [App\Http\Controllers\VideoController::class, 'store'])->name('storevideo');
Route::middleware('auth')->group(function(){
  Route::get('/channel/{channel}/edit', [App\Http\Controllers\ChannelController::class, 'edit'])->name('channel.edit');
});
