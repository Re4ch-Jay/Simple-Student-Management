<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Services\StudentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function __construct(public StudentService $studentService) {

    }
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {

        $students = $this->studentService->getStudents();

        return view('students.index', [
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $majors = Major::query()->get();
        return view('students.create', [
            'majors' => $majors,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $this->studentService->createStudent($request);
        return redirect(route('student.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student):View
    {
        $majors = Major::query()->get();
        return view('students.edit', [
            'majors' => $majors,
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student):RedirectResponse
    {
        $this->studentService->updateStudent($request, $student);

        return redirect(route('student.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student):RedirectResponse
    {
        $this->studentService->destroyStudent($student);

        return back();
    }
}
