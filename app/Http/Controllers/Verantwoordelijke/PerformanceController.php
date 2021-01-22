<?php

namespace App\Http\Controllers\Verantwoordelijke;

use App\Artist;
use App\Festival;
use App\Performance;
use App\Stage;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $stage_id = $request->input('stage_id') ?? '%';
        $artist_name = "%" . $request->input('artist') . '%';
        $artist = Artist::where('name',"like",$artist_name)->get();

        $artisIds = array();
        foreach ($artist as $art)
        {
            array_push($artisIds, $art->id);
        }
        $performances = Performance::with('stage')
            ->where(function ($query) use ($stage_id,$artisIds) {
                $query->where('stage_id', 'like', $stage_id)
                ->whereIn('artist_id', $artisIds);
            })
            ->orderBy('start_time','asc')
            ->get();


        //work in progress
        $stages = Stage::get();
        $artists = Artist::get();
        $result = compact('performances', 'stages','artists');
        $request->flash();
        Json::dump($result);
        return view('Line-up_beheren.overzicht',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // We need a list of genres inside the form
        $artists = Artist::select('id', 'name')->orderBy('name')->get();
        $stages = Stage::select('id','name')->get();
        $festivals = Festival::select('id','name')->get();
        // To avoid errors with the 'old values' inside the form, we have to send an empty Record object to the view
        $performance = new Performance();
        $result = compact('artists','performance','stages','festivals');
        Json::dump($result);
        return view('Line-up_beheren.create', $result);
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
            'artist_id' => 'required|unique:performances,artist_id,' . $request->id,
            'festival_id' => 'required',
        ], [
            'artist_id.required' => 'Er moet een artiest gekozen worden',
            'festival_id.required' => 'Festival moet ingevuld worden',
            'artist_id.unique' => 'De artiest heeft al een optreden'

        ]);

        $check = Performance::where('date',$request->date)->where('start_time',$request->start_time)->where('end_time', $request->end_time)
            ->where('stage_id', $request->stage_id)->exists();
        if(!$check){


            $performance = new Performance();
            $performance->artist_id = $request->artist_id;
            $performance->stage_id = $request->stage_id;
            $performance->festival_id = $request->festival_id;
            $performance->start_time = $request->start_time;
            $performance->end_time = $request->end_time;
            $performance->date = $request->date;
            $performance->save();
            // Go to the public detail page for the newly created record
            session()->flash('success', "Het optreden van <b>" . $performance->artist->name . "</b> is toegevoegd!");
            return redirect("/performances/");
        }
        else{

            session()->flash('success', "Er al een andere artiest op dat moment geboekt op deze stage.");
            return redirect("/performances");
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Performance  $performance
     * @return \Illuminate\Http\Response
     */
    public function show(Performance $performance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Performance  $performance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $performance = Performance::findOrFail($id);
        // We need a list of genres inside the form
        $artists = Artist::select('id', 'name')->orderBy('name')->get();
        $stages = Stage::select('id','name')->get();
        $festivals = Festival::select('id','name')->get();
        // To avoid errors with the 'old values' inside the form, we have to send an empty Record object to the view
        $result = compact('artists','performance','stages','festivals');
        Json::dump($result);
        return view('Line-up_beheren.edit', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Performance  $performance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $performance = Performance::findOrFail($id);
        $this->validate($request, [
            'artist_id' => 'required' . $request->id,
            'festival_id' => 'required',
        ], [
            'artist_id.required' => 'Er moet een artiest gekozen worden',
            'festival_id.required' => 'Festival moet ingevuld worden',


        ]);

        $performance->artist_id = $request->artist_id;
        $performance->stage_id = $request->stage_id;
        $performance->festival_id = $request->festival_id;
        $performance->start_time = $request->start_time;
        $performance->end_time = $request->end_time;
        $performance->date = $request->date;
        $performance->save();
        // Go to the public detail page for the newly created record
        session()->flash('success', "Het optreden van <b>" . $performance->artist->name . "</b> is aangepast");
        return redirect("/performances/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Performance  $performance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Performance::findOrFail($id)->delete();
        return response()->json([
            'type' => 'success',
            'text' => "Performance is verwijderd"
        ]);
    }
}
