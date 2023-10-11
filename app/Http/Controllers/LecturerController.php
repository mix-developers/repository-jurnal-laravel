<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\Major;
use App\Models\Mentor;
use App\Models\User;
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
        $lecturer = Lecturer::find($id);
        $data = [
            'title' => 'Detail Dosen ' . $lecturer->title_first . $lecturer->full_name . ' ' . $lecturer->title_end,
            'mentor' => Mentor::where('id_lecturer', $lecturer->id)->where('type', 'pembimbing')->get(),
            'mentor_test' => Mentor::where('id_lecturer', $lecturer->id)->where('type', 'penguji')->get(),
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

        $check = User::where('identity', $request->identity)->where('role', 'mahasiswa')->count();
        if ($check == 0) {

            $lecturer->save();
            return redirect()->back()->with(
                [
                    'success' => 'Berhasil menambahkan data',
                ],
            );
        } else {
            return redirect()->back()->with(
                [
                    'danger' => 'Gagal menambahkan data, harap check NIP/NIDN tidak boleh sama dengan NIM mahasiswa',
                ],
            );
        }
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
        try {
        $lecturer = Lecturer::find($id);
        $mentor = Mentor::where('id_lecturer', $id)->get();
        foreach ($mentor as $item) {
            $item->delete();
        }
        $user = User::where('identity', $lecturer->identity)->first();
        if ($user != null) {
            $user->delete();
        }
        if ($lecturer->delete()) {
            return redirect()->back()->with(
                [
                    'success' => 'Berhasil menghapus data',
                ]
            );
        } else {
            return redirect()->back()->with(
                [
                    'danger' => 'Gagal menghapus data',
                ]
            );
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('danger', 'Terjadi kesalahan: ' . $e->getMessage());
    }
    }
}
