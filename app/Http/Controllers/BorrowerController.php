<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use App\Models\Department;
use App\Models\Item;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    public function index()
    {
        $borrowers = Borrower::orderBy('status', 'DESC')->get();
        return view('pages.borrower.index', compact('borrowers'));
    }

    public function showAdd()
    {
        $departments = Department::all();
        $items = Item::where('status', 1)->get();
        return view('pages.borrower.add', compact('departments', 'items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'staff_id' => 'required',
            'item_id' => 'required',
            'department_id' => 'required',
            'user_id' => 'required',
        ]);

        $this->changeItemStatus($request->item_id);

        Borrower::create([
            'name' => $request->name,
            'staff_id' => $request->staff_id,
            'item_id' => $request->item_id,
            'department_id' => $request->department_id,
            'user_id' => $request->user_id,
            'status' => 1,
        ]);

        return redirect()->route('borrower')->with(['message' => 'Borrower added', 'alert' => 'alert-success']);
    }

    public function destroy($id)
    {
        $borrower = Borrower::find($id)->delete();

        return redirect()->route('borrower')->with(['message' => 'Borrower deleted', 'alert' => 'alert-danger']);
    }

    public function showEdit($id)
    {
        $borrower = Borrower::find($id);
        $departments = Department::all();
        $items = Item::where('status', 1)->get();

        return view('pages.borrower.edit', compact('borrower', 'departments', 'items'));
    }

    public function update($id, Request $request)
    {
        $borrower = Borrower::find($id);

        $request->validate([
            'name' => 'required',
            'staff_id' => 'required',
            'item_id' => 'required',
            'department_id' => 'required',
            'user_id' => 'required',
            'status' => 'required',
        ]);

        if ($borrower->item_id != $request->item_id) {
            $this->changeItemStatus($request->item_id);
            $this->changeItemStatus($borrower->item_id);
        }

        if ($request->status != $borrower->status) {
            $this->changeItemStatus($request->item_id);
        }


        $borrower->name = $request->name;
        $borrower->staff_id = $request->staff_id;
        $borrower->item_id = $request->item_id;
        $borrower->department_id = $request->department_id;
        $borrower->user_id = $request->user_id;
        $borrower->status = $request->status;

        $borrower->save();

        return redirect()->route('borrower')->with(['message' => 'Borrower updated', 'alert' => 'alert-success']);
    }

    public function changeItemStatus($id)
    {
        $item = Item::find($id);
        if ($item->status == 0) {
            $item->status = 1;
        } else {
            $item->status = 0;
        }

        $item->save();
    }
}
