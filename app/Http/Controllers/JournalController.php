<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\JournalFile;
use App\Models\JournalStatus;
use App\Models\Mentor;
use App\Models\Student;
use App\Models\User;
use App\Rules\NotUrl;
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
        // $ID = decrypt($id);
        $journal = Journal::find($id);
        if ($journal != null) {
            $files = JournalFile::where('id_journal', $journal->id)->latest()->first();
            $journal_status = JournalStatus::where('id_journal', $journal->id)->get();
        } else {
            $files = null;
            $journal_status = null;
        }
        $data = [
            'title' => 'Detail Journal ' . $journal->students->full_name,
            'journal' => $journal,
            'files' => $files,
            'journal_statuses' => $journal_status,
        ];
        return view('admin.journal.show', $data);
    }
    public function mahasiswa()
    {
        $journal = Journal::where('id_user', Auth::user()->id)->first();
        if ($journal != null) {
            $files = JournalFile::where('id_journal', $journal->id)->latest()->first();
            $journal_status = JournalStatus::where('id_journal', $journal->id)->get();
        } else {
            $files = null;
            $journal_status = null;
        }
        $data = [
            'title' => 'Journal Anda',
            'journal' => $journal,
            'files' => $files,
            'journal_statuses' => $journal_status,
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
            'file' => ['required', 'file', 'mimes:pdf', 'max:10000'],
            'file2' => ['required', 'file', 'mimes:pdf', 'max:10000'],
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



        $status = new JournalStatus();
        $status->journals()->associate($journal);
        $status->date  = date('d-m-Y');
        $status->id_user  = Auth::user()->id;
        $status->message  = Auth::user()->name . ' Mengajukan Journal';
        $status->id_status  = 1;
        $status->save();


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
    public function storeAdmin(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:pdf', 'max:10000'],
            'file2' => ['required', 'file', 'mimes:pdf', 'max:10000'],
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
        $journal->id_user  = $request->id_user;
        $journal->id_major  = $request->id_major;
        $journal->save();



        $status = new JournalStatus();
        $status->journals()->associate($journal);
        $status->date  = date('d-m-Y');
        $status->id_user  = $request->id_user;
        $status->message  = Auth::user()->name . ' (admin) Upload Journal';
        $status->id_status  = 1;
        $status->save();

        $status = new JournalStatus();
        $status->journals()->associate($journal);
        $status->date  = date('d-m-Y');
        $status->id_user  = Auth::user()->id;
        $status->message  = Auth::user()->name . ' (admin) Verifikasi Journal';
        $status->id_status  = 4;
        $status->save();


        $files = new JournalFile();
        $files->journals()->associate($journal);
        $files->file = isset($file_path) ? $file_path : '';
        $files->file2 = isset($file_path2) ? $file_path2 : '';
        if ($files->save()) {
            return redirect()->back()->with('success', 'Berhasil upload data journal');
        } else {
            return redirect()->back()->with('danger', 'Gagal upload data journal');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'keywoards' => ['required', 'string'],
            'abstract' => ['required', 'string'],
        ]);
        $journal = Journal::find($id);
        $journal->title  = $request->title;
        $journal->keywoards  = $request->keywoards;
        $journal->abstract  = $request->abstract;
        $journal->save();
        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }
    public function updateAdmin(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'keywoards' => ['required', 'string'],
            'abstract' => ['required', 'string'],
            'file' => ['nullable', 'file', 'mimes:pdf', 'max:10000'],
            'file2' => ['nullable', 'file', 'mimes:pdf', 'max:10000'],
        ]);
        $journal = Journal::find($id);
        $journal->title  = $request->title;
        $journal->keywoards  = $request->keywoards;
        $journal->abstract  = $request->abstract;
        $journal->save();

        $files =  JournalFile::find($request->id_file);

        if ($request->hasFile('file')) {
            $filename = Str::random(32) . '.' . $request->file('file')->getClientOriginalExtension();
            $file_path = $request->file('file')->storeAs('public/files', $filename);
        } else {
            $file_path = $files->file;
        }
        if ($request->hasFile('file2')) {
            $filename2 = Str::random(32) . '.' . $request->file('file2')->getClientOriginalExtension();
            $file_path2 = $request->file('file2')->storeAs('public/files', $filename2);
        } else {
            $file_path2 = $files->file2;
        }

        $files->file = isset($file_path) ? $file_path : $files->file;
        $files->file2 = isset($file_path2) ? $file_path2 : $files->file2;
        $files->save();
        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }
    public function check(Request $request)
    {
        $status = new JournalStatus();
        $status->id_journal  = $request->id_journal;
        $status->date  = date('d-m-Y');
        $status->id_user  = Auth::user()->id;
        $status->message  = Auth::user()->role . '(' . Auth::user()->name . ')' . ' melakukan pemeriksaan jurnal';
        $status->id_status  = 2;
        $status->save();
        return redirect()->to('admin/journal/show/' . $request->id_journal);
    }
    public function publish(Request $request, $id)
    {
        $request->validate([
            'link_doi' => ['url'],
        ]);

        $journal = Journal::find($id);
        if ($journal->is_published == 0 || $journal->link_doi == null || $journal->link_doi == "") {
            $journal->link_doi  = $request->link_doi;
            $journal->is_published  = 1;
        } else {
            $journal->link_doi  = "";
            $journal->is_published  = 0;
        }

        if ($journal->save()) {
            return redirect()->back()->with('success', 'Journal berhasil di publish');
        } else {
            return redirect()->back()->with('danger', 'Journal gagal di publish');
        }
    }
    public function accept(Request $request)
    {
        $status = new JournalStatus();
        $status->id_journal  = $request->id_journal;
        $status->date  = date('d-m-Y');
        $status->id_user  = Auth::user()->id;
        if ($request->message == null) {
            $status->message  = 'Jurnal terverifikasi..';
        } else {
            $status->message  = 'Jurnal terverifikasi, catatan : ' . $request->message;
        }
        $status->id_status  = 4;
        $status->save();
        return redirect()->back()->with('success', 'Berhasil berifikasi jurnal');
    }
    public function reject(Request $request)
    {
        $status = new JournalStatus();
        $status->id_journal  = $request->id_journal;
        $status->date  = date('d-m-Y');
        $status->id_user  = Auth::user()->id;
        if ($request->message == null) {
            $status->message  = 'Silahkan revisi jurnal anda';
        } else {
            $status->message  = 'Silahkan revisi jurnal anda, catatan : ' . $request->message;
        }
        $status->id_status  = 3;
        // dd($request);
        $status->save();
        return redirect()->back()->with('success', 'Berhasil berifikasi jurnal');
    }
    public function revisi(Request $request, $id)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:pdf', 'max:10000'],
            'file2' => ['required', 'file', 'mimes:pdf', 'max:10000'],
        ]);

        if ($request->hasFile('file')) {
            $filename = Str::random(32) . '.' . $request->file('file')->getClientOriginalExtension();
            $file_path = $request->file('file')->storeAs('public/files', $filename);
        }
        if ($request->hasFile('file2')) {
            $filename2 = Str::random(32) . '.' . $request->file('file2')->getClientOriginalExtension();
            $file_path2 = $request->file('file2')->storeAs('public/files', $filename2);
        }

        $status = new JournalStatus();
        $status->date  = date('d-m-Y');
        $status->id_journal  = $request->id_journal;
        $status->id_user  = Auth::user()->id;
        $status->message  = Auth::user()->name . ' Mengajukan Revisi Journal';
        $status->id_status  = 1;
        $status->save();

        $files =  JournalFile::find($id);
        $files->file = isset($file_path) ? $file_path : $files->file;
        $files->file2 = isset($file_path2) ? $file_path2 : $files->file2;
        if ($files->save()) {
            return redirect()->back()->with('success', 'Berhasil mengirimkan pengajuan revisi');
        } else {
            return redirect()->back()->with('danger', 'Gagal mengirimkan pengajuan revisi');
        }
    }
}
