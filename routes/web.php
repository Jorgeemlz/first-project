<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\ProfileController;


Route::view('/', 'pages.welcome') -> name('home');
Route::view('contacto', 'pages.contacto') ->name('contact');
//Route::get('blog', [PostController::class,'index']) -> name('posts.index');
//Route::get('/blog/create', [PostController::class, 'create'])->name('posts.create');
//Route::post('/blog', [PostController::class, 'store'])->name('posts.store');
//Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show');
//Route::get('/blog/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
//Route::patch('/blog/{post}', [PostController::class, 'update'])->name('posts.update');
//Route::delete('/blog/{post}', [PostController:: class, 'destroy'])->name('posts.destroy');


Route::resource('posts', PostController::class,[
    'names'=>'posts',
    'parameters'=>[
        'blog'=>'post',
    ]
]);

Route::view('nosotros', 'pages.nosotros') -> name('nosotros');

// Panel del usuario (igual que en Breeze): solo con sesión iniciada
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Edición de perfil: con sesión iniciada y contraseña confirmada
Route::middleware(['auth', 'password.confirm'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
});

// Login, registro, logout y confirmar contraseña (como en Breeze)
require __DIR__.'/auth.php';
