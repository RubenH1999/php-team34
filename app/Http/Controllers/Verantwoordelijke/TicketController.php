<?php

namespace App\Http\Controllers\Verantwoordelijke;

use App\Festival;
use App\SoldTickets;
use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticket = Ticket::get();

            $soldticket = SoldTickets::groupBy('ticket_id')->select('ticket_id', \DB::raw('count(*) as total'))->get();

        $result = compact('ticket','soldticket');
        \Facades\App\Helpers\Json::dump($result);   //JSON werkt alleen op mijn computer wanneer er \Facades\App\Helpers\ voor staat (Bram)
        return view('Verantwoordelijke.Ticket.index',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ticket = new Ticket();
        $result = compact('ticket');
        \Facades\App\Helpers\Json::dump($result);
        return view('Verantwoordelijke.Ticket.create',$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = new Ticket();

        $ticket->festival_id = 1;
        $ticket->ticket_name = $request->ticket_name;
        $ticket->price = $request->price;
        $ticket->max_available = $request->max_available;
        $ticket->save();
        session()->flash('success', "$ticket->ticket_name has been updated");
        return redirect('/tickets/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticketnaam = Ticket::where('id',$id)->get();
        $person = \DB::table('users')
            ->join('sold_tickets', 'users.id', '=', 'sold_tickets.user_id')
            ->where('sold_tickets.ticket_id', $id)
            ->get();

        $result = compact('person','ticketnaam');
        \Facades\App\Helpers\Json::dump($result);   //JSON werkt alleen op mijn computer wanneer er \Facades\App\Helpers\ voor staat (Bram)
        return view('Verantwoordelijke.Ticket.show',$result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $result = compact('ticket');
        \Facades\App\Helpers\Json::dump($result);

        return view('Verantwoordelijke.Ticket.edit', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->ticket_name = $request->ticket_name;
        $ticket->price = $request->price;
        $ticket->max_available = $request->max_available;
        $ticket->save();
        session()->flash('success', "$ticket->ticket_name has been updated");
        return redirect('/tickets/');
    }

    public function destroy($id)
    {
        Ticket::findOrFail($id)->delete();
        return response()->json([
            'type' => 'success',
            'text' => "Ticket is verwijderd"
        ]);
    }
}
