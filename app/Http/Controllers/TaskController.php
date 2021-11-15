<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('assigned_to', Auth::User()->id)->get();
        return view('task.index',['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::User()->parentId == null)
         $users = User::where('parentId', Auth::User()->id)->orwhere('id', Auth::User()->id)->get();
        else
        $users = User::where('parentId' , Auth::User()->parentId)->orwhere('id',Auth::User()->parentId)->get();
        return view('task.create',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'                   => 'required|min:3',
            'description'             => 'required|min:3',
            'duedate'                 => 'required',
            'assigned_to'             => 'required'
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->duedate = $request->duedate;
        $task->assigned_to = $request->assigned_to;
        $task->status = "not started";
        $task->user_id = Auth::User()->id;
        $task->save();
        return redirect()->route('dashboard');
    }
    public function store_status(Request $request)
    {
        for ($i = 0; $i < count($request->status); $i++) {
            $task = Task::find($request->taskId[$i]);
            $task->status = $request->status[$i];
            $task->save();
    }
    return redirect()->route('tasks.index');
    }
    public function archive(){
        $tasks = DB::select("CALL pr_employees_tasks( ".Auth::User()->id.")");//employees who have assign
        return view('task.archive',['tasks' => $tasks]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        // dd("here");
      return view('task.show',['task'=> $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $task = Task::find($id);
        $users = User::all();
        return view('task.create',['task'=>$task,'users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title'                   => 'required|min:3',
            'description'             => 'required|min:3',
            'duedate'                 => 'required',
            'assigned_to'             => 'required'
        ]);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->duedate = $request->duedate;
        $task->assigned_to = $request->assigned_to;
        $task->status = 0;//not done
        $task->user_id = Auth::User()->id;
        $task->save();
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}