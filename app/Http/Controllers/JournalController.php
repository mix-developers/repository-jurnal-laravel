<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\JournalFile;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JournalController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Jurnal',
            'journal' => Journal::all(),
        ];
        return view('admin.journal.index', $data);
    }
    public function show($id)
    {
        $ID = decrypt($id);
        $journal = Journal::find($ID);
        $data = [
            'title' => 'Detail Journal ' . $journal->students->full_name,
            'journal' => $journal,
        ];
        return view('admin.journal.show', $data);
    }
    public function mahasiswa()
    {
        $journal = Journal::where('id_user', Auth::user()->id)->first();
        $data = [
            'title' => 'Journal Anda',
            'journal' => $journal,
            'files' => JournalFile::where('id_journal', $journal->id)->get(),
        ];
        return view('mahasiswa.journal.index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Journal',
        ];
        return view('mahasiswa.journal.create', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:pdf'],
            'file2' => ['required', 'file', 'mimes:pdf'],
            'title' => ['required', 'string'],
            'keywoards' => ['required', 'string'],
            'abstract' => ['required', 'string'],
        ]);


        if ($request->hasFile('file')) {
            $filename = Str::random(32) . '.' . $request->file('file')->getClientOriginalExtension();
            $file_path = $request->file('file')->storeAs('public/files', $filename);
        }
        if ($request->hasFile('file2')) {
            $filename2 = Str::random(32) . '.' . $request->file('file2')->getClientOriginalExtension();
            $file_path2 = $request->file('file2')->storeAs('public/files', $filename2);
        }

        $journal = new Journal();
        $journal->title  = $request->title;
        $journal->keywoards  = $request->keywoards;
        $journal->abstract  = $request->abstract;
        $journal->id_user  = Auth::user()->id;
        $journal->id_major  = Auth::user()->id_major;
        $journal->save();

        $files = new JournalFile();
        $files->journals()->associate($journal);
        $files->file = isset($file_path) ? $file_path : '';
        $files->file2 = isset($file_path2) ? $file_path2 : '';
        if ($files->save()) {
            return redirect()->back()->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->back()->with('danger', 'Gagal menambahkan data');
        }
    }
}
