<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [NoteController::class, 'index']);
Route::livewire('/', 'pages::notes');
// Route::get('/note/{id}', [NoteController::class, 'show']);
Route::livewire('/note/{id}', 'pages::note');