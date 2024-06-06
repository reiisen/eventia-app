@extends('app')

@section('content')
    <div>
        <form action="/checkout" method="POST">
            @csrf
            aloha! this is the details page! <br>
            <input type="hidden" name="ticket_id" value="{{ $details->id }}">
            {{ $details->name }} <br>
            categories: <br>
            @foreach ($details->categories as $category)
                <input type="hidden" name="category[]" value="{{ $category->id }}">
                {{ $category->name }} -> IDR {{ $category->price }} Stok: {{ $category->stock }} Qty:
                <input type="number" name="quantity[]" value=0 min=0 max="{{ $category->stock }}"><br>
            @endforeach
            <button type="submit">Checkout</button>
        </form>
    </div>
@endsection
