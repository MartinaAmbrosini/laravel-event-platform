@extends('layouts.app')
@section('content')

    @if(session('success'))
        <div> {{session('success')}}</div>
    @endif

    
    <h1>EVENTS</h1>
    {{-- @auth --}}
        <a href="{{ route('event.create') }}">CREATE</a>
    {{-- @endauth --}}

        <ul>
            @foreach ($events as $event)
                <li>
                    <a href="{{route('event.show', $event -> id)}}">{{ $event -> name }} :</a>
                    <br>
                    <br>
                    TAGS:
                    <ul>
                        @foreach ($event -> tags as $tag)
                            <li>
                                {{ $tag -> title }}
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
@endsection