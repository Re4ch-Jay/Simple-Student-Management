<?php

namespace App\Services;

use App\Models\Major;
use App\Models\Student;
use App\Models\Teacher;

class DashboardService {

    /**
     * @return array of Student, Major, Teacher
     */
    public function getDashboard():array {
        $students = Student::query()->get()->count();
        $majors = Major::query()->get()->count();
        $teachers = Teacher::query()->get()->count();
        
        return [
            'students' => $students,
            'majors' => $majors,
            'teachers' => $teachers,
        ];
    }
}

?>