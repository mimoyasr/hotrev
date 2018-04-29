@extends('layouts.app')
@section('content')


<h1> Hello from Profile {{ $user->name }}.</h1>

<form action="/profiles/{{ $client->id }}/edit">
    <input type="submit" value="Edit Profile" />
</form>

@endsection