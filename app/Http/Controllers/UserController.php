<?php

namespace App\Http\Controllers;

use App\Models\Journal;
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
        $student = User::where('identity', $identity)->first();
        $data = [
            'title' => 'My Profile',
            'student' => $student,
        ];
        return view('mahasiswa.user.profile', $data);
    }
    public function show($id)
    {
        $users = User::find($id);
        $data = [
            'title' => 'Detail',
            'users' => $users,
        ];
        return view('admin.users.show', $data);
    }
    public function profileAdmin()
    {
        $identity = Auth::user()->identity;
        $student = User::where('identity', $identity)->first();
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
    public function admin()
    {
        $data = [
            'title' => 'Akun Dosen',
            'users' => User::where('role', 'admin')->get(),
        ];
        return view('admin.users.admin', $data);
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
    public function store(Request $request)
    {
        $request->validate([
            'avatar' => ['nullable', 'file', 'mimes:jpg,jpeg,png,bmp', 'between:0,2048'],
            'name' => ['required', 'string', 'max:191'],
            'identity' => ['required', 'string', 'max:191', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'string', 'max:191'],
        ]);
        $user = new User;

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


        if (isset($request->name)) {
            $user->name = $request->name;
        }
        if (isset($request->email)) {
            $user->email = $request->email;
        }
        if (isset($request->phone)) {
            $user->phone = $request->phone;
        }
        $user->avatar = isset($file_path) ? $file_path : '';
        $user->role = $request->role;
        $user->id_major = $request->id_major;
        $user->is_verified = 1;
        if ($request->role == 'mahasiswa') {
            $user->password = Hash::make('mahasiswa');
        } else {
            $user->password = Hash::make('admin');
        }
        if ($user->save()) {

            return redirect()->back()->with(
                [
                    'success' => 'Berhasil menambah akun',
                ],
            );
        } else {
            return redirect()->back()->with(
                [
                    'danger' => 'gagal menambah akun',
                ],
            );
        }
    }
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'avatar' => ['nullable', 'file', 'mimes:jpg,jpeg,png,bmp', 'between:0,2048'],
            'name' => ['required', 'string', 'max:191'],
            'identity' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'max:191'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
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
    public function destroy($id)
    {
        $user = User::find($id);
        $journal = Journal::where('id_user', $id)->count();
        if ($journal == null) {
            $user->delete();
            return redirect()->back()->with(
                [
                    'success' => 'Berhasil menghapus data',
                ]
            );
        } else {
            return redirect()->back()->with(
                [
                    'danger' => 'Gagal menghapus data, user memiliki data..',
                ]
            );
        }
    }
}
