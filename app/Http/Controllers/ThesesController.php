<?php

namespace App\Http\Controllers;

use App\Models\AdditionalFile;
use App\Models\FileCategory;
use App\Models\Student;
use App\Models\Theses;
use App\Models\User;
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
        $theses = Theses::find($id);
        $user = User::find($theses->id_user);
        $data = [
            'title' => 'Data Skripsi',
            'student' => $user,
            'theses' => $theses,
            'file_category' => FileCategory::all(),
            'additional_file' => AdditionalFile::where('id_user', $theses->id_user)->get(),
        ];
        // dd(AdditionalFile::where('id_user', $theses->id_user)->get());
        return view('admin.theses.show', $data);
    }
    public function mahasiswa()
    {
        $data = [
            'title' => 'Skripsi',
            'student' => User::find(Auth::user()->id),
            'theses' => Theses::where('id_user', Auth::user()->id)->first(),
            'file_category' => FileCategory::all(),
            'additional_file' => AdditionalFile::where('id_user', Auth::user()->id)->get(),
        ];
        return view('mahasiswa.theses.index', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:pdf'],
            'file2' => ['required', 'file', 'mimes:pdf'],
            'title' => ['required', 'string'],
            'year' => ['required', 'string'],
            'id_user' => ['required'],
            'id_major' => ['required'],
        ]);

        if ($request->hasFile('file')) {
            $filename = Str::random(32) . '.' . $request->file('file')->getClientOriginalExtension();
            $file_path = $request->file('file')->storeAs('public/files', $filename);
        }
        if ($request->hasFile('file2')) {
            $filename2 = Str::random(32) . '.' . $request->file('file2')->getClientOriginalExtension();
            $file_path2 = $request->file('file2')->storeAs('public/files', $filename2);
        }

        $files = new Theses();
        $files->title  = $request->title;
        $files->year  = $request->year;
        $files->id_user  = $request->id_user;
        $files->id_major  = $request->id_major;
        $files->file = isset($file_path) ? $file_path : '';
        $files->file2 = isset($file_path2) ? $file_path2 : '';

        foreach (FileCategory::all() as $item) {
            $additional_file = new AdditionalFile();

            if ($request->hasFile('add_file' . $item->id)) {
                $filename = 'File-' . Str::slug($item->category) . '-' . Str::random(32) . '.' . $request->file('add_file' . $item->id)->getClientOriginalExtension();
                $file_path  = $request->file('add_file' . $item->id)->storeAs('public/files', $filename);

                $additional_file->id_user = Auth::user()->id;
                $additional_file->id_file_category = $item->id;
                $additional_file->file = isset($file_path) ? $file_path : '';
                $additional_file->save();
            }
        }
        if ($files->save()) {
            return redirect()->back()->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->back()->with('danger', 'Gagal menambahkan data');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'file' => ['nullable', 'file', 'mimes:pdf'],
            'file2' => ['nullable', 'file', 'mimes:pdf'],
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
        if ($request->hasFile('file2')) {
            if ($files->file2 != '') {
                Storage::delete($files->file2);
            }

            $filename2 = Str::random(32) . '.' . $request->file('file2')->getClientOriginalExtension();
            $file_path2 = $request->file('file2')->storeAs('public/files', $filename2);
        } else {
            $file_path2 = $files->file2;
        }


        $files->title  = $request->title;
        $files->year  = $request->year;
        $files->file = isset($file_path) ? $file_path : $files->file;
        $files->file2 = isset($file_path2) ? $file_path2 : $files->file2;
        if ($files->save()) {
            return redirect()->back()->with('success', 'Berhasil mengubah data');
        } else {
            return redirect()->back()->with('danger', 'Gagal mengubah data');
        }
    }
    public function storeAdditional(Request $request)
    {
        $request->validate([
            'file' => ['nullable', 'file', 'mimes:pdf'],
            'id_category' => ['required'],
        ]);
        $file_category = FileCategory::find($request->id_category);

        $additional_file = new AdditionalFile();

        if ($request->hasFile('file' . $file_category->id)) {
            $filename = 'File-' . Str::slug($file_category->category) . '-' . Str::random(32) . '.' . $request->file('file' . $file_category->id)->getClientOriginalExtension();
            $file_path  = $request->file('file' . $file_category->id)->storeAs('public/files', $filename);
        }
        $additional_file->id_user = Auth::user()->id;
        $additional_file->id_file_category = $file_category->id;
        $additional_file->file = isset($file_path) ? $file_path : '';
        $additional_file->save();

        return redirect()->back()->with('success', 'Berhasil menambah file');
    }
    public function updateAdditional(Request $request, $id)
    {
        $request->validate([
            'file' => ['nullable', 'file', 'mimes:pdf'],
        ]);

        $additional_file = AdditionalFile::findOrFail($id);
        if ($request->hasFile('file')) {
            if ($additional_file->file != '') {
                Storage::delete($additional_file->file);
            }

            $filename = 'File-' . Str::slug($request->category) . '-' . Str::random(32) . '.' . $request->file('file')->getClientOriginalExtension();
            $file_path = $request->file('file')->storeAs('public/files', $filename);
        } else {
            $file_path = $additional_file->file;
        }
        $additional_file->file = isset($file_path) ? $file_path : $additional_file->file;
        if ($additional_file->save()) {
            return redirect()->back()->with('success', 'Berhasil mengubah file');
        } else {
            return redirect()->back()->with('danger', 'Gagal mengubah file');
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
