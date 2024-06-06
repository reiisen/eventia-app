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


        for ($i = 0; $i < count($transactionData['category']); $i++) {
            $transaction->items()->attach([
                $transactionData['category'][$i]
            ]);
            $transaction->items()->syncWithPivotValues($transactionData['category'][$i], ['qty' => $transactionData['quantity'][$i]]);
        }

        return redirect('/payment');
    }
}
