<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Jurusan',
            'major' => Major::all(),
        ];
        return view('admin.major.index', $data);
    }
}
