@extends('app')

@section('content')
    <div>
        <h2>User Transactions</h2>
        @forelse ($userTransactions as $transaction)
            <div class='flex flex-col'>
                <a>ID: {{ $transaction->id }}</a>
                <a href="{{ url('/transaction/' . $transaction->id) }}">Ticket: {{ $transaction->ticket->name }}</a>
                <a>Status: {{ $transaction->status }}</a>
            </div>
        @empty
            <p>No transactions found.</p>
        @endforelse
    </div>
@endsection
