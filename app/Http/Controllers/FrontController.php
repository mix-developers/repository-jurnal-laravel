<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Theses;
use Illuminate\Http\Request;

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
        $journal = Journal::getSearch($keywoard);
        $theses = Theses::getSearch($keywoard);
        $data = [
            'title' => 'Search : ' . $keywoard,
            'journal' => $journal,
            'theses' => $theses,
            'results' => $journal->count() + $theses->count(),
        ];
        session()->flashInput($request->input());
        return view('pages.search', $data);
    }
}
