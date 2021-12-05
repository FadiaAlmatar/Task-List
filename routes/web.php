<?php

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Controller;

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
Route::get('locale/{locale}', function ($locale){
    if (! in_array($locale, ['en', 'ar'])) {
        abort(400);
    }
    Session::put('locale', $locale);
    App::setLocale($locale);
    return redirect()->back();
});
Route::resource('tasks', TaskController::class);
Route::resource('employees', EmployeeController::class);
Route::post('/task',[TaskController::class,'store_status'])->name('tasks.store_status');
Route::get('/archive',[TaskController::class,'archive'])->name('archive');

// Route::get('/dashboard', [TaskController::class,'delegatedTasks'])->middleware(['auth','verified'])->name('dashboard');
Route::get('/dashboard', [TaskController::class,'index'])->middleware(['auth','verified'])->name('dashboard');
Route::get('/delegatedTasks', [TaskController::class,'delegatedTasks'])->name('delegatedTasks');
Route::get('/printarchive', [TaskController::class, 'printArchive'])->name('tasks.printArchive');
Route::get('/printcreated', [TaskController::class, 'printCreated'])->name('tasks.printCreated');
Route::get('/printassign', [TaskController::class, 'printAssign'])->name('tasks.printAssign');
require __DIR__.'/auth.php';



