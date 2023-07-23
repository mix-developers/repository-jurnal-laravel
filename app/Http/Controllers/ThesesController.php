<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Theses;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ThesesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Skripsi',
            'theses' => Theses::all(),
        ];
        return view('admin.theses.index', $data);
    }
    public function show($id)
    {
        $ID = decrypt($id);
        $theses = Theses::find($ID);
        $data = [
            'title' => 'Detail Skripsi ' . $theses->students->full_name,
            'theses' => $theses,
        ];
        return view('admin.theses.show', $data);
    }
    public function mahasiswa()
    {
        $student = Student::where('identity', Auth::user()->identity)->first();
        $data = [
            'title' => 'Skripsi',
            'student' => $student,
            'theses' => Theses::where('id_student', $student->id)->first(),
        ];
        return view('mahasiswa.theses.index', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:pdf'],
            'title' => ['required', 'string'],
            'year' => ['required', 'string'],
            'id_student' => ['required'],
            'id_major' => ['required'],
        ]);


        if ($request->hasFile('file')) {
            $filename = Str::random(32) . '.' . $request->file('file')->getClientOriginalExtension();
            $file_path = $request->file('file')->storeAs('public/files', $filename);
        }

        $files = new Theses();
        $files->title  = $request->title;
        $files->year  = $request->year;
        $files->id_student  = $request->id_student;
        $files->id_major  = $request->id_major;
        $files->file = isset($file_path) ? $file_path : '';
        if ($files->save()) {
            return redirect()->back()->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->back()->with('danger', 'Gagal menambahkan data');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:pdf'],
            'title' => ['required', 'string'],
            'year' => ['required', 'string'],
        ]);

        $files = Theses::findOrFail($id);
        if ($request->hasFile('file')) {
            if ($files->file != '') {
                Storage::delete($files->file);
            }

            $filename = Str::random(32) . '.' . $request->file('file')->getClientOriginalExtension();
            $file_path = $request->file('file')->storeAs('public/files', $filename);
        } else {
            $file_path = $files->file;
        }


        $files->title  = $request->title;
        $files->year  = $request->year;
        $files->file = isset($file_path) ? $file_path : $file_path;
        if ($files->save()) {
            return redirect()->back()->with('success', 'Berhasil mengubah data');
        } else {
            return redirect()->back()->with('danger', 'Gagal mengubah data');
        }
    }
    public function download($id)
    {
        $theses = Theses::where('id', $id)->first();
        $filePath = storage_path('app/' . $theses->file);
        $fileName = Carbon::now()->toDateTimeString() . '-' . 'skripsi' . '.pdf';

        return response()->file($filePath, ['Content-Disposition' => 'attachment; filename="' . $fileName . '"']);
    }
}
