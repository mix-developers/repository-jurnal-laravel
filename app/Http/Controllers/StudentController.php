<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Mahasiswa',
            'users' => User::getStudents(),
            'major' => Major::all(),
        ];
        return view('admin.student.index', $data);
    }
    public function show($id)
    {
        // $ID = decrypt($id);
        $student = User::find($id);
        $data = [
            'title' => 'Detail Mahasiswa ' . $student->name,
            'student' => $student,
        ];
        return view('admin.student.show', $data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'identity' => 'required',
            'id_major' => 'required',
        ]);

        $student = new Student();
        $student->identity = $request->identity;
        $student->id_major = $request->id_major;
        $student->full_name = $request->full_name;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->place_birth = $request->place_birth;
        $student->date_birth = $request->date_birth;

        $student->save();

        return redirect()->back()->with(
            [
                'success' => 'Berhasil menambahkan data',
            ],
        );
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'full_name' => 'required',
            'identity' => 'required',
            'id_major' => 'required',
        ]);

        $student = Student::find($id);
        $student->identity = $request->identity;
        $student->id_major = $request->id_major;
        $student->full_name = $request->full_name;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->place_birth = $request->place_birth;
        $student->date_birth = $request->date_birth;
        $student->save();

        return redirect()->back()->with(
            [
                'success' => 'Berhasil memperbaharui data',
            ],
        );
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->back()->with(
            [
                'success' => 'Berhasil menghapus data',
            ]
        );
    }
}
