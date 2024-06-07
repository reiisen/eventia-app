@extends('app')

@section('content')
    <div class='flex flex-row w-[800px] h-[600px] m-auto shadow-lg'>
        <form action="/auth/login" method="POST" class='flex flex-col'>
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <div class='bg-green-200 flex-1'></div>
    </div>
@endsection
