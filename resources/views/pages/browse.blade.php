@extends('app')

@section('content')
<div>
    aloha! this is the browse page! <br>
    ticket: <br>
    @foreach ($tickets as $ticket)
    <a href="{{ url('/tickets/' . $ticket->id) }}">{{ $ticket->name }}</a> <br>
    @endforeach
</div>
@endsection
