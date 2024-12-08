<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function students()
    {
        $students = Student::orderBy('id', 'DESC')->get();
        return view('dashboard.students')->with([
            'students' => $students
        ]);
    }

    public function storeStudent(Request $request)
    {
        $request->validate([
            'faculty_name' => 'required|string|max:255',
            'dept_name' => 'required|string|max:255',
            'course_name' => 'required|string|max:255',
            'level' => 'required|integer|min:1',
            'reg_no' => 'required|string|max:255|unique:students',
            'full_name' => 'required|string|max:255',
            'passport' => 'required|image|max:2048',
        ]);

        // Handle passport upload
        $passportPath = $request->file('passport')->store('passports', 'public');

        // Save student
        $student = Student::create([
            'faculty_name' => $request->faculty_name,
            'dept_name' => $request->dept_name,
            'course_name' => $request->course_name,
            'level' => $request->level,
            'reg_no' => $request->reg_no,
            'full_name' => $request->full_name,
            'passport' => $passportPath,
        ]);

        return response()->json([
            'message' => 'Student successfully added!',
            'student' => $student,
        ], 201);
    }

    public function destroyStudent($id)
    {
        $student = Student::findOrFail($id);
        if (Storage::exists($student->passport)) {
            Storage::delete($student->passport);
        }
        $student->delete();

        return response()->json(['message' => 'Student deleted successfully!']);
    }
}
