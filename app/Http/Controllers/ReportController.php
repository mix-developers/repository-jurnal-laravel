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
        try {
            $data = [
                'title' => 'Laporan data mahasiswa',
                'users' => User::where('role', 'mahasiswa')->where('id_major', Auth::user()->id_major)->get(),
            ];
            return view('jurusan.report.mahasiswa', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with(
                [
                    'danger' => 'terjadi kesalahan : ' . $e->getMessage(),
                ],
            );
        }
    }
    public function journal()
    {
        try {
            $data = [
                'title' => 'Laporan data jurnal',
                'journal' => Journal::where('id_major', Auth::user()->id_major)->get(),
            ];
            return view('jurusan.report.journal', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with(
                [
                    'danger' => 'terjadi kesalahan : ' . $e->getMessage(),
                ],
            );
        }
    }
    public function theses()
    {
        try {
            $data = [
                'title' => 'Laporan data skripsi',
                'theses' => Theses::where('id_major', Auth::user()->id_major)->get(),
            ];

            return view('jurusan.report.theses', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with(
                [
                    'danger' => 'terjadi kesalahan : ' . $e->getMessage(),
                ],
            );
        }
    }
    public function dosen()
    {
        try {
            $data = [
                'title' => 'Laporan data dosen',
                'lecturer' => Lecturer::where('id_major', Auth::user()->id_major)->get(),
            ];
            return view('jurusan.report.dosen', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with(
                [
                    'danger' => 'terjadi kesalahan : ' . $e->getMessage(),
                ],
            );
        }
    }
    public function exportJournal(Request $request)
    {
        try {
            if (!$request->has('from_date') || !$request->has('to_date')) {
                return redirect()->back()->with('danger', 'Mohon isi semua field yang diperlukan.');
            }
            $from_date = $request->from_date;
            $to_date =  $request->to_date;

            // Query untuk mengambil data berdasarkan request
            $query = Journal::where('id_major', Auth::user()->id_major)
                ->where('created_at', '>=', $from_date)
                ->where('created_at', '<=', $to_date);

            $data = $query->get();
            // Pengecekan jika data tidak ditemukan
            if ($data->isEmpty()) {
                return redirect()->back()->with('danger', 'Data tidak ditemukan.');
            }


            $pdf =  \PDF::loadView('jurusan.report.pdf.pdf_Journal', [
                'data' => $data,
                'from_date' => $from_date,
                'to_date' => $to_date
            ])->setPaper('a4', 'potrait')->setOption(['dpi' => 150]);

            return $pdf->stream('Data Jurnal '  . date('d-m-Y') . '.pdf');
        } catch (\Exception $e) {
            return redirect()->back()->with(
                [
                    'danger' => 'terjadi kesalahan : ' . $e->getMessage(),
                ],
            );
        }
    }
    public function exportTheses(Request $request)
    {
        try {
            if (!$request->has('from_date') || !$request->has('to_date')) {
                return redirect()->back()->with('danger', 'Mohon isi semua field yang diperlukan.');
            }
            $from_date = $request->from_date;
            $to_date =  $request->to_date;

            // Query untuk mengambil data berdasarkan request
            $query = Theses::where('id_major', Auth::user()->id_major)
                ->where('created_at', '>=', $from_date)
                ->where('created_at', '<=', $to_date);

            $data = $query->get();
            // Pengecekan jika data tidak ditemukan
            if ($data->isEmpty()) {
                return redirect()->back()->with('danger', 'Data tidak ditemukan.');
            }


            $pdf =  \PDF::loadView('jurusan.report.pdf.pdf_theses', [
                'data' => $data,
                'from_date' => $from_date,
                'to_date' => $to_date
            ])->setPaper('a4', 'potrait')->setOption(['dpi' => 150]);

            return $pdf->stream('Data Skripsi '  . date('d-m-Y') . '.pdf');
        } catch (\Exception $e) {
            return redirect()->back()->with(
                [
                    'danger' => 'terjadi kesalahan : ' . $e->getMessage(),
                ],
            );
        }
    }
    public function exportMahasiswa()
    {
        try {
            $data = User::where('role', 'mahasiswa')->where('id_major', Auth::user()->id_major)->get();

            $pdf = \PDF::loadView('jurusan.report.pdf.pdf_mahasiswa', [
                'data' => $data,
            ])->setPaper('a4', 'potrait')->setOption(['dpi' => 150]);

            return $pdf->stream('Data Mahasiswa ' . date('d-m-Y') . '.pdf');
        } catch (\Exception $e) {
            return redirect()->back()->with(
                [
                    'danger' => 'terjadi kesalahan : ' . $e->getMessage(),
                ],
            );
        }
    }
    public function exportDosen()
    {
        try {
            $data = Lecturer::where('id_major', Auth::user()->id_major)->get();

            $pdf = \PDF::loadView('jurusan.report.pdf.pdf_dosen', [
                'data' => $data,
            ])->setPaper('a4', 'potrait')->setOption(['dpi' => 150]);

            return $pdf->stream('Data Dosen ' . date('d-m-Y') . '.pdf');
        } catch (\Exception $e) {
            return redirect()->back()->with(
                [
                    'danger' => 'terjadi kesalahan : ' . $e->getMessage(),
                ],
            );
        }
    }
}
