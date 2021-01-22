<?php

namespace App\Http\Controllers\Verantwoordelijke;

use App\EmployeeShift;
use App\Shift;
use App\Task;
use App\User;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UurroosterBeherenController extends Controller
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
        $medewerkershifts = EmployeeShift::with('shift')
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
            foreach ($medewerkershifts as $key => $temp)
            {
                if($task->id == $temp->shift->task_id){$var = true;}
            }
            if($var){array_push($tasks,$task);}
        }

        //$employeeShifts = EmployeeShift::orderBy('shift_id','ASC')->get();
        //$tasks = Task::select("id","name")->get();
        $result = compact('tasks','medewerkershifts','datums');
        Json::dump($result);

        return view('Verantwoordelijke.Uurrooster.index',$result);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('type_id', 'like', 3)
            ->get();
        $tasks = Task::get();

        $medewerkershift = new EmployeeShift();
        $shift = new Shift();
        $result = compact('medewerkershift', 'shift', 'users', 'tasks');
        Json::dump($result);
        return view('Verantwoordelijke.Uurrooster.create',$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $shift = new Shift();


        $this->validate($request, [
            'task_id' => 'required',
            'name' => 'required',
            'location' => 'required',
            'date' => 'required|after:today',
            'start_time' => 'required|before:end_time',
            'end_time' => 'required|after:start_time',
            'department' => 'required',
        ], [
            'task_id.required' => 'Er moet een taak geselecteerd zijn',
            'name.required' => 'Er moet een naam ingevuld worden',
            'location.required' => 'Er moet een locatie ingevuld worden',
            'date.required' => 'Er moet een datum geselecteerd zijn',
            'start_time.required' => 'Er moet een starttijd ingevuld worden',
            'end_time.required' => 'Er moet een eindtijd ingevuld worden',
            'end_time.after' => 'De eindtijd moet na de starttijd zijn',
            'start.before' => 'De starttijd moet na de eindtijd zijn',
            'date.after' => 'De de datum moet zich in de toekomst bevinden',
            'department.required' => 'Er moet een department ingevuld worden',

        ]);


        $shift->task_id = $request->task_id;
        $shift->name = $request->name;
        $shift->location = $request->location;
        $shift->date = $request->date;
        $shift->start_time = $request->start_time;
        $shift->end_time = $request->end_time;
        if ($request->user2 != null) {
            $shift->number_of_employees = 2;
        }else{
            $shift->number_of_employees = 1;
        }
        $shift->department = $request->department;
        $shift->remark = $request->remark;
        $shift->save();
        if ($request->user2 != null){
            $medewerkershift = new EmployeeShift();
            $medewerkershift->user_id = $request->user2;
            $medewerkershift->shift_id = $shift->id;
            $medewerkershift->is_absent = 0;
            $medewerkershift->save();
        }
        $medewerkershift = new EmployeeShift();
        $medewerkershift->user_id = $request->user_id;
        $medewerkershift->shift_id = $shift->id;
        $medewerkershift->is_absent = 0;
        $medewerkershift->save();
        session()->flash('success', 'The shift has been created');
        return redirect('Uurrooster');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeShift  $employeeShift
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeShift $employeeShift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeShift  $employeeShift
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::where('type_id', 'like', 3)
            ->get();
        $medewerkershift = EmployeeShift::findOrFail($id);
        $tasks = Task::get();


        $result = compact( 'medewerkershift', 'users', 'tasks');
        Json::dump($result);
        return view('verantwoordelijke.Uurrooster.edit', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeShift  $employeeShift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $medewerkershift = EmployeeShift::findOrFail($id);


        $shift = Shift::findOrFail($medewerkershift->shift_id);

        $this->validate($request, [
            'task_id' => 'required',
            'name' => 'required',
            'location' => 'required',
            'date' => 'required|after:today',
            'start_time' => 'required|before:end_time',
            'end_time' => 'required|after:start_time',
            'department' => 'required',
        ], [
            'task_id.required' => 'Er moet een taak geselecteerd zijn',
            'name.required' => 'Er moet een naam ingevuld worden',
            'location.required' => 'Er moet een locatie ingevuld worden',
            'date.required' => 'Er moet een datum geselecteerd zijn',
            'start_time.required' => 'Er moet een starttijd ingevuld worden',
            'end_time.required' => 'Er moet een eindtijd ingevuld worden',
            'end_time.after' => 'De eindtijd moet na de starttijd zijn',
            'start.before' => 'De starttijd moet na de eindtijd zijn',
            'date.after' => 'De de datum moet zich in de toekomst bevinden',
            'department.required' => 'Er moet een department ingevuld worden',

        ]);
        $medewerkershift->user_id = $request->user_id;

        $shift->task_id = $request->task_id;
        $shift->name = $request->name;
        $shift->location = $request->location;
        $shift->date = $request->date;
        $shift->start_time = $request->start_time;
        $shift->end_time = $request->end_time;
        if ($request->user2 != null) {
            $shift->number_of_employees = 2;
        }else{
            $shift->number_of_employees = 1;
        }
        $shift->department = $request->department;
        $shift->remark = $request->remark;
        $shift->save();
        if ($request->user2 != null){
            $medewerkershift = new EmployeeShift();
            $medewerkershift->user_id = $request->user2;
            $medewerkershift->shift_id = $shift->id;
            $medewerkershift->is_absent = 0;
            $medewerkershift->save();
        }

        $medewerkershift->save();
        session()->flash('success', 'The shift has been updated');
        return redirect('Uurrooster');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeShift  $employeeShift
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {$medewerkershift = EmployeeShift::findOrFail($id);
        EmployeeShift::findOrFail($id)->delete();
        Shift::findOrFail($medewerkershift->shift_id)->delete();
        session()->flash('success', 'The shift has been deleted');
        return redirect('/Uurrooster');
    }
}
