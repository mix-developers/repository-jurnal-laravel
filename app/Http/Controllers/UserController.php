<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $identity = Auth::user()->identity;
        $student = Student::where('identity', $identity)->first();
        $data = [
            'title' => 'My Profile',
            'student' => $student,
        ];
        return view('mahasiswa.user.profile', $data);
    }
}
