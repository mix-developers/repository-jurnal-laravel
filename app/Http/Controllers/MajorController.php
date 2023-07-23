<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Jurusan',
            'major' => Major::all(),
            'lecturer' => Lecturer::all(),
        ];
        return view('admin.major.index', $data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'id_lecturer_leader' => 'required',
            'type' => 'required',
        ]);

        $major = new Major();
        $major->name = $request->name;
        $major->id_lecturer_leader = $request->id_lecturer_leader;
        $major->type = $request->type;
        $major->save();

        return redirect()->back()->with(
            [
                'success' => 'Berhasil menambahkan data',
            ],
        );
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'id_lecturer_leader' => 'required',
            'type' => 'required',
        ]);

        $major = Major::find($id);
        $major->name = $request->name;
        $major->id_lecturer_leader = $request->id_lecturer_leader;
        $major->type = $request->type;
        $major->save();

        return redirect()->back()->with(
            [
                'success' => 'Berhasil memperbaharui data',
            ],
        );
    }

    public function destroy($id)
    {
        $major = Major::find($id);
        $major->delete();

        return redirect()->back()->with(
            [
                'success' => 'Berhasil menghapus data',
            ]
        );
    }
}
