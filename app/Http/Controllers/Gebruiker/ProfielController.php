<?php

namespace App\Http\Controllers\Gebruiker;

use App\SoldTickets;
use App\Ticket;
use App\User;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfielController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $soldTickets = SoldTickets::with('ticket')->with('user')->where("user_id","=",auth()->id())->orderBy("ticket_id","ASC")->get();

        $ticketAmount = array();
        $tickets = Ticket::get();
        for ($j = 0; $j < count($tickets); $j++)
        {
            $ticketCount =0;
            for($i = 0; $i < count($soldTickets); $i++)
            {
                if ($tickets[$j]->id == $soldTickets[$i]->ticket_id)
                {
                    $ticketCount++;
                }


            }
            $newElement = array("ticket_id" => $tickets[$j]->id,"amount" => $ticketCount);
            array_push($ticketAmount,$newElement);
        }

        //dd($ticketAmount);



        $result = compact('soldTickets','ticketAmount');
        Json::dump($result);

        return view('gebruiker.profiel.index',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $result = compact('user');
        Json::dump($result);
        return view('gebruiker.profiel.edit', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($request->current_password != null)
        {
            // Validate $request
            $this->validate($request, [
                'current_password' => 'required',
                'password' => 'required|min:8|confirmed',
            ]);

            // verander als inloggen werkt

            if (!Hash::check($request->current_password, $user->password)) {
                session()->flash('danger', "Your current password doesn't mach the password in the database");
                return back();
            }
            $user->password = Hash::make($request->password);
            $user->save();
            // Update encrypted user password in the database and redirect to previous page
            session()->flash('success', 'Your password has been updated');
            return redirect("/profiel/");
        }else
        {
            $user = User::findOrFail($id);

            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'phonenumber' => 'required',
            ], [
                'first_name.required' => 'Voornaam moet ingevuld worden',
                'last_name.required' => 'Achternaam moet ingevuld worden',
                'email.required' => 'Het email adres moet ingevuld worden',
                'email.unique' => 'Dit email adres bestaat al',

            ]);

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phonenumber = $request->phonenumber;
            $user->adress = $request->adress;
            $user->city = $request->city;
            $user->save();
            // Go to the public detail page for the updated record
            session()->flash('success', "De gebruiker <b>$user->first_name</b>  <b>$user->last_name</b> is aangepast");
            return redirect("/profiel/");
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
