<?php

namespace App\Http\Controllers;

use App\Models\AdditionalFile;
use App\Models\FileCategory;
use App\Models\Journal;
use App\Models\JournalFile;
use App\Models\JournalStatus;
use App\Models\Major;
use App\Models\Mentor;
use App\Models\Student;
use App\Models\Theses;
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
        $journal = Journal::where('id_user', $student->id)->first();
        if ($journal != null) {
            $files = JournalFile::where('id_journal', $journal->id)->latest()->first();
            $journal_status = JournalStatus::where('id_journal', $journal->id)->get();
        } else {
            $files = null;
            $journal_status = null;
        }
        $data = [
            'pembimbing' => Mentor::where('id_user', $id)->where('type', 'pembimbing')->get(),
            'penguji' => Mentor::where('id_user', $id)->where('type', 'penguji')->get(),
            'title' => 'Detail Mahasiswa ' . $student->name,
            'student' => $student,
            'mentor' => Mentor::getMentor($student->id),
            'mentor_test' => Mentor::getMentorTest($student->id),
            'journal' => Journal::where('id_user', $student->id)->first(),
            'theses' => Theses::where('id_user', $student->id)->first(),
            'additional_file' => AdditionalFile::where('id_user', $student->id)->get(),
            'file_category' => FileCategory::all(),
            'files' => $files,
            'journal_statuses' => $journal_status,
        ];
        return view('admin.student.show', $data);
    }
}
