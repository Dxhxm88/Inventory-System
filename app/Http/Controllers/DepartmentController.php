<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('location', 'ASC')->get();
        return view('pages.department.index', compact('departments'));
    }

    public function showAdd()
    {
        return view('pages.department.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        Department::create([
            'name' => $request->name,
            'location' => $request->location
        ]);

        return redirect()->route('department')->with(['message' => 'Department added', 'alert' => 'alert-success']);
    }

    public function destroy($id)
    {
        $department = Department::find($id)->delete();

        return redirect()->route('department')->with(['message' => 'Department deleted', 'alert' => 'alert-danger']);
    }

    public function showEdit($id)
    {
        $department = Department::find($id);

        return view('pages.department.edit', compact('department'));
    }

    public function update($id, Request $request)
    {
        $department = Department::find($id);

        $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        $department->name = $request->name;
        $department->location = $request->location;
        $department->save();

        return redirect()->route('department')->with(['message' => 'Department updated', 'alert' => 'alert-success']);
    }
}
