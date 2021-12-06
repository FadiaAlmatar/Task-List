<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        if(Auth::User()->parentId == null){
          $users = User::where('parentId', Auth::User()->id)->orwhere('id', Auth::User()->id)->get();
        }else{
            $users = User::where('parentId', Auth::User()->parentId)->orwhere('id', Auth::User()->parentId)->get();
        }
        return view('employee.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
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
                    'name' => ['required', 'string', 'min:3','max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', Rules\Password::defaults()],
                    ]);
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password =  Hash::make($request->password);
                $user->company_name = Auth::User()->company_name;
                $user->parentId = Auth::User()->id;
                $user->save();
        return redirect()->route('employees.index');
    }
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'email' =>['sometimes',
            'required',
            Rule::unique('users','email')->where(function ($query) use ($id){
            $query->where('id' ,'<>', $id);
        })
        ],
        'name' => ['sometime','required', 'string', 'min:3','max:255'],
        'password' => ['required', Rules\Password::defaults()],
        ]);
        $user = User::find($id);
         $user->update(['name'=> $request->name],['email'=> $request->email]);
         return redirect()->route('employees.index');
    }

    public function edit($id)
    {
        $employee = User::find($id);
        return view('employee.create',['employee'=> $employee]);
    }
    public function destroy($id)
    {
        if($id == Auth::User()->id){
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('register');
        }else{
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('employees.index');
        }
    }



}
