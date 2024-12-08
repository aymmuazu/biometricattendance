<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function admins()
    {
        $admins = User::orderBy('id', 'DESC')->get();
        return view('dashboard.admins')->with([
            'admins' => $admins
        ]);
    }

    public function storeadmins(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'password' => 'required',
        ]);

        // Save admin
        $admin = User::create([
            'username' => $request->username,
            'name' => $request->full_name,
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            'message' => 'Admin successfully added!',
            'admin' => $admin,
        ], 201);
    }
}
