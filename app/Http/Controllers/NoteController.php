<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    protected $model = Note::class;

    // to-do отображать только принадлежащие текущему пользователю

    public function destroy($id)
    {
        $note = Note::where('id', $id)
            ->where('user_id', auth()->id()) //  Только свою заметку
            ->firstOrFail();

        $note->delete();

        return redirect('/note');
    }

    public function check($id)
    {
        $note = Note::where('id', $id)
            ->where('user_id', auth()->id()) // Только свою заметку
            ->firstOrFail();

        $note->checked = !$note->checked;
        $note->save();

        return redirect('/note');
    }


    public function store(Request $request)
    {
        $note = new Note();
        $note->text = $request->input('text');
        $note->checked = false;
        $note->user_id = auth()->id(); // 💡 Сохраняем текущего пользователя
        $note->save();

        return redirect('/note');
    }

    /**
     * меняет значение checked на противоположное
     * и редиректит на / (корневую ссылку)
     */

    public function destroyAll()
    {
        $notes = Note::where('user_id', auth()->id())->get();
        return view('notes.index', ['notes' => $notes]);
    }

    public function index()
    {
        $notes = Note::where('user_id', auth()->id())->get();

        return view('notes.index', ['items' => $notes]);

    }
}


