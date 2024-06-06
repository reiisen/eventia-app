@extends('app')

@section('content')
    <div>
        aloha!
        @auth
            {{ Auth::user()->full_name }}
        @endauth
        this is the home page
    </div>
@endsection
