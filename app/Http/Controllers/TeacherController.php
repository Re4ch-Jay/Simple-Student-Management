<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::query()->filter(request(['search']))->latest()->paginate(20);
        return view('teachers.index', [
            'teachers' => $teachers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $majors = Major::query()->get();
        return view('teachers.create', [
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
            'email' => ['required', 'unique:' . Teacher::class],
            'major_id' => ['required'],
            'subject' => ['required'],
        ]);

        Teacher::create($validated);

        return redirect(route('teacher.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        $majors = Major::query()->get();
        return view('teachers.edit', [
            'teacher' => $teacher,
            'majors' => $majors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
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
            'subject' => ['required'],
        ]);

        $teacher->update($validated);

        return redirect(route('teacher.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect(route('teacher.index'));
    }
}
