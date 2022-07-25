<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view('admin.profils.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.profils.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Profile::create($input);
        return redirect('admin/profils')->with('flash-message', 'Le role à été bien enregistré');
    }
    public function edit($id)
    {

        $profile = Profile::find($id);
        return view('admin.profils.edit')->with('role', $profile,);
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);
        $input = $request->all();
        $profile->update($input);
        return redirect('admin/profils')->with('flash-message', 'Vos modifications ont été bien enregistré');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return back()->with('flash-message', 'Role supprimé avec succés');
    }
}
