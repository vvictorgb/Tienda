<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('crud', compact('users'));
    }




    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('crud');
        }
        return redirect()->route('crud');
    }



    public function create()
    {
        return view('createUser');
    }





    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);
        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;

        $user->save();

        return redirect()->route('crud');
    }


    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('editar', compact('user'));
}




public function update(Request $request, $id)
{
    $user = User::findOrFail($id);


    $request->validate([
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable',
        'role' => 'required'
    ]);


    $user->email = $request->email;
    $user->password = $request->password ? bcrypt($request->password) : $user->password;
    $user->role = $request->role;
    $user->save();

    return redirect()->route('crud');
}


}
