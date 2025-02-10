<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class TrashedNoteController extends Controller
{
    public function index()
    {
      
       $notes = Note::whereBelongsTo(Auth::user())->onlyTrashed()-> latest('updated_at')->paginate(10);
        return view('notes.index')->with('notes', $notes);
    }

    public function show(Note $note)
    {
        if(!$note->user->is(Auth::user())){ 
                 abort(403);
             }
        return view('notes.show')->with('note',$note);
    }

    public function update(Note $note){
        if(!$note->user->is(Auth::user())){ 
            abort(403);
        }

        $note->restore();
        return to_route('notes.show', $note)->with('success','Note Restored Successfully!');
  
    }

    public function destroy(Note $note){
        if(!$note->user->is(Auth::user())){ 
            abort(403);
        }
        $note->forceDelete();
        return to_route('trashed.index', $note)->with('success','Note Permanently Deleted!');
  
    }
}
