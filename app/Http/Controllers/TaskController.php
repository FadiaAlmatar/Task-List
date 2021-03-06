<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Notifications\TaskCreated;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('assigned_to', Auth::User()->id)->where('status','<>','finished')->get();
        if(Auth::User()->parentId == null)
          $users = User::where('parentId', Auth::User()->id)->orwhere('id', Auth::User()->id)->get();
       else
          $users = User::where('parentId' , Auth::User()->parentId)->orwhere('id',Auth::User()->parentId)->get();
        return view('task.index',['tasks' => $tasks,'users'=>$users,'status'=>'']);
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
            'duedate'                 => 'required|after:yesterday|date',
            'assigned_to'             => 'required'
        ]);
        //    dd("here");
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->duedate = $request->duedate;
        $task->assigned_to = $request->assigned_to;
        $task->status = "not started";
        $task->user_id = Auth::User()->id;
        $task->save();
        $user = User::where('id',$request->assigned_to)->first();
        return redirect()->route('delegatedTasks')->with('success', 'Task created successfully');
    }

    public function status(Request $request ,$id)
    {
            $task = Task::find($id);
            if($request->status <> 'forward'){
                if($request->forwardto == null)
                    $task->status = $request->status;
                else{
                    $task->status = 'forward';
                    $task->assigned_to = $request->forwardto;
                    // $task->user_id = Auth::User()->id;
                }
            }
            else{
                if($request->forwardto<> null){
                    $task->status = $request->status;
                    $task->assigned_to = $request->forwardto;
                    // $task->user_id = Auth::User()->id;
                }
            }
            $task->save();
        return redirect()->back();
    }

    public function archive()
    {
        $tasks = DB::select("CALL pr_archive_tasks( ".Auth::User()->id.")");//employees who have assign
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
        $task = Task::find($id);
        if(Auth::User()->parentId == null)
        $users = User::where('parentId', Auth::User()->id)->orwhere('id', Auth::User()->id)->get();
       else
       $users = User::where('parentId' , Auth::User()->parentId)->orwhere('id',Auth::User()->parentId)->get();
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
            'duedate'                 => 'required|after:yesterday|date',
            'assigned_to'             => 'required'
        ]);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->duedate = $request->duedate;
        $task->assigned_to = $request->assigned_to;
        $task->status =  "not started";
        $task->user_id = Auth::User()->id;
        $task->save();
        return redirect()->route('delegatedTasks')->with('success', 'Task updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('delegatedTasks')->with('success', 'Task deleted successfully');
    }

    public function printArchive(Request $request)
    {
        $tasks = DB::select("CALL pr_archive_tasks( ".Auth::User()->id.")");
        $html = view('task.archive-pdf',['tasks'=>$tasks])->render();
        $pdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8', 'format' => 'A4','default_font' => 'fontawesome','margin_left' => 15,'margin_right' => 10,'margin_top' => 16,'margin_bottom' => 15,'margin_header' => 10, 'margin_footer' => 10 ]);
        $pdf->AddPage("P");
        $pdf->SetHTMLFooter('<p style="text-align: center">{PAGENO}</p>');
        $pdf->WriteHTML('.fa { font-family: fontawesome;}',1);
        $pdf->WriteHTML($html);
        return  $pdf->Output("archive.pdf","D");
    }
    public function printCreated(Request $request)
    {
        if(Auth::User()->parentId == null){
            $tasks = DB::select("CALL pr_employees_tasks(".Auth::User()->id.")");//employees who have assign
        }else{ $tasks = Task::where('user_id', Auth::User()->id)->get();//all tasks that I created it
         }
        $html = view('task.createdtask-pdf',['tasks'=>$tasks])->render();
        $pdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8', 'format' => 'A4','default_font' => 'fontawesome','margin_left' => 15,'margin_right' => 10,'margin_top' => 16,'margin_bottom' => 15,'margin_header' => 10, 'margin_footer' => 10 ]);
        $pdf->AddPage("P");
        $pdf->SetHTMLFooter('<p style="text-align: center">{PAGENO}</p>');
        $pdf->WriteHTML('.fa { font-family: fontawesome;}',1);
        $pdf->WriteHTML($html);
        return  $pdf->Output("created.pdf","D");
    }

    public function printAssign (Request $request)
    {
        if($request->status == "in")
           $tasks = Task::where('assigned_to', Auth::User()->id)->where('status','=',"in progress")->get();
        elseif($request->status == "waiting")
           $tasks = Task::where('assigned_to', Auth::User()->id)->where('status','=',$request->status)->get();
        elseif($request->status == "not")
           $tasks = Task::where('assigned_to', Auth::User()->id)->where('status','=',"not started")->get();
        elseif($request->status == "denied")
           $tasks = Task::where('assigned_to', Auth::User()->id)->where('status','=',$request->status)->get();
        else{
        $tasks = Task::where('assigned_to', Auth::User()->id)->where('status','<>','finished')->get();}
        $html = view('task.assign-task-pdf',['tasks'=>$tasks])->render();
        $pdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8', 'format' => 'A4','default_font' => 'fontawesome','margin_left' => 15,'margin_right' => 10,'margin_top' => 16,'margin_bottom' => 15,'margin_header' => 10, 'margin_footer' => 10 ]);
        $pdf->AddPage("P");
        $pdf->SetHTMLFooter('<p style="text-align: center">{PAGENO}</p>');
        $pdf->WriteHTML('.fa { font-family: fontawesome;}',1);
        $pdf->WriteHTML($html);
        return  $pdf->Output("assign.pdf","D");
    }

    public function delegatedTasks()
    {
        if(Auth::User()->parentId == null){
            $tasks = DB::select("CALL pr_employees_tasks(".Auth::User()->id.")");//employees who have assign
        }else{ $tasks = Task::where('user_id', Auth::User()->id)->get();//all tasks that I created it
         }
         if (count($tasks) <> 0){
            if(Auth::User()->parentId == null)
            $users = User::where('parentId', Auth::User()->id)->orwhere('id', Auth::User()->id)->get();
         else
            $users = User::where('parentId' , Auth::User()->parentId)->orwhere('id',Auth::User()->parentId)->get();

        return view('dashboard',['tasks'=> $tasks,'users'=>$users]);
         }
         else{
            return view('dashboard',['tasks'=> $tasks,'users'=>'']);
         }
    }

    public function find($status)
    {
        if($status == "in progress")
           $tasks = Task::where('assigned_to', Auth::User()->id)->where('status','=',$status)->get();
        elseif($status == "waiting")
           $tasks = Task::where('assigned_to', Auth::User()->id)->where('status','=',$status)->get();
        elseif($status == "not started")
           $tasks = Task::where('assigned_to', Auth::User()->id)->where('status','=',$status)->get();
        else
           $tasks = Task::where('assigned_to', Auth::User()->id)->where('status','=',$status)->get();

        if(Auth::User()->parentId == null)
          $users = User::where('parentId', Auth::User()->id)->orwhere('id', Auth::User()->id)->get();
       else
          $users = User::where('parentId' , Auth::User()->parentId)->orwhere('id',Auth::User()->parentId)->get();
        return view('task.index',['tasks' => $tasks,'users'=>$users,'status'=>$status]);
    }
   public function taskboard()
   {
    if(Auth::User()->parentId == null){
        // $tasks = DB::select("CALL pr_employees_tasks(".Auth::User()->id.")");//employees who have assign
        $tasks = DB::table('users')
        ->join('tasks', 'tasks.assigned_to', '=', 'users.id')
        ->where('tasks.status','<>','finished')
        ->where(function ($query) {
            $query->where('users.parentId', Auth::User()->id)
                  ->orWhere('users.id',Auth::User()->id);
        })
        ->simplePaginate(3,['*'],'tasks');
        // dd($tasks);
        $users = User::where('parentId', Auth::User()->id)->orwhere('id', Auth::User()->id)->get();
    }else{
        $tasks = Task::where('user_id', Auth::User()->id)->simplePaginate(1);//all tasks that I created it
        $users = User::where('parentId' , Auth::User()->parentId)->orwhere('id',Auth::User()->parentId)->get();
     }
    // $archive = DB::select("CALL pr_archive_tasks( ".Auth::User()->id.")");//employees who have
    $archive = DB::table('users')
    ->join('tasks', 'tasks.assigned_to', '=', 'users.id')
    ->where('tasks.status','=','finished')
    ->where(function ($query) {
        $query->where('users.parentId', Auth::User()->id)
              ->orWhere('users.id',Auth::User()->id);
    })
    ->ORDERBY ('tasks.updated_at', 'DESC')
    ->simplePaginate(3,['*'],'archive');
    // dd($archive);
    $assign = Task::where('assigned_to', Auth::User()->id)->where('status','<>','finished')->orderBy('created_at','desc')->simplePaginate(3,['*'],'assign');
    return view('taskboard',compact('tasks','archive','assign','users'));
}

}
