<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(User $model)
    {
        return view('admin.index');
    }
}
