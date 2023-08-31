<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users=User::paginate(10);
        return view('admin.user.index', compact('users'));
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role_as' => ['required', 'integer'],

        ]);
        User::create([
            'name' => $request->name,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'role_as' => $request->role_as,
        ]);
        return redirect('/admin/users')->with('message', 'User ajouté avec succés');

    }

    public function edit(int $userId)
    {
        $user=User::findOrFail($userId);
        return view('admin.user.edit', compact('user'));
    }
    public function update(int $userId, Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role_as' => ['required', 'integer'],

        ]);
        User::findOrFail($userId)->update([
            'name' => $request->name,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'role_as' => $request->role_as,
        ]);
        return redirect('/admin/users')->with('message', 'User Modifié avec succés');

    }

    public function destroy(int $userId)
    {
        $user=User::findOrFail($userId);
        $user->delete();
        return redirect('/admin/users')->with('message', 'User Supprimé avec succés');

    }
}
