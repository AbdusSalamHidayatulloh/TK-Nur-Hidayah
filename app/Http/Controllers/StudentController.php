<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
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
                    ->paginate(10)
                    ->withQueryString(),
            ]);
        } else {
            return view('portal.student-list', [
                'sitename'   => 'Semua Murid',
                'maintitle'  => 'Semua Murid',
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
        $validateData = $request->validated();
        $student = new Student();

        $student->name = $validateData['name'];
        $student->birthdate = $validateData['birthdate'];
        $student->image = $this->handleImageUpload($request, $student);
        
        $student->save();
        
        return redirect('/student-list')->with('Success', 'A student has been created');
    }

    public function deleteStudent(StudentRequest $request, int $studentId)
    {
        $currentUser = $request->user();
        $studentSelected = Student::findOrFail($studentId);
        if ($currentUser->role === 'teacher') {
            abort(403, 'Unauthorized access of deleting student data');
        }

        if ($studentSelected->image) {
            Storage::disk('public')->delete($studentSelected->image);
        }


        $studentSelected->delete();

        return redirect()->back()->with('Success', 'Student has been deleted');
    }

    public function updateStudent(StudentRequest $request, int $studentId)
    {
        $currentUser = $request->user();
        if ($currentUser->role === 'admin') {
            $validateData = $request->validated();
            $studentfind = Student::findOrFail($studentId);

            $studentfind->image = $this->handleImageUpload($request, $studentfind);

            if (isset($validateData['name'])) {
                $studentfind->name = $validateData['name'];
            }

            $studentfind->save();

            return redirect('/student-list')->with('Success', 'Student has been updated');
        } elseif ($currentUser->role === 'teacher') {
            abort(403, "Unauthorized access, you're not admin");
        }
    }

    private function handleImageUpload(Request $request, $student)
    {
        if ($request->hasFile('image')) {
            if ($student->image) {
                Storage::disk('public')->delete($student->image);
            }
            return $request->file('image')->store('image/studentimage/', 'public');
        }
        return $student->image;
    }

    public function showStudent(Student $studentId)
    {
        return view('portal.show-student', [
            'sitename' => $studentId['name'],
            'maintitle' => 'Student: ' . $studentId['name'],
            'student' => $studentId
        ]);
    }

    //take data for update & create
    public function create()
    {
        return view('portal.student-form', [
            'student' => null,
            'isEdit' => false,
            'sitename' => 'Create new student',
        ]);
    }

    public function edit($studentId)
    {
        $student = Student::findOrFail($studentId);
        return view('portal.student-form', [
            'student' => $student,
            'isEdit' => true,
            'sitename' => 'Edit a student',
        ]);
    }
}
