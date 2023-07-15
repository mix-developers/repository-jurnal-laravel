<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Mahasiswa'
        ];
        return view('admin.student.index', $data);
    }
}
