<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->role === 'admin') {
            $students = Student::paginate(10);
            $maintitle = 'All Students';
        } elseif ($user->role === 'teacher') {
            $students = Student::paginate(10);
            $maintitle = 'All Students (Readonly)';
            $myClassroom = $user->teacher->classroom ?? null;
        }

        if ($request->filled('searchStudent')) {
            $students = $students->where('name', 'like', '%' . $request->searchStudent . '%');
        }

        return view('students.index', [
            'students' => $students,
            'maintitle' => $maintitle,
            'myClassroom' => $myClassroom ?? null,
        ]);
    }

    public function addStudent(StudentRequest $request)
    {
        $validateData = $request->validate($request->rulesForCreate());
        Student::create([
            'name' => $validateData['name'],
            'birthdate' => $validateData['birthdate'],
            'student_image' => $validateData['student_image']
        ]);
        return back()->with('Success', 'A student has been created');
    }

    public function deleteStudent(StudentRequest $request, int $studentId)
    {
        $studentSelected = Student::findOrFail($studentId);
        if ($request->role !== 'admin') {
            abort(400, 'Unauthorized access of deleting student data');
        }

        $studentSelected->delete();

        return back()->with('Success', 'Student has been deleted');
    }

    public function updateStudent(StudentRequest $request, int $studentId)
    {
        $currentUser = $request->user();
        if ($currentUser === 'admin') {
            $validateData = $request->validate($request->rulesForUpdate($studentId));
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
