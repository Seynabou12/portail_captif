<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        User::create($input);
        return redirect('admin/users')->with('flash-message', 'User à été bien enregistré');
    }

    public function edit($id)
    {

        $user = User::find($id);
        return view('admin.users.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $input = $request->all();
        $user->update($input);
        return redirect('admin/users')->with('flash-message', 'Vos modifications ont été bien enregistré');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('flash-message', 'Utilisateur supprimé avec succés');
    }
}
