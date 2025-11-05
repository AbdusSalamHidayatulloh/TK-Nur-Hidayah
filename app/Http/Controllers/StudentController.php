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
        } else {
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

    public function assignStudentToClassroom(Request $request, $studentId)
    {
        $user = $request->user();
        $student = Student::findOrFail($studentId);

        if ($user->role === 'teacher') {
            $teacherClassroom = $user->teacher->classroom;
            if (!$teacherClassroom) abort(403, 'No classroom is assigned');
            $student->classroom_id = $teacherClassroom->id;
        } elseif ($user->role === 'admin') {
            $student->classroom_id = $request->classroom_id;
        }

        $student->save();

        return back()->with('success', 'Student assigned to the classroom');
    }

    public function removeFromClassroom(Request $request, $studentId)
    {
        $user = $request->user();
        $student = Student::findOrFail($studentId);
        if ($user->role === 'teacher') {
            if ($student->classroom->teacher_id !== $user->teacher->id) {
                abort(403, 'Unauthorized');
            }
            $student->classroom_id = null;
        } elseif ($user->role === 'admin') {
            $student->classroom_id = null;
        };

        $student->save();

        return back()->with('success', 'Student removed from the classroom');
    }
    
    public function addStudent(StudentRequest $request, $studentId) {
        $user = $request->user();
        if($user->role === 'admin') {
            $validateData = $request->validate($request->rulesForCreate());
            Student::create([
                'name' => $validateData['name'],
                'birthdate' => $validateData['birthdate'],
                'student_image' => $validateData['student_image']
            ]);
        }
        return back()->with('Success', 'A student has been created');
    }

    public function deleteStudent(StudentRequest $request, int $studentId) {
        $studentSelected = Student::findOrFail($studentId);
        if($request->role !== 'admin') {
            abort(400, 'Unauthorized access of deleting student data');
        }

        $studentSelected->delete();

        return back()->with('Success', 'Student has been deleted');
    }

    public function updateStudent(StudentRequest $request, int $studentId) {
        
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
