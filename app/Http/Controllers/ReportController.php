<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Lecturer;
use App\Models\Theses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Output\Theme;
use Barryvdh\DomPDF\Facade as PDF;
// use PDF;

class ReportController extends Controller
{
    public function mahasiswa()
    {
        $data = [
            'title' => 'Laporan data mahasiswa',
            'users' => User::where('role', 'mahasiswa')->where('id_major', Auth::user()->id_major)->get(),
        ];
        return view('jurusan.report.mahasiswa', $data);
    }
    public function journal()
    {
        $data = [
            'title' => 'Laporan data jurnal',
            'journal' => Journal::where('id_major', Auth::user()->id_major)->get(),
        ];
        return view('jurusan.report.journal', $data);
    }
    public function theses()
    {
        $data = [
            'title' => 'Laporan data skripsi',
            'theses' => Theses::where('id_major', Auth::user()->id_major)->get(),
        ];

        return view('jurusan.report.theses', $data);
    }
    public function dosen()
    {

        $data = [
            'title' => 'Laporan data dosen',
            'lecturer' => Lecturer::where('id_major', Auth::user()->id_major)->get(),
        ];
        return view('jurusan.report.dosen', $data);
    }
    public function exportJournal()
    {
        $data = Journal::where('id_major', Auth::user()->id_major)->get();

        $pdf =  \PDF::loadView('jurusan.report.pdf.pdf_Journal', [
            'data' => $data,
        ])->setPaper('a4', 'potrait')->setOption(['dpi' => 150]);

        return $pdf->stream('Data Jurnal '  . date('d-m-Y') . '.pdf');
    }
    public function exportTheses()
    {
        $data = Theses::where('id_major', Auth::user()->id_major)->get();

        $pdf =  \PDF::loadView('jurusan.report.pdf.pdf_theses', [
            'data' => $data,
        ])->setPaper('a4', 'potrait')->setOption(['dpi' => 150]);

        return $pdf->stream('Data Skripsi '  . date('d-m-Y') . '.pdf');
    }
    public function exportMahasiswa()
    {
        $data = User::where('role', 'mahasiswa')->where('id_major', Auth::user()->id_major)->get();

        $pdf = \PDF::loadView('jurusan.report.pdf.pdf_mahasiswa', [
            'data' => $data,
        ])->setPaper('a4', 'potrait')->setOption(['dpi' => 150]);

        return $pdf->stream('Data Mahasiswa ' . date('d-m-Y') . '.pdf');
    }
    public function exportDosen()
    {
        $data = Lecturer::where('id_major', Auth::user()->id_major)->get();

        $pdf = \PDF::loadView('jurusan.report.pdf.pdf_dosen', [
            'data' => $data,
        ])->setPaper('a4', 'potrait')->setOption(['dpi' => 150]);

        return $pdf->stream('Data Dosen ' . date('d-m-Y') . '.pdf');
    }
}
