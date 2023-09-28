<?php
namespace App\Services;

use App\Models\Student;
use Illuminate\Http\Request;
class StudentService {
    /**
     * GET ALL STUDENTS, 
     * FILTER BY search,
     * PAGINATE 10
     * @return Student
     */
    public function getStudents() {
        return Student::query()->filter(request(['search']))->latest()->paginate(20);
    }

    /**
     * CREATE STUDENT
     * @param Request $request
     * @return Student
     */
    public function createStudent(Request $request): Student {

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

        return Student::create($validated);
        // return redirect(route('student.index'));
    }

    /**
     * UPDATE STUDENT
     * @param Request $request
     * @param Student $student
     * @return boolean
     */

    public function updateStudent(Request $request, Student $student): Bool {

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

        return $student->update($validated);
        // return redirect(route('student.index'));
    }

    /**
     * @param Student $student
     * @return boolean
     */
    public function destroyStudent(Student $student): Bool {
        return $student->delete();
    }
}

?>