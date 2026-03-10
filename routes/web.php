<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NoteController::class, 'index']);
Route::get('/note/{index}', [NoteController::class, 'show']);
