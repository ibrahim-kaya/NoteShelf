<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\NoteIcon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        $icons = NoteIcon::all();
        return view('homepage', ['notes' => $notes, 'icons' => $icons]);
    }
}
