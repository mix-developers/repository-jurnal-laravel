<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function profile()
    {
        $identity = Auth::user()->identity;
        $student = Student::where('identity', $identity)->first();
        $data = [
            'title' => 'My Profile',
            'student' => $student,
        ];
        return view('mahasiswa.user.profile', $data);
    }
    public function profileAdmin()
    {
        $identity = Auth::user()->identity;
        $student = Student::where('identity', $identity)->first();
        $data = [
            'title' => 'My Profile',
            'student' => $student,
        ];
        return view('admin.users.profile', $data);
    }
    public function lecturers()
    {
        $data = [
            'title' => 'Akun Dosen',
            'users' => User::getLecturers(),
        ];
        return view('admin.users.lecturers', $data);
    }
    public function students()
    {
        $data = [
            'title' => 'Akun Mahasiswa',
            'users' => User::getStudents(),
        ];
        return view('admin.users.students', $data);
    }
    public function lecturers_pending()
    {
        $data = [
            'title' => 'Akun Dosen',
            'users' => User::getLecturersPending(),
        ];
        return view('admin.users.lecturers_pending', $data);
    }
    public function students_pending()
    {
        $data = [
            'title' => 'Akun Mahasiswa',
            'users' => User::getStudentsPending(),
        ];
        return view('admin.users.students_pending', $data);
    }
    public function verifications(Request $request, $id)
    {
        $this->validate($request, [
            'is_verified' => 'required',
        ]);

        $user = User::find($id);
        $user->is_verified = $request->is_verified;
        $user->save();

        return redirect()->back()->with(
            [
                'success' => 'Berhasil memperbaharui data',
            ],
        );
    }
    public function graduated(Request $request, $id)
    {
        $this->validate($request, [
            'is_graduate' => 'required',
        ]);

        $user = User::find($id);
        $user->is_graduate = $request->is_graduate;
        $user->save();

        return redirect()->back()->with(
            [
                'success' => 'Berhasil memperbaharui data',
            ],
        );
    }
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'avatar' => ['nullable', 'file', 'mimes:jpg,jpeg,png,bmp', 'between:0,2048'],
            'name' => ['required', 'string', 'max:191'],
            'identity' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'max:191']
        ]);
        $user = User::findOrFail($id);

        if ($request->hasFile('avatar')) {
            if ($user->avatar != '') {
                Storage::delete($user->avatar);
            }

            $filename = Str::random(32) . '.' . $request->file('avatar')->getClientOriginalExtension();
            $file_path = $request->file('avatar')->storeAs('public/uploads', $filename);
        }

        if (isset($request->identity)) {
            $user->identity = $request->identity;
        }
        if (isset($request->password)) {
            $user->password = $request->password;
        }

        if (isset($request->name)) {
            $user->name = $request->name;
        }
        if (isset($request->email)) {
            $user->email = $request->email;
        }
        if (isset($request->phone)) {
            $user->phone = $request->phone;
        }
        $user->avatar = isset($file_path) ? $file_path : $user->avatar;
        $user->save();

        return redirect()->back()->with(
            [
                'success' => 'Berhasil memperbaharui profile',
            ],
        );
    }
    public function updateProfileAdmin(Request $request, $id)
    {
        $request->validate([
            'avatar' => ['nullable', 'file', 'mimes:jpg,jpeg,png,bmp', 'between:0,2048'],
            'name' => ['required', 'string', 'max:191'],
            'identity' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'max:191']
        ]);
        $user = User::findOrFail($id);

        if ($request->hasFile('avatar')) {
            if ($user->avatar != '') {
                Storage::delete($user->avatar);
            }

            $filename = Str::random(32) . '.' . $request->file('avatar')->getClientOriginalExtension();
            $file_path = $request->file('avatar')->storeAs('public/uploads', $filename);
        }

        if (isset($request->identity)) {
            $user->identity = $request->identity;
        }
        if (isset($request->password)) {
            $user->password = $request->password;
        }

        if (isset($request->name)) {
            $user->name = $request->name;
        }
        if (isset($request->email)) {
            $user->email = $request->email;
        }
        if (isset($request->phone)) {
            $user->phone = $request->phone;
        }
        $user->avatar = isset($file_path) ? $file_path : $user->avatar;
        $user->save();

        return redirect()->back()->with(
            [
                'success' => 'Berhasil memperbaharui profile',
            ],
        );
    }
    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = User::findOrFail($id);
        if (isset($request->password)) {
            $user->password = $request->password;
        }
        if ($user->save()) {
            return redirect()->back()->with(
                [
                    'success' => 'Berhasil memperbaharui password',
                ],
            );
        } else {
            return redirect()->back()->with(
                [
                    'danger' => 'Gagal memperbaharui password',
                ],
            );
        }
    }
}
