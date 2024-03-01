@extends('layouts.app')
@section('content')

<h1>CREATE</h1>
@auth
<form action="{{route('event.store')}}" method="POST">

    @csrf
    @method('POST')
    
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    <br>
    <label for="description">Description:</label>
    <input type="text" id="description" name="description">
    <br>
    <label for="start_date">Start date:</label>
    <input type="datetime-local" id="start_date" name="start_date">
    <br>
    <label for="end_date">End date:</label>
    <input type="datetime-local" id="end_date" name="end_date">
    <br>
    @foreach($tags as $tag)
    <div>
        <input type="checkbox" name="tag_id[]" value="{{ $tag -> id }}" id="tag{{ $tag -> id }}">
        <label for="tag{{ $tag -> id }}">{{ $tag -> title }}</label>
        <br>
    </div>
    @endforeach
    <br>
    
    <input type="submit" value="CREA">
    
    </form>
@endauth
@endsection