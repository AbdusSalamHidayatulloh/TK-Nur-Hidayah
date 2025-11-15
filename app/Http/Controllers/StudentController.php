<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('searchStudent')) {
            return view('students.index', [
                'sitename'   => $request->searchStudent,
                'maintitle'  => 'Searched Student: ' . $request->searchStudent,
                'students'   => Student::where('name', 'like', '%' . $request->searchStudent . '%')
                    ->paginate(10)
                    ->withQueryString(),
            ]);
        } else {
            return view('students.index', [
                'sitename'   => 'All Students',
                'maintitle'  => 'All Students',
                'students'   => Student::paginate(10)
            ]);
        }
    }

    public function addStudent(StudentRequest $request)
    {
        $currentUser = $request->user();
        if ($currentUser->role === 'teacher') {
            abort(403, 'Unauthorized access of deleting student data');
        }
        $validateData = $request->validate();
        Student::create([
            'name' => $validateData['name'],
            'birthdate' => $validateData['birthdate'],
            'student_image' => $validateData['student_image']
        ]);
        return back()->with('Success', 'A student has been created');
    }

    public function deleteStudent(StudentRequest $request, int $studentId)
    {
        $currentUser = $request->user();
        $studentSelected = Student::findOrFail($studentId);
        if ($currentUser->role === 'teacher') {
            abort(403, 'Unauthorized access of deleting student data');
        }

        $studentSelected->delete();

        return back()->with('Success', 'Student has been deleted');
    }

    public function updateStudent(StudentRequest $request, int $studentId)
    {
        $currentUser = $request->user();
        if ($currentUser->role === 'admin') {
            $validateData = $request->validate();
            $studentfind = Student::findOrFail($studentId);

            $studentfind->update([
                'name' => $validateData['name'] ?? $studentfind->name,
                'birthdate' => $validateData['birthdate'] ?? $studentfind->birthdate,
                'student_image' => $validateData['student_image'] ?? $studentfind->student_image
            ]);

            return back()->with('Success', 'Student has been updated');
        } elseif ($currentUser === 'teacher') {
            abort(400, "Unauthorized access");
        }
    }

    public function showStudent(Student $student)
    {
        return view('show-student', [
            'sitename' => $student['name'],
            'maintitle' => 'Student: ' . $student['name'],
            'student' => $student
        ]);
    }
}
