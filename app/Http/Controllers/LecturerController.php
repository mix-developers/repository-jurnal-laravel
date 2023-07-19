<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\Major;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Dosen',
            'lecturer' => Lecturer::all(),
            'major' => Major::all(),
        ];
        return view('admin.lecturer.index', $data);
    }
    public function show($id)
    {
        $ID = decrypt($id);
        $lecturer = Lecturer::find($ID);
        $data = [
            'title' => 'Detail Dosen ' . $lecturer->title_first . $lecturer->full_name . ' ' . $lecturer->title_end,
            'lecturer' => $lecturer,
        ];
        return view('admin.lecturer.show', $data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'identity' => 'required',
            'title_end' => 'required',
            'id_major' => 'required',
        ]);

        $lecturer = new Lecturer();
        $lecturer->identity = $request->identity;
        $lecturer->id_major = $request->id_major;
        $lecturer->full_name = $request->full_name;
        $lecturer->title_first = $request->title_first;
        $lecturer->title_end = $request->title_end;
        $lecturer->phone = $request->phone;
        $lecturer->address = $request->address;
        $lecturer->place_birth = $request->place_birth;
        $lecturer->date_birth = $request->date_birth;

        $lecturer->save();

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
            'title_end' => 'required',
            'id_major' => 'required',
        ]);

        $lecturer = Lecturer::find($id);
        $lecturer->identity = $request->identity;
        $lecturer->id_major = $request->id_major;
        $lecturer->full_name = $request->full_name;
        $lecturer->title_first = $request->title_first;
        $lecturer->title_end = $request->title_end;
        $lecturer->phone = $request->phone;
        $lecturer->address = $request->address;
        $lecturer->place_birth = $request->place_birth;
        $lecturer->date_birth = $request->date_birth;
        $lecturer->save();

        return redirect()->back()->with(
            [
                'success' => 'Berhasil memperbaharui data',
            ],
        );
    }

    public function destroy($id)
    {
        $lecturer = Lecturer::find($id);
        $lecturer->delete();

        return redirect()->back()->with(
            [
                'success' => 'Berhasil menghapus data',
            ]
        );
    }
}
