@extends('layouts.app')
@section('head')
    <title>Show</title>
@endsection
@section('content')
    {{-- <img src="{{ asset('storage/' . $project -> image) }}" alt="" width="300px"> --}}

    <a href="{{ route('event.edit', $event -> id) }}">EDIT ME</a>

    <div >
        {{$event->name}}
    </div>

    <div>
        {{$event->start_date}}
    </div>

    <div>
        {{$event->end_date}}
    </div>

    <div>
        {{$event->description}}
    </div>

    <form action="{{route('event.delete' , $event -> id)}}" method="POST">
    
        @csrf
        @method('DELETE')

        <button type="submit">DELETE EVENT</button>
    
    </form>

@endsection