<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Lecturer;
use App\Models\Mentor;
use App\Models\Riset;
use App\Models\Theses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'journal' => Journal::getFront(),
            'theses' => Theses::getFront(),
        ];
        return view('pages.index', $data);
    }
    public function theses()
    {
        $data = [
            'title' => 'Skripsi',
            'theses' => Theses::getAll()->paginate(20),
        ];
        return view('pages.theses', $data);
    }
    public function journal()
    {
        $data = [
            'title' => 'Jurnal',
            'journal' => Journal::getAll()->paginate(20),
        ];
        return view('pages.journal', $data);
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keywoard');
        $type = $request->input('type');
        $id_riset = $request->input('id_riset');
        $periode = null;
        if ($request->input('from_date') !== null && $request->input('to_date') !== null) {
            $periode = $request->input('periode');
        }

        $from_date = $periode ? null : $request->input('from_date');
        $to_date = $periode ? null : $request->input('to_date');

        $journal = null;
        $theses = null;
        $lecturer = null;
        $results = 0;
        $subtitle = '';

        if ($type == 'journal') {
            $journal = Journal::getSearch($keyword, $from_date, $to_date, $periode, $id_riset)->paginate(20);
            $results = $journal->total();
        } elseif ($type == 'theses') {
            $theses = Theses::getSearch($keyword, $from_date, $to_date, $periode, $id_riset)->paginate(20);
            $results = $theses->total();
        } elseif ($type == 'lecturer') {
            $lecturer = Lecturer::getSearch($keyword)->paginate(20);
            $results = $lecturer->total();
        }

        if ($periode !== null && $from_date === null && $to_date === null) {
            $subtitle = 'Periode ' . $periode . ' Tahun';
        } elseif ($from_date !== null && $to_date !== null) {
            $subtitle = 'Dari tanggal  ' . $from_date . ' Sampai ' . $to_date;
        }

        $bidang_riset = Riset::find($id_riset);

        $data = [
            'title' => 'Search : ' . $keyword,
            'sub_title' =>   $bidang_riset ? $subtitle . '<br> Bidang Riset ' . $bidang_riset->riset : $subtitle,
            'journal' => $journal,
            'theses' => $theses,
            'results' => $results,
            'lecturer' => $lecturer,
        ];

        session()->flashInput($request->input());

        return view('pages.search', $data);
    }


    public function akun()
    {

        $user = User::find(Auth::user()->id);
        $data = [
            'title' => 'Akun',
            'user' => $user,
        ];
        return view('pages.akun', $data);
    }
    public function data_mahasiswa()
    {
        $student = User::where('is_graduate', 1)
            ->where('role', 'mahasiswa')->where('id_major', Auth::user()->id_major)->paginate(20);
        $user = User::find(Auth::user()->id);
        $data = [
            'title' => 'Data Mahasiswa',
            'user' => $user,
            'student' => $student,
        ];
        return view('pages.data_mahasiswa', $data);
    }
}
