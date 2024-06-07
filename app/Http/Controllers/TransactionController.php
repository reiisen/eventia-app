<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function checkout(Request $request)
    {
        $transactionData = $request->validate([
            'ticket_id' => ['required'],
            'category' => ['required', 'array'],
            'quantity' => ['required', 'array']
        ]);

        $transaction = Transaction::create([
            'status' => 'pending',
        ]);

        $user = Auth::user();
        $ticket = Ticket::find($transactionData['ticket_id']);

        $transaction->user()->associate($user)->save();
        $transaction->ticket()->associate($ticket)->save();

        $categoryIds = $transactionData['category'];
        $quantities = array_combine($categoryIds, $transactionData['quantity']);

        foreach ($quantities as $categoryId => $qty) {
            if ($qty > 0) {
                $transaction->items()->attach($categoryId, ['qty' => $qty]);
                $transaction->touch();
            }
        }

        return redirect('/payment/' . $transaction->id);
    }

    public function showUserTransactions()
    {
        $userTransactions = Auth::user()->transactions()->with('ticket')->get();
        return view('pages.inventory', compact('userTransactions'));
    }

    public function showTransactionDetails(Transaction $transaction)
    {
        $details = $transaction->load('items', 'ticket');
        return view('pages.inventoryDetails', compact('details'));
    }

    public function redirectPayment(Transaction $transaction)
    {
        return view('pages.payment', compact('transaction'));
    }

    public function pay(Transaction $transaction, Request $request)
    {
        $method = $request->validate([
            'payment_method' => ['required', 'string']
        ]);
        $transaction->status = 'completed';
        $transaction->method = $method['payment_method'];
        $transaction->save();
        return view('pages.screens.successfulPayment');
    }
}
