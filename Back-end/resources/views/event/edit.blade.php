@extends('layouts.app')
@section('head')
    <title>Edit</title>
@endsection
@section('content')
   <h1>EDIT EVENT</h1> 

    <form action="{{route('event.update', $event->id)}}" method="POST">
    
        @csrf
        @method("PUT")
    
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $event -> name }}">
        <br>
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{ $event -> description }}">
        <label for="start_date">Start date:</label>
        <input type="datetime-local" id="start_date" name="start_date" value="{{ $event -> start_date}}">
        <br>
        <label for="end_date">End date:</label>
        <input type="datetime-local" id="end_date" name="end_date"  value="{{ $event -> end_date}}">
        <br>
        <br>

        <input type="submit" value="UPDATE">EDIT EVENT</input>

    </form>
@endsection