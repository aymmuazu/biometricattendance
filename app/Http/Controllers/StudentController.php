<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function students()
    {
        return view('dashboard.students');
    }
}
