<?php

namespace App\Http\Controllers\Gebruiker;

use App\SoldTickets;
use App\Ticket;
use App\Type;
use App\User;

use Facades\App\Helpers\Cart;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class TicketKopenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tickets = Ticket::where('festival_id', '=', 1)->get();
        $sold_tickets = SoldTickets::get();
        $result = compact('tickets', 'sold_tickets');
        Json::dump($result);
        return view('Gebruiker.Ticket_kopen.index', $result);

    }
    public function addToCart($id)
    {
        $ticket = Ticket::findOrFail($id);
        Cart::add($ticket);
        return back();
    }

    public function deleteFromCart($id)
    {
        $ticket = Ticket::findOrFail($id);
        Cart::delete($ticket);
        return back();
    }
    public function emptyCart()
    {
        Cart::empty();
        return redirect('Gebruiker.Ticket_kopen.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $sold_ticket = new SoldTickets();
            $id = Auth::id();
            $gebruiker = User::findOrFail(Auth::id());

            $result = compact('sold_ticket', 'gebruiker' );
            Json::dump($result);
            return view('Gebruiker.Ticket_kopen.create', $result);
        }else {
            $sold_ticket = new SoldTickets();
            $gebruiker = new User();

            $result = compact('sold_ticket', 'gebruiker');
            Json::dump($result);
            return view('Gebruiker.Ticket_kopen.create', $result);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {

            if ($request->email != Auth::user()->email){
                $this->validate($request, [
                    'email' => 'unique:users',
                ], ['email.unique' => 'Deze email is al eens gebruikt',]);
            }

        }else {

            $this->validate($request, [
                'email' => 'unique:users',
            ], ['email.unique' => 'Deze email is al eens gebruikt',]);
        }

        $this->validate($request, [

            'first_name' => 'required',
            'last_name' => 'required',
            'email'=>'required|email',

            'adress' => 'required',
            'phonenumber' => 'required',
            'city' => 'required',

        ], [
            'email.required' => 'Je moet een email adres invullen',
            'email.email' => 'Je moet een email adres invullen',

            'first_name.required' => 'Je moet een voornaam invullen',
            'last_name.required' => 'Je moet een achternaam invullen',
            'adress.required' => 'Er moet een adres ingevuld worden',
            'phonenumber.required' => 'Er moet een telefoon ingevuld zijn',
            'city.required' => 'Er moet een stad ingevuld zijn',


        ]);

        if (Auth::check()) {
            $gebruiker = User::findOrFail(Auth::id());


        }else {
            $gebruiker = new User();
            $gebruiker->type_id = 1;
        }






        $gebruiker->first_name = $request->first_name;
        $gebruiker->email = $request->email;
        $gebruiker->last_name = $request->last_name;
        $gebruiker->adress = $request->adress;

        $gebruiker->phonenumber = $request->phonenumber;
        $gebruiker->city = $request->city;

        $gebruiker->save();

        foreach (Cart::getRecords() as $ticket) {
            for($i = $ticket['qty']; $i > 0 ; $i--){
            $sold_ticket = new SoldTickets();
            $sold_ticket->ticket_id = $ticket['id'];
            $sold_ticket->user_id = $gebruiker->id;
            $sold_ticket->save();
        }
        }
        Cart::empty();
        session()->flash('succes', 'You bought a ticket!');
        return redirect('ticket_kopen');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}


