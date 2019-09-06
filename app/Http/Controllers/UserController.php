<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
    //
    public function index()
    {
        $users = User::paginate();
        return view('userList', compact('users'));
    }

    public function search(Request $request)
    {
        if (isset( $request->q))
        {
            $q =$request->q;
        
            $users= User::where('name', 'like', '%'. $q .'%')
            ->orWhere('lname', 'like', '%'. $q .'%')  
            ->orWhere('email', 'like', '%'. $q .'%')
            ->orWhere('bdate', 'like', '%'. $q .'%')
            ->orWhere('is_admin', 'like', '%'. $q .'%')
            ->orderBy('name')
            ->paginate(); 
            return view('userList', compact('users'));
        };

        $users = User::orderBy('name')->paginate();
        return view('userList', compact('users'));
    }
}
