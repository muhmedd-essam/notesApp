<?php

namespace App\Http\Controllers;


use App\Http\Requests\noteStoreRequest;
use App\Http\Requests\noteUpdateRequest;
use App\Models\Note;
use Auth;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function create(){
        return view("create");
    }

    public function store(noteStoreRequest $request){
        $user = Auth::user();
        $note = new Note();
        $note->idUser = $user->id;
        $note->title = $request->input('noteTitle');
        $note->note = $request->input('noteContent');
        $note->save();

        return redirect(route('notes.index'));
    }

    public function index(){
        $user = Auth::user();
        $notes = Note::where('idUser', $user->id)->get();
        return view("index", ['notes'=>$notes]);
    }

    public function edit($note){
        $singleNote=Note::Find($note);
        return view('edit',['singleNote'=>$singleNote]);

    }

    public function update($note, noteUpdateRequest $request){
        $singleNote=Note::Find($note);
        $singleNote->update([
            'title'=> $request->input('noteTitle'),
            'note'=> $request->input('noteContent')
        ]);
        return redirect(route('notes.index'));

    }

    public function destroy($note){
        $singleNote=Note::Find($note);
        $singleNote->delete();
        return redirect(route('notes.index'));
    }

    public function show($id){
        $note=Note::find($id);
        return view('show', ['note'=>$note]);
    }
}
