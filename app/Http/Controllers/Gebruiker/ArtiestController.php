<?php

namespace App\Http\Controllers\Gebruiker;

use App\Artist;
use App\Performance;
use App\PersonalTimetable;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtiestController extends Controller
{
    public function index(){
        $artists = Performance::where('festival_id',1)->get();
        $result = compact('artists');
        Json::dump($result);
        return view('Gebruiker.Artiesten.index',$result);
    }
    public function show($id)
    {
        $user = auth()->id();
        $artist = Artist::findOrFail($id);
        $performance = Performance::where('artist_id',$id)->with('stage')->firstOrFail();
        $result = compact('artist','performance','user');
        Json::dump($result,$performance);
        return view('Gebruiker.Artiesten.show',$result);
    }
    public function store($ids){
        //controleren op dubbels
        $user = auth()->id();
        $check = PersonalTimetable::where('user_id',$user)->where('performance_id',$ids)->exists();
        if(!$check){$personalTimetable = new PersonalTimetable();


            $personalTimetable->user_id = $user;
            $personalTimetable->performance_id = $ids;
            Json::dump($personalTimetable);
            $personalTimetable->save();
            return response()->json([
            'type' => 'success',
            'text' => "Artiest is toegevoegd"
        ]);

        }
        else{
          return response()->json([
            'type' => 'error',
            'text' => "Artiest is reeds al toegevoegd"
        ]);

        }




    }

}
