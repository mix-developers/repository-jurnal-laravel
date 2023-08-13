<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Lecturer;
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
            'theses' => Theses::getAll()
        ];
        return view('pages.theses', $data);
    }
    public function journal()
    {
        $data = [
            'title' => 'Jurnal',
            'journal' => Journal::getAll(),
        ];
        return view('pages.journal', $data);
    }
    public function search(Request $request)
    {
        $keywoard = $request->keywoard;
        $type = $request->type;
        if ($type == 'journal') {
            $journal = Journal::getSearch($keywoard)->paginate(20);
            $theses = null;
            $results = Journal::getSearch($keywoard)->count();
        } else if ($type == 'theses') {
            $journal = null;
            $theses = Theses::getSearch($keywoard)->paginate(20);
            $results = Theses::getSearch($keywoard)->count();
        } else if ($type == 'lecturer') {
            $journal = null;
            $theses = null;
            $results = Lecturer::getSearch($keywoard)->count();
        }
        // dd($search);
        $data = [
            'title' => 'Search : ' . $keywoard,
            'journal' => $journal,
            'theses' => $theses,
            'results' => $results,

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
}
