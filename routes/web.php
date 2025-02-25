<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PostCardController
};

Route::get('/', [PostCardController::class, 'index'])->name('post-card');
Route::post('post-card/create', [PostCardController::class, 'create'])->name('post-card-create');
