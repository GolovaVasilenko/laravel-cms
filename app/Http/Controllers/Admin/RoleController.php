<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.role.index', ['roles' => Role::all()]);
    }

    public function create()
    {
        return view('admin.role.add');
    }

    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->get('name'),
            'guard_name' => $request->get('guard_name'),
        ]);
        if(!$role) {
            return back()->with('error', 'Error create role');
        }
        return redirect()->route('roles.index')->with('success', 'Role created successfully!');
    }

    public function destroy($id)
    {

    }
}
