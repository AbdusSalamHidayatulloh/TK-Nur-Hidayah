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
        return view('teacher-profile', [
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
            //Find the teacher
            $teacherUser = User::findOrFail($userId);

            if ($teacherUser->role !== 'teacher') {
                abort(403, 'Cannot delete a non teacher user (admin)');
            }
            $teacherUser->delete();
            return redirect()->back()->with('Success', 'Teacher has been deleted');
        }
        abort(403, 'Unauthorized Access');
    }

    public function updateTeacher(TeacherRequest $request, int $userId)
    {
        $currentUser = $request->user();
        if ($currentUser->role === 'admin' && $currentUser->id !== $userId) {
            $validateData = $request->validated();
            $user = User::findOrFail($userId);
            $teacher = $user->teacher;

            $user->update([
                'name' => $validateData['name'] ?? $user->name,
                'email' => $validateData['email'] ?? $user->email,
                'role' => $validateData['role'] ?? $user->role
            ]);

            $teacher->update([
                'position' => $validateData['position'] ?? $teacher->position,
                'image' => $validateData['image'] ?? $teacher->image,
                'birthdate' => $validateData['birthdate'] ?? $teacher->birthdate
            ]);

            return redirect()->back()->with('Success', 'Admin change a Teacher profile');
        } elseif ($currentUser->role === 'teacher') {
            $validateData = $request->validated($request->rulesForUpdate($userId));
            $user = User::findOrFail($userId);
            $teacher = $user->teacher;

            $user->update([
                'name' => $validateData['name'] ?? $user->name,
                'password' => isset($validateData['password'])
                    ? bcrypt($validateData['password'])
                    : $user->password,
            ]);

            $teacher->update([
                'image' => $validateData['image'] ?? $teacher->image,
            ]);

            return redirect()->back()->with('Success', 'You have change your profile, teacher');
        }
    }
}
