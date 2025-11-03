<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request) {
        if($request->has('searchStudent')) {
            return view('student', [ 
                'sitename' => $request->searchStudent,
                'maintitle' => 'Searched Murid: '.$request->searchStudent,
                'students' => Student::where('name', 'like', '%'.$request->searchStudent.'%')
                ->paginate(10)
            ]);
        } else {
            return view('student', [
                'sitename' => 'Student Access',
                'maintitle' => 'Student`s of the school',
                'students' => Student::paginate(10)
            ]);
        }
    }

    public function showStudent(Student $student) {
        return view('show-student', [
            'sitename' => $student['name'],
            'maintitle' => 'Student: '.$student['name'],
            'student' => $student 
        ]);
    }
}
