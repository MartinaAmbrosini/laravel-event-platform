<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Event;
use App\Models\Tag;
// use App\Models\User;

// use App\Models\User;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return view('event.home', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $tags = Tag::all();
        // $events = Event::all();

        return view('event.create', compact(/*'events' ,*/ 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $data = $request->all();
        $user = Auth::user();
    

        $newEvent = new Event();
        $newEvent->name = $data['name'];
        $newEvent->description = $data['description'];
        $newEvent->start_date = $data['start_date'];
        $newEvent->end_date = $data['end_date'];
        $newEvent->user()->associate($user);

        $newEvent->save();
    
        // Aggiunta dei tag all'evento
        $newEvent->tags()->attach($data['tag_id']);
    
        return redirect()->route('event.show', $newEvent->id);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);

        return view('event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $event = Event::find($id);

    //     $tags = Tag::all();

    //     return view('event.edit', compact('event', 'tags'));
    // }

    public function edit($id)
    {
        $event = Event::find($id);

        if($event->user_id !== Auth::id()) {
            return redirect()->route('event.show', $event -> id)->with('error', 'Non hai il permesso di modificare questo evento.');
        }

        $tags = Tag::all();

        return view('event.edit', compact('event', 'tags'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        // $type = Type::find($data['type_id']);

        $event = Event::find($id);
        $event->name = $data['name'];
        $event->description = $data['description'];
        $event->start_date = $data['start_date'];
        $event->end_date = $data['end_date'];

        // $event->type()->associate($type);

        $event->save();

        // $event->tags()->sync($data['tags']);

        return redirect()->route('event.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);

        if($event->user_id !== Auth::id()) {
            return redirect()->route('event.show', $event -> id)->with('error', 'Non hai il permesso di eliminare questo evento.');
        }

        $event->tags()->detach();

        $event->delete();

        return redirect()->route('event.home')->with('success', 'Evento eliminato!');
    }
}
