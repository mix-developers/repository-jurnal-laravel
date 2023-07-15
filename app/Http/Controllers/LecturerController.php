<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Dosen',
            'lecturer' => Lecturer::all(),
        ];
        return view('admin.lecturer.index', $data);
    }
}
