<?php

namespace App\Http\Controllers\Medewerker;

use App\EmployeeShift;
use App\Shift;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShiftController extends Controller
{
    public function index()
    {
        $user = auth()->id();
        Json::dump($user);

        $shifts = Shift::with('task')->get();

        $employeeShifts = EmployeeShift::where('user_id',$user)->with('user')->with('shift')->get();
        $result = compact('shifts','employeeShifts');
        Json::dump($result, $user);

        return view('Medewerker.Afwezigheid.index',$result);
    }





    public function update(Request $request)
    {



        $shift = EmployeeShift::where('shift_id', $request ->shift_id)->firstOrFail();

        $this->validate($request, [
        'reason_absence' => 'required',


    ], [
        'reason_absence.required' => 'Reden is verplicht',


    ]);


        $shift->is_absent = 1;
        $shift->reason_absence = $request->reason_absence;


        $shift->save();
        // Go to the public detail page for the updated record
        session()->flash('success', "U hebt zich afwezig gemeld voor de shift");
        return redirect("/shifts-employees/");
    }
}
