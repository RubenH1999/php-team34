<?php

namespace App\Http\Controllers\Verantwoordelijke;

use App\Festival;
use App\Ticket;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class FestivalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $festival = Festival::get();
        $result = compact('festival');
        \Facades\App\Helpers\Json::dump($result);   //JSON werkt alleen op mijn computer wanneer er \Facades\App\Helpers\ voor staat (Bram)
        return view('Verantwoordelijke.Festival.index',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $festival = new Festival();
        $result = compact('festival');
        \Facades\App\Helpers\Json::dump($result);
        return view('Verantwoordelijke.Festival.create',$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $today = Carbon::now('U');
        $date = Festival::max('end_date');
        $this->validate($request,[
            'name' => 'required',
            'start_date' => 'required|after_or_equal:' . $date . '|after_or_equal:' . $today,
            'end_date' => 'required|after:start_date'
        ],
            [
                'name.required' => 'De naam van het festival moet ingevuld worden.',
                'start_date.required' => 'Er moet een startdatum ingevuld worden.',
                'start_date.after_or_equal' => 'De startdatum mag niet voor vandaag zijn of voor het aflopen van het laatste festival.',
                'end_date.required' => 'Er moet een einddatum ingevuld worden.',
                'end_date.after' => 'De einddatum mag niet op of voor de startdatum zijn.'
            ]);

        $festival = new Festival();

        $festival->name = $request->name;
        $festival->start_date = $request->start_date;
        $festival->end_date = $request->end_date;
        $festival->map = $request->map;
        $festival->description = $request->description;
        $festival->save();
        session()->flash('success', "$festival->name has been updated");
        return redirect('/festivals/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function show(Festival $festival)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $festival = Festival::findOrFail($id);
        $result = compact('festival');
        \Facades\App\Helpers\Json::dump($result);

        return view('Verantwoordelijke.Festival.edit', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $date = Carbon::now('U');
        $this->validate($request,[
            'name' => 'required',
            'start_date' => 'required|after_or_equal:' . $date,
            'end_date' => 'required|after:start_date'
        ],
            [
                'name.required' => 'De naam van het festival moet ingevuld worden.',
                'start_date.required' => 'Er moet een startdatum ingevuld worden.',
                'start_date.after_or_equal' => 'De startdatum mag niet voor vandaag zijn.',
                'end_date.required' => 'Er moet een einddatum ingevuld worden.',
                'end_date.after' => 'De einddatum mag niet op of voor de startdatum zijn.'
            ]);

        $festival = Festival::findOrFail($id);
        $festival->name = $request->name;
        $festival->start_date = $request->start_date;
        $festival->end_date = $request->end_date;
        $festival->map = $request->map;
        $festival->description = $request->description;
        $festival->save();

        session()->flash('success', "$festival->name has been updated");
        return redirect('/festivals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Festival::findOrFail($id)->delete();
        return response()->json([
            'type' => 'success',
            'text' => "Festival is verwijderd"
        ]);
    }
}
