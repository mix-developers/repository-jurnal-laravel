<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MentorController extends Controller
{
    public function create()
    {
        $data = [
            'title' => 'Input Pembimbing dan Penguji',
            'lecturer' => Lecturer::where('id_major', Auth::user()->id_major)->get(),
            'pembimbing' => Mentor::where('id_user', Auth::user()->id)->where('type', 'pembimbing')->get(),
            'penguji' => Mentor::where('id_user', Auth::user()->id)->where('type', 'penguji')->get(),
        ];
        return view('mahasiswa.mentor.create', $data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_lecturer' => 'required',
        ]);

        $mentor = new Mentor();
        $mentor->id_lecturer = $request->id_lecturer;
        $mentor->type = $request->type;
        if (Auth::user()->role == 'mahasiswa') {
            $mentor->id_user = Auth::user()->id;
            $check_penguji = Mentor::where('id_user',Auth::user()->id)->where('type','penguji')->count();
            $check_pembimbing = Mentor::where('id_user',Auth::user()->id)->where('type','pembimbing')->count();
        } else {
            $check_penguji = Mentor::where('id_user',$request->id_user)->where('type','penguji')->count();
            $check_pembimbing = Mentor::where('id_user',$request->id_user)->where('type','pembimbing')->count();
            $mentor->id_user = $request->id_user;
        }
        if($request->type =='pembimbing' && $check_pembimbing >=2){
         
                return redirect()->back()->with(
                    [
                        'danger' => 'Pembimbing tidak bisa lebih dari 2',
                    ],
                );
        }
        elseif($request->type=='penguji' && $check_penguji >=3){
         
                return redirect()->back()->with(
                    [
                        'danger' => 'Penguji tidak bisa lebih dari 3',
                    ],
                );
        }else{
            $mentor->save();
        }

        return redirect()->back()->with(
            [
                'success' => 'Berhasil menambahkan data',
            ],
        );
    }
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'id_lecturer' => 'required',
        ]);

        $mentor = Mentor::find($id);
        $mentor->id_lecturer = $request->id_lecturer;
        $mentor->type = $request->type;
        $mentor->id_user = Auth::user()->id;
        $mentor->save();


        return redirect()->back()->with(
            [
                'success' => 'Berhasil memperbaharui data',
            ],
        );
    }
    public function destroy($id)
    {
        $mentor = Mentor::find($id);
        $mentor->delete();

        return redirect()->back()->with(
            [
                'success' => 'Berhasil menghapus data',
            ]
        );
    }
}
