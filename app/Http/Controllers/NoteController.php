<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    public $notes = [
        ['title' => 'Note 1', 'content' => 'This is note 1.'],
        ['title' => 'Note 2', 'content' => 'This is note 2.']
    ];

    public function index()
    {
        return view('notes', ['notes' => $this->notes]);
    }

    public function show($index)
    {
        return view('note', $this->notes[$index]);
    }
}
