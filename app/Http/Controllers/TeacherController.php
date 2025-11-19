<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Requests\TeacherRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
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
            return view('portal.teacher-list', [
                'sitename' => $request->teacherSearch,
                'maintitle' => 'Searched Murid: ' . $request->teacherSearch,
                'teachers' => Teacher::where('name', 'like', '%' . $request->teacherSearch . '%')
                    ->paginate(10)
                    ->withQueryString(),
            ]);
        } else {
            return view('portal.teacher-list', [
                'sitename' => $request->teacherSearch,
                'maintitle' => 'Searched Murid: ' . $request->teacherSearch,
                'teachers' => Teacher::paginate(10)
            ]);
        }
    }

    public function show(Teacher $teacher)
    {
        return view('portal.teacher', [
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

            //We create an emppty teacher model instead of ::create because
            //functionHandleImageUpload will be used repeatedly

            //Lebih pendeknya, ::create tapi manual karena image pake function untuk handle gambar
            $teacherNew = new Teacher();
            $teacherNew->user_id = $newUser->id;
            $teacherNew->position = $validateData['position'];
            $teacherNew->birthdate = $validateData['birthdate'];
            $teacherNew->image = $this->functionHandleImageUpload($request, $teacherNew);
            $teacherNew->save();
        } elseif ($user->role === 'teacher') {
            abort(403, 'Unauthorized access');
        }
        return redirect('/teacher-list')->with('Success', 'You have added a new teacher');
    }

    public function deleteTeacher(TeacherRequest $request, Teacher $teacher)
    {
        $user = $request->user();
        if ($user->role === 'admin') {

            //Hapus gambar dari folder 
            if($teacher->image) {
                Storage::disk('public')->delete($teacher->image);
            }
            $teacher->delete();
            return redirect('/teacher-list')->with('Success', 'Teacher has been deleted');
        }
        abort(403, 'Unauthorized Access');
    }

    public function updateTeacher(TeacherRequest $request, Teacher $teacher)
    {
        $currentUser = $request->user();
        if ($currentUser->role === 'admin') {
            $validateData = $request->validated();
            $user = $teacher->user;

            $user->update([
                'name' => $validateData['name'] ?? $user->name,
                'email' => $validateData['email'] ?? $user->email,
            ]);

            $teacher->update([
                'position' => $validateData['position'] ?? $teacher->position,
                'birthdate' => $validateData['birthdate'] ?? $teacher->birthdate
            ]);
            $teacher->image = $this->functionHandleImageUpload($request, $teacher);
            $teacher->save();

            return redirect('/teacher-list')->with('Success', 'Admin change a Teacher profile');
        } elseif ($currentUser->role === 'teacher') {
            $validateData = $request->validated();
            $user = $teacher->user;

            $user->update([
                'name' => $validateData['name'] ?? $user->name,
                //!Password changes will be done separately
                // 'password' => isset($validateData['password'])
                //     ? bcrypt($validateData['password'])
                //     : $user->password,
            ]);

            $teacher->fill([
                'image' => $validateData['image'] ?? $teacher->image,
            ])->save();

            return redirect('/teacher-list')->with('Success', 'You have change your profile, teacher');
        }
    }

    public function create()
    {
        return view('portal.teacher-form', [
            'teacher' => null,
            'isEdit' => false,
            'isEditPersonal' => false,
            'sitename' => 'Create new teacher',
        ]);
    }

    public function edit(Teacher $teacher)
    {
        return view('portal.teacher-form', [
            'teacher' => $teacher,
            'isEdit' => true,
            'isEditPersonal' => false,
            'sitename' => 'Edit a teacher',
        ]);
    }

    public function editPersonal(Teacher $teacher)
    {
        return view('portal.teacher-form', [
            'teacher' => $teacher,
            'isEdit' => true,
            'isEditPersonal' => true,
            'sitename' => 'Edit a teacher',
        ]);
    }

    /**
     * Universal handle images that got uploaded or deleted
     * @param request: flag any actions done (either C, U, D)
     * @param teacher: indicate the data choosen
     * **/ 
    private function functionHandleImageUpload(Request $request, $teacher) {
        //Check if the request sent has a file in it (name image)
        if($request->hasFile('image')) {
            //if there's an image, delete it from public then take the file path
            if($teacher->image) {
                Storage::disk('public')->delete($teacher->image);
            }
            /**
            * If not, we store the data in the same file path we delete it
            * @return type: string (filepath)
            **/
            return $request->file('image')->store('image/teacherimage/', 'public');
        }
        /**
         * If it had an image, we and we don't things to it, we sent the data
         * @return type: string (filepath)
         * **/
        return $teacher->image;
    }
}
