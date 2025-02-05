<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the notes.
     */
    public function index()
    {
        $user_id=Auth::id();
        $notes = Note::where('user_id',$user_id)->get(); // Fetch all notes
        dd($notes);
        return response()->json($notes); // Return as JSON
    }

    /**
     * Show the form for creating a new note.
     */
    public function create()
    {
        // Not needed for API-based CRUD
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
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json(['message' => 'Note created successfully!', 'note' => $note], 201);
    }

    /**
     * Display the specified note.
     */
    public function show(Note $note)
    {
        return response()->json($note);
    }

    /**
     * Show the form for editing the specified note.
     */
    public function edit(Note $note)
    {
        // Not needed for API-based CRUD
    }

    /**
     * Update the specified note in storage.
     */
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
        ]);

        $note->update($request->all());

        return response()->json(['message' => 'Note updated successfully!', 'note' => $note]);
    }

    /**
     * Remove the specified note from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return response()->json(['message' => 'Note deleted successfully!']);
    }
}
