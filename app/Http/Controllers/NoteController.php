<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $items = Note::query()->get();
        return view('notes.index', [
            'items' => $items
        ]);
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
        return redirect('/');
    }




}
