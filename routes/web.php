<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UploadImage;
use App\Http\Livewire\UploadPost;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    
    Route::get('/', function () {
        return view('dashboard');
    })->name('/');

    Route::get('/new-post', [UploadImage::class, 'index'])->name('/new-post');
    Route::get('/new-post-caption', [UploadPost::class, 'index'])->name('/new-post-caption');
    
    /* Route::get('/new-post', function () {
        return view('new-post');
    })->name('/new-post'); */

    // Route::view('new-post-caption','livewire.new-post-caption')->name('/new-post-caption');


});
