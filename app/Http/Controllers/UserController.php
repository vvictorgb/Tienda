<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $users = User::all();


        $users->transform(function ($user) {

           $user->passwordSinEncriptar = $user->getOriginal('password');
            return $user;
        });


        return view('crud', compact('users'));
    }
}
