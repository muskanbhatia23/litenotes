<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Notebook;

class NoteController extends Controller
{
    /**
     * Display a listing of the notes.
     */
    public function index()
    {
        $user_id = Auth::id();
        //$notes = Note::where('user_id', $user_id)->latest('updated_at')->paginate(10); // Fetch all notes--after making relationship
       $notes = Auth::user()->notes()->latest('updated_at')->paginate(10);
       //inverse relationship
       $notes = NOte::whereBelongsTo(Auth::user())->latest('updated_at')->paginate(10);
        return view('notes.index')->with('notes', $notes); 
        //with(); to access notes
        //dd($notes);//->it prevent and dumps the data and also it stops the view from execution
        //$notes->each(function($note)   {
        //  dump($note->title);
        //});

    }

    /**
     * Show the form for creating a new note.
     */
    public function create()
    {
        $notebooks = Notebook::where('user_id', Auth::id())->get();
        return view('notes.create')->with('notebooks', $notebooks); // Not needed for API-based CRUD
    }

    /**
     * Store a newly created note in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note = Note::create([
            'user_id' => Auth::id(),
            'uuid' => Str::uuid(),
            'title' => $request->title,
            'content' => $request->content,
            'notebook_id' => $request->notebook_id ?? null,
        ]);
        return redirect()->route('notes.index')->with('success', 'Note saved successfully!');
    }

    /**
     * Display the specified note.
     */
    public function show(Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            abort(403);
        }

        return view('notes.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified note.
     */
    public function edit(Note $note)
    {
        // Not needed for API-based CRUD
        
        if ($note->user_id !== Auth::id()) {
            abort(403);
        }
    
        $notebooks = Notebook::where('user_id', Auth::id())->get();
        return view('notes.edit', ['note' => $note, 'notebooks'=>$notebooks]);
    }

    /**
     * Update the specified note in storage.
     */
    public function update(Request $request, Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            abort(403);
        }
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            
        ]);

        $note->update([
            'title' => $request->title,
            'content' => $request->content,
            'notebook_id'=>$request->notebook_id
        ]);

        // return to_route('notes.show',$note)->json(['message' => 'Note updated successfully!', 'note' => $note]);
        return redirect()->route('notes.show', $note)->with('success', 'Note updated successfully!');
    }

    /**
     * Remove the specified note from storage.
     */
    public function destroy(Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            abort(403);
        }
        $note->delete();
        return redirect()->route('notes.index', $note)->with('success', 'Note updated successfully!');
    }
}
