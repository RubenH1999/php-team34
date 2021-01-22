<?php

namespace App\Http\Controllers\Verantwoordelijke;

use App\Task;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $task_name ='%' . $request->input('task') . '%';
        $tasks = Task::where('name' , 'like',$task_name)->paginate(7)->appends(['task' => $request->input('task')]);
        $result = compact('tasks');
        Json::dump($result);
        return view('Verantwoordelijke.Taken.index',$result);
    }
    public function create()
    {
        $task = new Task();
        $result = compact('task');
        Json::dump($result);
        return view('Verantwoordelijke.Taken.create',$result);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:tasks,name' . $request->id,

        ], [
            'name.required' => 'Naam van de taak is verplicht',
            'name.unique' => 'Deze taak is al toegevoegd',


        ]);
        $task = new Task();


        $task->name = $request->name;

        $task->save();

        session()->flash('success', "$task->name has been created");
        return redirect('/tasks');
    }
    public function show(Task $task)
    {
        //
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json([
            'type' => 'success',
            'text' => "$task->name is verwijderd"
        ]);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|unique:tasks,name' ,

        ], [
            'name.required' => 'Naam van de taak is verplicht',
            'name.unique' => 'Deze taak is al toegevoegd',


        ]);
        $task->name = $request->name;
        $task->save();
        session()->flash('success', "$task->name has been updated");
        return redirect('/tasks/');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $result = compact('task');
        Json::dump($result);
        return view('Verantwoordelijke.Taken.edit', $result);
    }
}
