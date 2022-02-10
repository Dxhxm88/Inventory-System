<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Auth::user();
        return view('pages.profile.index', compact('profile'));
    }

    public function showEdit()
    {
        $profile = Auth::user();
        return view('pages.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email']
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('profile')->with(['message' => 'Profile updated', 'alert' => 'alert-success']);
    }
}
