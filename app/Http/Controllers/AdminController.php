<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(User $model)
    {
        // $clients = User::where('role', 2)->get();
        $users = DB::table('users')
                ->where('role', '=', 2)
                ->get();
                
        return view('admin.index', compact('users'));
    }
}
