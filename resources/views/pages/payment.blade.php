@extends('app')

@section('content')
    <p>Please select a payment method for transaction ID: {{ $transaction->id }}</p>
    <form action="{{ url('/pay/' . $transaction->id) }}" method="POST">
        @csrf
        <div>
            <input type="radio" id="credit_card" name="payment_method" value="credit_card" required>
            <label for="credit_card">Credit Card</label>
        </div>
        <div>
            <input type="radio" id="qris" name="payment_method" value="qris" required>
            <label for="qris">QRIS</label>
        </div>
        <div>
            <input type="radio" id="tether" name="payment_method" value="tether" required>
            <label for="tether">Tether</label>
        </div>
        <button type="submit">Bayar</button>
    </form>
@endsection
