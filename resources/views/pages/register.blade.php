@extends('app')

@section('content')
    <div class='flex flex-row w-[800px] h-[600px] m-auto shadow-lg'>
        <form action="/auth/register" method="POST" class='flex flex-col'>
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <div class='flex-1 bg-red-200' />
    </div>
@endsection
