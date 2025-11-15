<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filled('searchStudent')) {
            return view('portal.student-list', [
                'sitename'   => $request->searchStudent,
                'maintitle'  => 'Murid Dicari: ' . $request->searchStudent,
                'students'   => Student::where('name', 'like', '%' . $request->searchStudent . '%')
                    ->paginate(8)
                    ->withQueryString(),
            ]);
        } else {
            return view('portal.student-list', [
                'sitename'   => 'Semua Murid',
                'maintitle'  => 'Semua Murid',
                'students'   => Student::paginate(8)
            ]);
        }
    }

    public function addStudent(StudentRequest $request)
    {
        $currentUser = $request->user();
        if ($currentUser->role === 'teacher') {
            abort(403, 'Unauthorized access of deleting student data');
        }
        $validateData = $request->validated();
        $path = $request->file('student_image')->store('students', 'public');
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
            $validateData = $request->validated();
            $studentfind = Student::findOrFail($studentId);

            $studentfind->update([
                'name' => $validateData['name'] ?? $studentfind->name,
                'student_image' => $validateData['student_image'] ?? $studentfind->student_image
            ]);

            return back()->with('Success', 'Student has been updated');
        } elseif ($currentUser === 'teacher') {
            abort(403, "Unauthorized access");
        }
    }

    public function showStudent(Student $studentId)
    {
        return view('portal.show-student', [
            'sitename' => $studentId['name'],
            'maintitle' => 'Student: ' . $studentId['name'],
            'student' => $studentId
        ]);
    }
}
