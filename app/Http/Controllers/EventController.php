<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = auth()->user()->events()->latest()->get();
        return view('blogs.event', compact('events'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'participants' => 'required|string',
        ]);

        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'url' => Str::slug($request->title) . '-' . uniqid(),
            'user_id' => auth()->id(),
        ]);

        $event->participants()->attach(auth()->id());

        $usernames = array_map('trim', explode(',', $request->participants));
        $otherUsers = \App\Models\User::whereIn('name', $usernames)->get();

        foreach ($otherUsers as $user) {
            $event->participants()->attach($user->id);
        }

        return redirect()->back()->with('success', 'Группа создана!');
    }

    public function show($slug, $id)
    {
        $event = Event::findOrFail($id);
        if ($redirect = $this->checkSlugOrRedirect($slug, $event, 'events.show')) {
            return $redirect;
        }
        $this->authorizeEventAccess($event);

        return view('blogs.event', compact('event'));
    }

    public function showCalendar($slug, $id)
    {
        $event = Event::findOrFail($id);
        if ($redirect = $this->checkSlugOrRedirect($slug, $event, 'events.calendar')) {
            return $redirect;
        }
        $this->authorizeEventAccess($event);

        return view('blogs.calendar', compact('event'));
    }

    public function showChat($slug, $id)
    {
        $event = Event::findOrFail($id);
        if ($redirect = $this->checkSlugOrRedirect($slug, $event, 'events.chat')) {
            return $redirect;
        }
        $this->authorizeEventAccess($event);

        return view('blogs.chat', compact('event'));
    }

    public function showTasks($slug, $id)
    {
        $event = Event::findOrFail($id);
        if ($redirect = $this->checkSlugOrRedirect($slug, $event, 'events.tasks')) {
            return $redirect;
        }
        $this->authorizeEventAccess($event);

        return view('blogs.tasks', compact('event'));
    }

    public function showProjects($slug, $id)
    {
        $event = Event::findOrFail($id);
        if ($redirect = $this->checkSlugOrRedirect($slug, $event, 'events.projects')) {
            return $redirect;
        }
        $this->authorizeEventAccess($event);

        return view('blogs.projects', compact('event'));
    }

    public function edit(Event $event)
    {
        $this->authorizeEvent($event);
        return view('blogs.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $this->authorizeEvent($event);

        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $event->update($data);

        return redirect()->route('blogs.event')->with('success', 'Событие обновлено');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // проверка: только создатель может удалить
        if ($event->user_id !== auth()->id()) {
            abort(403, 'Вы не являетесь создателем этого события.');
        }

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Группа успешно удалена.');
    }

    protected function authorizeEvent(Event $event)
    {
        if ($event->user_id !== auth()->id()) {
            abort(403);
        }
    }

    protected function authorizeEventAccess(Event $event)
    {
        $user = Auth::user();
        $participantIds = $event->participants()->pluck('user_id')->toArray();

        if ($event->user_id !== $user->id && !in_array($user->id, $participantIds)) {
            abort(403, 'У вас нет доступа к этой группе.');
        }
    }

    private function checkSlugOrRedirect($slug, $event, $routeName)
    {
        $actualSlug = Str::slug($event->title);
        if ($slug !== $actualSlug) {
            return redirect()->route($routeName, [
                'slug' => $actualSlug,
                'id' => $event->id,
            ]);
        }
        return null;
    }
}
