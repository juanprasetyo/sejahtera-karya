<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompleteProfileController extends Controller
{
    public function edit()
    {
        return view('auth.complete-profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'village_id' => 'required|exists:villages,id',
        ]);

        $user = Auth::user();
        $user->village_id = $request->village_id;
        $user->save();

        return redirect()->route('dashboard');
    }
}