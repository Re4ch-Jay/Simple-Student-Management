<?php

namespace Tests\Feature\API;

use App\Models\Major;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentAPITest extends TestCase
{
    use RefreshDatabase;

    private $admin;
    private $major;
    private $student;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create();
        $this->major = Major::factory()->create();
        $this->student = Student::factory()->create([
            'major_id' => $this->major->id,
        ]);
    }

    /**
     * A basic feature test example.
     */
    public function test_admin_can_get_all_students(): void
    {

        
        $response = $this->actingAs($this->admin)->get('/api/v1/students');

        $response->assertStatus(200);

    }

    public function test_admin_can_update_student(): void
    {

        $response = $this->actingAs($this->admin)->put('/api/v1/students/'. $this->student->id, [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'dob' => '2015-12-17',
            'pob' => 'Some place',
            'address' => 'some place',
            'phone_number' => '012345678',
            'gender' => 'Male',
            'email' => 'john@john.com',
            'major_id' => $this->major->id,
        ]);

        $response->assertStatus(200);

    }

    public function test_admin_can_delete_student(): void
    {

        $admin = User::factory()->create();
        $major = Major::factory()->create();
        $student = Student::factory()->create([
            'major_id' => $major->id,
        ]);
        
        $response = $this->actingAs($admin)->delete('/api/v1/students/'. $student->id);

        $response->assertStatus(200);

    }
}
