<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Jobs\SendUserEmail;
use App\Mail\UpdatePasswordToNewUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{


    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $user = new User();
        return view('users.create', compact('user'));
    }


    public function store(UserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email
        ]);

        session()->flash("message", ["success", __("Usuario registrado satisfactoriamente")]);
        return redirect()->route('users.index');
    }


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }


    public function update(UserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();
        session()->flash("message", ["success", __("Usuario actualizado satisfactoriamente")]);
        return redirect()->route('users.index');
    }


    public function destroy(User $user)
    {
        if (request()->ajax()) {
            $user->delete();
            session()->flash("message", [
                "success",
                __("El usuario :user ha sido eliminado correctamente", ["user" => $user->name])
            ]);

        }
    }


    public function show()
    {

        $user = auth()->user();
        return response()->json($user, 200);

    }


    public function updateName(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->save();

        return response()->json('Usuario actualizado correctamente', 201);

    }

}
