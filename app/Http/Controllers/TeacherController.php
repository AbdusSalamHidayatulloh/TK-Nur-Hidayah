<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('static.about-us', compact('teachers'));
    }

    public function listTeachers(Request $request)
    {
        if ($request->filled('searchTeacher')) {
            return view('portal.teacher-list', [
                'sitename'   => $request->searchTeacher,
                'maintitle'  => 'Guru Dicari: ' . $request->searchTeacher,
                'teachers'   => Teacher::whereHas('user', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->searchTeacher . '%');
                })
                    ->paginate(10)
                    ->withQueryString(),
            ]);
        } else {
            return view('portal.teacher-list', [
                'sitename'   => 'Semua Guru',
                'maintitle'  => 'Semua Guru',
                'teachers'   => Teacher::paginate(10)
            ]);
        }
    }

    public function indexTeacher(Request $request)
    {
        if ($request->filled('teacherSearch')) {
            return view('teacher', [
                'sitename' => $request->teacherSearch,
                'maintitle' => 'Searched Murid: ' . $request->teacherSearch,
                'teachers' => Teacher::where('name', 'like', '%' . $request->teacherSearch . '%')
                    ->paginate(10)
                    ->withQueryString(),
            ]);
        } else {
            return view('teacher', [
                'sitename' => $request->teacherSearch,
                'maintitle' => 'Searched Murid: ' . $request->teacherSearch,
                'teachers' => Teacher::paginate(10)
            ]);
        }
    }

    public function show(Teacher $teacher)
    {
        return view('portal.show-teacher', [
            'sitename' => $teacher->user->name,
            'maintitle' => $teacher->user->name . "'s Data",
            'teacher' => $teacher,
        ]);
    }

    public function addTeacher(TeacherRequest $request)
    {
        $user = $request->user();
        if ($user->role === 'admin') {
            $validateData = $request->validated();

            $newUser = User::create([
                'name' => $validateData['name'],
                'email' => $validateData['email'],
                'password' => bcrypt($validateData['password']),
                'role' => 'teacher'
            ]);

            Teacher::create([
                'user_id' => $newUser->id,
                'position' => $validateData['position'],
                'birthdate' => $validateData['birthdate']
            ]);
        } elseif ($user->role === 'teacher') {
            abort(400, 'Unauthorized access');
        }
        return redirect()->back()->with('Success', 'You have added a new teacher');
    }

    public function deleteTeacher(TeacherRequest $request, int $userId): RedirectResponse
    {
        $user = $request->user();
        if ($user->role === 'admin') {
            $teacherUser = User::findOrFail($userId);

            if ($teacherUser->role !== 'teacher') {
                abort(403, 'Cannot delete a non teacher user (admin)');
            }
            $teacherUser->delete();
            return redirect()->back()->with('Success', 'Teacher has been deleted');
        }
        abort(403, 'Unauthorized Access');
    }
    public function editTeacher(Teacher $teacher)
    {
        return view('portal.teacher-edit', [
            'sitename' => 'Edit ' . $teacher->user->name,
            'maintitle' => 'Edit Teacher: ' . $teacher->user->name,
            'teacher' => $teacher
        ]);
    }
    public function updateTeacher(TeacherRequest $request, int $userId)
    {
        $currentUser = $request->user();
        if ($currentUser->role === 'admin') {
            $validateData = $request->validated();
            $user = User::findOrFail($userId);
            $teacher = $user->teacher;

            $user->update([
                'name' => $validateData['name'] ?? $user->name,
                'email' => $validateData['email'] ?? $user->email,
            ]);

            $updateData = [
                'position' => $validateData['position'] ?? $teacher->position,
                'birthdate' => $validateData['birthdate'] ?? $teacher->birthdate,
            ];

            // Handle image upload
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('teachers', 'public');
                $updateData['image'] = $path;
            }

            $teacher->update($updateData);

            return redirect('/teacher-list')->with('Success', 'Teacher has been updated');
        }

        abort(403, "Unauthorized access");
    }
}
