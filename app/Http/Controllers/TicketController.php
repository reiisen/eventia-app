<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function show()
    {
        $tickets = Ticket::all();
        return View('pages.browse', compact('tickets'));
    }

    public function showDetails(Ticket $ticket)
    {
        $details = $ticket->load('categories');
        return View('pages.details', compact('details'));
    }
}
