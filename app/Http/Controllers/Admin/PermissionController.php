<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Permission::create($input);
        return redirect('admin/permissions')->with('flash-message', 'Votre permission à été bien enregistré');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.permissions.edit')->with('permission', $permission);
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::find($id);
        $input = $request->all();
        $permission->update($input);
        return redirect('admin/permissions')->with('flash-message', 'Vos modifications ont été bien enregistré');
    }
}
