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
        // dd($request->all());
        $note = new Note();
        // $note->idUser = $user->id;
        $note->title = $request->input('noteTitle');
        $note->note = $request->input('noteContent');
        $note->save();

        return response()->json(['message' => 'Note created successfully','note' => $note], 200);
    }

    public function index(){
        // $user = Auth::user();
        $user = Auth::user();
        $notes = Note::with('user')->where('user_id', 1)->get();
        // dd($notes);
        // $notes= Note::all();
    // dd(Note::with("user")->first());
        return response()->json($notes);
    }

    public function edit($note){
        $singleNote=Note::Find($note);
        return response()->json($singleNote);

    }

    public function update($note, noteUpdateRequest $request){

        $singleNote=Note::Find($note);
        if (!$singleNote) {
            return response()->json(['message' => 'Note not found'], 404);
        }
        $singleNote->update([
            'title'=> $request->input('noteTitle'),
            'note'=> $request->input('noteContent')
        ]);
        return response()->json(['message' => 'Note not found','note' => $singleNote]);

    }

    public function destroy($note){
        $singleNote=Note::Find($note);
        if (!$singleNote){
            return response()->json(['message' => 'Note not found']);


        };
        $singleNote->delete();
        return response()->json(['message' => 'done delete']);
    }

    public function show($id){
        $note=Note::find($id);
        if (!$note) {
            return response()->json(['message' => 'Note not found'], 404);
        }
        return response()->json($note);
    }
}
