<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => ['required', 'min:8', 'max:15']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => '419',
                'status' => false,
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ]);
        }

    

        $credentials = $request->only('username', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['code' => '419', 'error' => 'Unauthorized']);
        }

        return response()->json([
            'code' => '200',
            'status' => true,
            'message' => 'You are now logged in.'
        ]);
    }
}
