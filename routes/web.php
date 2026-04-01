<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::livewire('/login', 'pages::login')->name('login');

Route::middleware('auth')->group(function () {
  // Route::get('/', [NoteController::class, 'index']);
  Route::livewire('/', 'pages::notes');
  Route::livewire('/tag/{tagId}', 'pages::notes');
  // Route::get('/note/{id}', [NoteController::class, 'show']);
  Route::livewire('/note/{id}', 'pages::note');
});
