@extends('app')

@section('content')
    <div>
        status: {{ $details->status }}</p>
        <span>Transaction id {{ $details->id }}</span> <br>
        {{ $details->ticket->name}} - Details <br>
        @foreach ($details->items as $item)
            {{ $item->name }} -
            {{ $item->pivot->qty }} item <br>
        @endforeach
        <p>Total - IDR {{ $details->items->sum('price') }} <br>

        @if ($details->status != 'completed')
            <a href="{{ url('/payment/' . $details->id) }}">Bayar</a>
        @else
            this is a barcode lol it means it is completed i guess????
        @endif
    </div>
@endsection
