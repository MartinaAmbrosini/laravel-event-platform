<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Tag;

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
    public function create()
    {
        // $tags = Tag::all();
        $events = Event::all();

        return view('event.create', compact('events'));
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
        // $image = $data['image'];
        // $image_path = Storage::disk('public')->put('images', $image);
        // $type = Type::find($data['type_id']);

        $newEvent = new Event();

        $newEvent->name = $data['name'];
        $newEvent->description = $data['description'];
        // $newEvent->image = $image_path;
        $newEvent->start_date = $data['start_date'];
        $newEvent->end_date = $data['end_date'];

        $newEvent->save();

        // $newEvent->tags()->attach($data['tag_id']);

        return redirect()->route('event.home');
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
    public function edit($id)
    {
        // $tags = Tag::all();

        $event = Event::find($id);

        return view('event.edit', compact('event'));
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

        // $event->technologies()->sync($data['technology_id']);

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

        $event->delete();

        return redirect()->route('event.home')->with('success', 'Evento eliminato!');
    }
}
