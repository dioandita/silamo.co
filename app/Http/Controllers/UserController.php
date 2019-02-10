<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;



class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index()
    {
        $data=User::all();
        return view('admin.pages.datauser.index',compact('data')); 
    }

  
    public function create()
    {
        return view('admin.pages.datauser.add');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'nohp' => 'required|max:15|unique:users',
        ));
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'nohp' => $request['nohp'],
            'password' => $request['password']
        ]);
        return redirect()->route('datauser.index');
    
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $data = User::findOrfail($id);
        return view('admin.pages.datauser.edit', compact('data'));
    }

   
    public function update(Request $request, $id)
    {   
        $this->validate($request, array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'required|string|min:6|confirmed',
            'nohp' => "required|max:15|unique:users,nohp,".$id,
            'isAdmin' => "boolean",
        ));
        $user= User::findOrfail($id);
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'nohp' => $request['nohp'],
            'password' => $request['password'],
            'isAdmin' =>$request['isAdmin'],
        ]);
        return redirect()->route('datauser.index');
        
    }

   
    public function destroy($id)
    {
        User::find($request->id)->delete();
        return redirect()->route('datauser.index')
                ->with('success','User deleted successfully');
    }
}
