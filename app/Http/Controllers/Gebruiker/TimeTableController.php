<?php

namespace App\Http\Controllers\Gebruiker;

use App\Artist;
use App\Performance;
use App\PersonalTimetable;
use App\Stage;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class TimeTableController extends Controller
{

    public function index(Request $request){

        $user = auth()->id();
        $date = $request->input('date') ?? '%';
        $start = Performance::min('start_time');
        $performance = Performance::get();
        $artists = Performance::where(function ($q) use($date){
            $q->where('date','like',$date);
        });
        $end = Performance::max('end_time');
        $stageBegin = Stage::min('id');
        $stageEnd = Stage::max('id');
        $stages = Stage::get();
        $timetable = PersonalTimetable::where('user_id',$user)->with('performance')->get();
        $result = compact('timetable','stages','start','end','stageBegin', 'stageEnd',"performance",'artists',"date");
        Json::dump($result);
        return view('Gebruiker.Timetable.index',$result);
    }

    public function destroy($id)
    {
        $user = auth()->id();
        $personalTimetable = PersonalTimetable::where('performance_id',$id)->where('user_id',$user)->firstOrFail();
        $personalTimetable->delete();
        return response()->json([
            'type' => 'success',
            'text' => "Artiest is verwijderd"
        ]);
    }

    public static function rand_color() {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }

}
