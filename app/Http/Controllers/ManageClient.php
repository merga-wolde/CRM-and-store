<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manage;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ManageClient extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.register');
        $users = DB::table('users')
        ->where('role', '=', 1)
        ->get();
       // $users['title']='Admin Users';
        // $user = array(
        //     'title'=> 'store users',
        //     $user
        // );
        return view('admin.admins', compact('users'));
        // return view('admin.index')->with('users', '$users');
        //return $user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.register');
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'role' => 1,
        //     'password' => Hash::make($data['password']),
        // ]);
        $this->validate($request, [
            'name'=> 'required',
            'email'=> 'required',
        ]);
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = 1;
        $user->password = Hash::make($request->input('password'));
        $user->save();



        return redirect('admin/dashboard')->with('success','updated successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view("admin.edit")->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=> 'required',
            'email'=> 'required',
        ]);
        $name = $request->name;
        $email = $request->email;
        $role = 1;
        $password = $request->password;
        
        $update = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'role' => $role,
            'password' => Hash::make($password),
        ];
        User::where('id', $id)->update($update);
        return redirect('admin/admins')->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find($id);
        $delete -> delete();
        return redirect('admin/dashboard');
    }
}
