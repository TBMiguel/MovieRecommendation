<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{
    ShowPosts,
    ShowUserPosts
};

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

Route::get('posts', ShowPosts::class)->middleware('auth')->name('posts'); //já aponta para a render
Route::get('user/posts', ShowUserPosts::class)->middleware('auth')->name('userposts');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
