<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function goToCreate(){
        return view("create");
    }
    public function createNote(Request $request)
    {
        $request->validate([
            'note_title' => 'required',
            'note_content' => 'required',
        ]);

        $user = Auth::user();
        $note = new Note();
        $note->idUser = $user->id;
        $note->title = $request->input('note_title');
        $note->note = $request->input('note_content');
        $note->save();

        return redirect()->back()->with('success', 'Note created successfully.');
    }

    public function goToNotes(){
        $user = Auth::user();
        $notes = Note::where('idUser', $user->id)->get();
        return view("notes", compact('notes'));
    }

}

