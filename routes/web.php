<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
// use App\Models\Ticket;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/browse', [TicketController::class, 'show']);

Route::get('/tickets/{ticket}', [TicketController::class, 'showDetails']);

Route::post('/auth/register', [AuthController::class, 'register']);

Route::post('/auth/login', [AuthController::class, 'authenticate']);

Route::get('/auth/logout', [AuthController::class, 'logout']);

Route::post('/checkout', [TransactionController::class, 'checkout']);

Route::get('/inventory', [TransactionController::class, 'showUserTransactions']);

Route::get('/transaction/{transaction}', [TransactionController::class, 'showTransactionDetails']);

Route::post('/pay/{transaction}', [TransactionController::class, 'pay']);

Route::get('payment/{transaction}', [TransactionController::class, 'redirectPayment']);

Route::get('/login', function () {
    return view('pages.login');
});

Route::get('/register', function () {
    return view('pages.register');
});
