<?php

namespace App\Http\Controllers\Medewerker;

use App\EmployeeShift;
use App\Shift;
use App\Task;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedewerkerShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Filterdatum = '%' . $request->input('datum') .'%';
        $shifts = Shift::where('date',"like",$Filterdatum)->get();

        $shiftIds = array();
        foreach ($shifts as $temp)
        {
            array_push($shiftIds, $temp->id);
        }
        $employeeShifts = EmployeeShift::with('shift')
            ->where(function ($query) use ($shiftIds) {
                $query->whereIn('shift_id', $shiftIds);
            })
            ->orderBy('shift_id','asc')
            ->get();


        $datums = Shift::distinct()->get(["date"]);

        $Unfilteredtasks = Task::select("id","name")->get();
        $tasks = array();
        foreach ($Unfilteredtasks as $task)
        {
            $var = false;
            foreach ($employeeShifts as $key => $temp)
            {
                if($task->id == $temp->shift->task_id){$var = true;}
            }
            if($var){array_push($tasks,$task);}
        }

        //$employeeShifts = EmployeeShift::orderBy('shift_id','ASC')->get();
        //$tasks = Task::select("id","name")->get();
        $result = compact('tasks','employeeShifts','datums');
        Json::dump($result);

        return view('medewerker.shiftoverzicht',$result);

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
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shift $shift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shift $shift)
    {
        //
    }
}
