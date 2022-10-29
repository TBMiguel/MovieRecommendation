<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{
    ShowPosts,
    ShowUserPosts,
    EditUserPosts
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

Route::get('posts', ShowPosts::class)->middleware('auth')->name('posts');
Route::get('user/posts', ShowUserPosts::class)->middleware('auth')->name('userposts');

Route::get('posts/edit/{id}', [EditUserPosts::class, 'render'])->middleware('auth')->name('edit');
Route::put('posts/update/{id}', [EditUserPosts::class, 'update'])->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
