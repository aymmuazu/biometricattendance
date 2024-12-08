<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntrollmentController extends Controller
{
    public function entrollment()
    {
        return view('dashboard.entrollment');
    }

    public function viewEntroll($student, $reg_no)
    {
        return view('dashboard.viewentroll');
    }
}
