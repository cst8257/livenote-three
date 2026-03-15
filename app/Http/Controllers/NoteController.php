<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return view('notes', ['notes' => $notes]);
    }

    public function show($id)
    {
        $note = Note::findOrFail($id);
        return view('note', $note);
    }
}
