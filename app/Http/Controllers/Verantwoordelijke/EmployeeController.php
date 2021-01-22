<?php

namespace App\Http\Controllers\Verantwoordelijke;

use App\User;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $naam = '%' . $request->input('naam') . '%';


        $users = User::with('type')
            ->where(function ($query) use ($naam) {
                $query->where('first_name', 'like', $naam)->where('type_id','=',3);
            })->orWhere(function ($query) use ($naam) {
                $query->where('last_name', 'like', $naam)->where('type_id','=',3);
            })->orWhere(function ($query) use ($naam) {
                $query->where('email', 'like', $naam)->where('type_id','=',3);
            })
            ->paginate(8);

        $result = compact('users');
        Json::dump($result);                    // open http://vinyl_shop.test/shop?json
        return view('medewerker-beheren.overzicht',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $result = compact('user');
        Json::dump($result);
        return view('medewerker-beheren.create',$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->id,
        ], [
            'first_name.required' => 'Voornaam moet ingevuld worden',
            'last_name.required' => 'Achternaam moet ingevuld worden',
            'email.required' => 'Het email adres moet ingevuld worden',
            'email.unique' => 'Dit email adres bestaat al',

        ]);

        $user = new User();
        $user->type_id = 3;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phonenumber = $request->phonenumber;
        $user->adress = $request->adress;
        $user->city = $request->city;
        $user->save();
        // Go to the public detail page for the newly created record
        session()->flash('success', "De Medewerker <b>$user->first_name</b>  <b>$user->last_name</b> is toegevoegd");
        return redirect("/employees/");
    }

    /*
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
        return view('medewerker-beheren.edit', $result);
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

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ], [
            'first_name.required' => 'Voornaam moet ingevuld worden',
            'last_name.required' => 'Achternaam moet ingevuld worden',
            'email.required' => 'Het email adres moet ingevuld worden',
            'email.unique' => 'Dit email adres bestaat al',

        ]);
        $user->type_id = 3;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phonenumber = $request->phonenumber;
        $user->adress = $request->adress;
        $user->city = $request->city;
        $user->save();
        // Go to the public detail page for the updated record
        session()->flash('success', "De Medewerker <b>$user->first_name</b>  <b>$user->last_name</b> is aangepast");
        return redirect("/employees/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        User::findOrFail($id)->delete();
        return response()->json([
            'type' => 'success',
            'text' => "Medewerker is verwijderd"
        ]);
    }
}
;
