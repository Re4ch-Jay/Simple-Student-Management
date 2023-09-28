<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct(public StudentService $studentService) {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = $this->studentService->getStudents();

        return $students;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = $this->studentService->createStudent($request);

        return $student;
    }

    public function update(Request $request, Student $student) {

        $student = $this->studentService->updateStudent($request, $student);
        
        return $student;
    }

    public function destroy(Student $student) {

        $this->studentService->destroyStudent($student);
        
        return [
            'status' => '200',
            'message' => 'Successfully Deleted',
        ];
    }
}
