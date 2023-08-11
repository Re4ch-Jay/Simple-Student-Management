<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teacher;

class DashboardController extends Controller
{
    public function index()
    {
        $students = Student::query()->get()->count();
        $majors = Major::query()->get()->count();
        $teachers = Teacher::query()->get()->count();

        return view('dashboard', [
            'students' => $students,
            'majors' => $majors,
            'teachers' => $teachers,
        ]);
    }
}
