<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::query()->latest()->paginate(20);


        return view('students.index', [
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $majors = Major::query()->get();
        return view('students.create', [
            'majors' => $majors,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'dob' => ['required'],
            'pob' => ['required'],
            'address' => ['required'],
            'phone_number' => ['required', 'numeric'],
            'gender' => ['required'],
            'email' => ['required', 'unique:' . Student::class],
            'major_id' => ['required'],
        ]);

        Student::create($validated);

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
    public function edit(Student $student)
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
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'dob' => ['required'],
            'pob' => ['required'],
            'address' => ['required'],
            'phone_number' => ['required', 'numeric'],
            'gender' => ['required'],
            'email' => ['required'],
            'major_id' => ['required'],
        ]);

        $student->update($validated);

        return redirect(route('student.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return back();
    }
}
