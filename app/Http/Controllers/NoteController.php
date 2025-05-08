<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    protected $model = Note::class;

    // todo отображать только принадлежащие текущему пользователю

    public function destroy($id)
    {
        Note::query()->where('id', $id)->delete();
        return redirect('/note');
    }

    public function store(Request $request)
    {
        $note = new Note();
        $note->text = $request->input('text');
        $note->save();
        return redirect('/note');
    }

    /**
     * Меняет значение checked на противоположное
     * и редиректит на / (корневую ссылку)
     */
    public function check($id)
    {
        $a = Note::query()->where('id', $id)->first();
        $a->checked = !$a->checked;
        $a->save();
        return redirect('/note');
    }

    public function destroyAll()
    {
        $notes = Note::where('user_id', auth()->id())->get();
        return view('notes.index', ['notes' => $notes]);
    }
}


