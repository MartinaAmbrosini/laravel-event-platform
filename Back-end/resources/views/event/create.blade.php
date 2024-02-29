@extends('layouts.app')
@section('content')

<h1>CREATE</h1>

<form action="{{route('event.store')}}" method="POST">

@csrf

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
<br>

<button type="submit">CREATE EVENT</button>

</form>
@endsection