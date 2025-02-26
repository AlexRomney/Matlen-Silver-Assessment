<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PostCardController
};

Route::get('/', [PostCardController::class, 'show'])->name('post-card');

Route::prefix('post-card')->group(function () {
    Route::post('create', [PostCardController::class, 'create'])->name('post-card-create');
});
