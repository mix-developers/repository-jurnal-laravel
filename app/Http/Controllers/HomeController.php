<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Theses;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'mahasiswa' => User::where('role', 'mahasiswa')->count(),
            'dosen' =>  User::where('role', 'dosen')->count(),
            'jurnal' =>  Journal::count(),
            'skripsi' =>  Theses::count(),
        ];
        return view('admin.dashboard', $data);
    }
    public function mahasiswa()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('mahasiswa.dashboard', $data);
    }
    public function jurusan()
    {
        $data = [
            'title' => 'Dashboard',
            'mahasiswa' => User::where('role', 'mahasiswa')->count(),
            'dosen' =>  User::where('role', 'dosen')->count(),
            'jurnal' =>  Journal::count(),
            'skripsi' =>  Theses::count(),
        ];
        return view('jurusan.dashboard', $data);
    }
}
