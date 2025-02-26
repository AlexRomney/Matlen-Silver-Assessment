<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PostCardController,
    ViewPostCardController
};

Route::get('/', [PostCardController::class, 'show'])->name('post-card');

Route::prefix('post-card')->group(function () {
    Route::post('create', [PostCardController::class, 'create'])->name('post-card-create');
    Route::get('view/{id}', ViewPostCardController::class)->name('view-post-card');
});
