<?php

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasks', TaskController::class);
Route::resource('employees', EmployeeController::class);
Route::post('/task',[TaskController::class,'store_status'])->name('tasks.store_status');
Route::get('/archive',[TaskController::class,'archive'])->name('archive');

Route::get('/dashboard', function () {

    if(Auth::User()->parentId == null){
    $tasks = DB::select("CALL pr_employees_tasks( ".Auth::User()->id.")");//employees who have assign
    // dd("here");
    // DB::table('tasks')->
    // $tasks =  Task::join('users', function ($join) {
    //                 $join->on('tasks.assigned_to', '=', 'users.id')
    //                 ->where('users.parentId', Auth::User()->id)
    //                 ->orwhere('users.id', Auth::User()->id);
    //     })->get();
        // dd($tasks);
}
    else{
        $tasks = Task::where('user_id', Auth::User()->id)->get();//all tasks that I created it
    }
    return view('dashboard',['tasks'=> $tasks]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
