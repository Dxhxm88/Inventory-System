<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('pages.supplier.index', compact('suppliers'));
    }

    public function showAdd()
    {
        return view('pages.supplier.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'incharge_name' => 'required',
            'contact_number' => 'required',
        ]);

        Supplier::create([
            'name' => $request->name,
            'incharge_name' => $request->incharge_name,
            'contact_number' => $request->contact_number
        ]);

        return redirect()->route('supplier')->with(['message' => 'Supplier added', 'alert' => 'alert-success']);
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);

        $supplier->delete();

        return redirect()->route('supplier')->with(['message' => 'Supplier deleted', 'alert' => 'alert-danger']);
    }

    public function showEdit($id)
    {
        $supplier = Supplier::find($id);

        return view('pages.supplier.edit', compact('supplier'));
    }

    public function update($id, Request $request)
    {
        $supplier =  Supplier::find($id);

        $request->validate([
            'name' => 'required',
            'incharge_name' => 'required',
            'contact_number' => 'required',
        ]);

        $supplier->name = $request->name;
        $supplier->incharge_name = $request->incharge_name;
        $supplier->contact_number = $request->contact_number;

        $supplier->save();

        return redirect()->route('supplier')->with(['message' => 'Supplier updated', 'alert' => 'alert-success']);
    }
}
