@extends('app')

@section('content')
    <div>
        <span>Transaction id {{ $details->id }}</span> <br>
        @foreach ($details->items as $item)
            {{ $item->name }}
            {{ $item->pivot->qty }} <br>
        @endforeach
        <p>Total Price: {{ $details->items->sum('price') }} <br>
        status: {{ $details->status }}</p>
    </div>
@endsection
