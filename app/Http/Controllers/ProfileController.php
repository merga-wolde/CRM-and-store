<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\User;
class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        //$products = DB::table('products')->get();
        $users = DB::table('users')->where('id', auth()->user()->id)->get();
    
        return view('client.editprofile')->with('users', $users);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        //auth()->user()->update($request->all());
        $id= auth()->user()->id;
        $name = $request->name;
        $email = $request->email;
        $filepath = $request->file('logo')->store('public/images');
        
        if ($filepath) {
        $update = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'logo' => $filepath,
           
        ];
        $updated = User::where('id', $id)->update($update);
        
        
        return back()->withStatus(__('Profile successfully updated.'));
        }
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
