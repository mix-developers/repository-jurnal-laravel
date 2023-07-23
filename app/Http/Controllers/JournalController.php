<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $student = Student::where('identity', Auth::user()->identity)->first();
        $data = [
            'title' => 'Journal',
            'journal' => Journal::where('id_student', $student->id)->get(),
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
}
