<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalendarNote;


class CalendarNoteController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'text' => 'required|string|max:1000',
        ]);

        CalendarNote::create($validated);

        return redirect()->back()->with('success', 'Заметка добавлена!');
    }

}
