<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){
        $teachers = Teacher::all();
        return view('static.about-us', compact('teachers'));
    }

    public function indexTeacher(Request $request) {
        if($request->has('teacherSearch')) {
                return view('teacher', [ 
                'sitename' => $request->searchStudent,
                'maintitle' => 'Searched Murid: '.$request->searchStudent,
                'teachers' => Teacher::where('name', 'like', '%'.$request->searchStudent.'%')
                ->paginate(10)
                ->withQueryString(),
            ]);
        } else {
            return view('teacher', [
                'sitename' => $request->searchStudent,
                'maintitle' => 'Searched Murid: '.$request->searchStudent,
                'teachers' => Teacher::paginate(10)
            ]);
        }
    }
}
