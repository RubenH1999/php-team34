<?php

namespace App\Http\Controllers\Verantwoordelijke;

use App\Artist;
use App\Performance;
use App\Task;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;

class ArtistController extends Controller
{

    public function index(Request $request)
    {

        $artist_name ='%' . $request->input('artist') . '%';
        $artists = Artist::where('name' , 'like',$artist_name)->paginate(7)->appends(['artist' => $request->input('artist')]);
        $result = compact('artists');
        Json::dump($result);
        return view('Verantwoordelijke.Artiesten.index',$result);
    }

    public function update(Request $request, $id)
    {

        $artist = Artist::findOrFail($id);

        $this->validate($request, [
            'name' => 'required' ,
            'genre' => 'required',
            'spotify' => 'required',
            'img' =>'required',
            'description' => 'required',
        ], [
            'name.required' => 'Naam van de artiest is verplicht',

            'genre.required' => 'Genre van de artiest is verplicht',
            'spotify.required' => 'Spotify url van de ariest is verplicht',
            'img.required' => 'Afbeelding van de ariest is verplicht',
            'description.required' => 'omschrijving van de artiest is verplcht',

        ]);


        $artist->name = $request->name;
        $artist->genre = $request->genre;
        $artist->rider = $request->rider;
        //zoeken hoe performance geupdate moet worden


        if(Str::contains($request->spotify, "spotify:album:") || Str::contains($request->spotify,"spotify:track:")){
            $spot = substr($request->spotify,14);
            $artist->spotify = $spot;
        }else{
            $artist->spotify = $request->spotify;
        }
        $artist->img = $request->img;

        $artist->description = $request->description;
        $artist->save();

        session()->flash('success', "$artist->name has been updated");
        return redirect('/artists/');
    }

    public function edit($id)
    {
        $artist = Artist::findOrFail($id);

        $result = compact('artist');
        Json::dump($result);
        return view('Verantwoordelijke.Artiesten.edit', $result);
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();
        return response()->json([
            'type' => 'success',
            'text' => "$artist->name is verwijderd"
        ]);
    }

    public function create()
    {
        $artist = new Artist();
        $result = compact('artist');
        Json::dump($result);
        return view('Verantwoordelijke.Artiesten.create',$result);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:artists,name' . $request->id,
            'genre' => 'required',
            'spotify' => 'required',
            'img' =>'required',
            'description' => 'required',
        ], [
            'name.required' => 'Naam van de artiest is verplicht',
            'name.unique' => 'Deze artiest is al toegevoegd',
            'genre.required' => 'Genre van de artiest is verplicht',
            'spotify.required' => 'Spotify url van de ariest is verplicht',
            'img.required' => 'Afbeelding van de ariest is verplicht',
            'description.required' => 'omschrijving van de artiest is verplcht',

        ]);
        $artist = new Artist();
        $this->validate($request,[
            'name' => 'required',
            'genre' => 'required',
            'description' => 'required',
        ]);


        $artist->name = $request->name;
        $artist->genre = $request->genre;
        $artist->rider = $request->rider;
        //zoeken hoe performance geupdate moet worden


        if(Str::contains($request->spotify, "spotify:album:") || Str::contains($request->spotify,"spotify:track:")){
            $spot = substr($request->spotify,14);
            $artist->spotify = $spot;
        }else{
            $artist->spotify = $request->spotify;
        }
        $artist->img = $request->img;
        $artist->description = $request->description;

        $artist->save();

        session()->flash('success', "$artist->name has been created");
        return redirect('/artists');
    }

}
