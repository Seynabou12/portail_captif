<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Whoops\Run;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Role::create($input);
        return redirect('admin/roles')->with('flash-message', 'Le role à été bien enregistré');
    }

   
    public function edit($id)
    {

        $role = Role::find($id);
        return view('admin.roles.edit')->with('role', $role,);
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $input = $request->all();
        $role->update($input);
        return redirect('admin/roles')->with('flash-message', 'Vos modifications ont été bien enregistré');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('flash-message', 'Role supprimé avec succés');
    }
}
