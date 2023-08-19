<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherFeatureTest extends TestCase
{
    use RefreshDatabase;
    private User $admin;

    public function setUp():void {
        parent::setUp();

        $this->admin = User::factory()->create();
    }

    /** @test */
    public function unauthenticated_admin_cannot_see_teacher_screen()
    {
        $response = $this->get('/teacher');
        $response->assertRedirect(route('login'));
        $response->assertStatus(302);
    }

    /** @test */
    public function teacher_screen_can_be_rendered()
    {
        $response = $this->actingAs($this->admin)->get('/teacher');
        $response->assertStatus(200);
    }

    /** @test */
    public function teacher_screen_can_be_searched()
    {
        $teacherName = getTeacher()->name;
        $response = $this->actingAs($this->admin)->get('/teacher?search=' . $teacherName);
        $response->assertStatus(200);
    }

    /** @test */
    public function teacher_create_screen_can_be_rendered()
    {
        $response = $this->actingAs($this->admin)->get('/teacher/create');
        $response->assertStatus(200);
    }

    /** @test */
    public function teacher_create_screen_can_be_stored()
    {
        $response = $this->actingAs($this->admin)->post('/teacher', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'dob' => '2015-12-17',
            'pob' => 'Some place',
            'address' => 'some place',
            'phone_number' => '012345678',
            'gender' => 'Male',
            'email' => 'john@john.com',
            'major_id' => getMajor()->id,
        ]);
        $response->assertStatus(302);
    }

    /** @test */
    public function teacher_edit_screen_can_be_rendered()
    {
        $teacherId = getTeacher()->id;
        $response = $this->actingAs($this->admin)->get('/teacher/' . $teacherId . '/edit');
        $response->assertStatus(200);
    }

    /** @test */
    public function teacher_edit_screen_can_be_updated()
    {
        $teacherId = getTeacher()->id;
        $response = $this->actingAs($this->admin)->put('/teacher/' . $teacherId, [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'dob' => '2015-12-17',
            'pob' => 'Some place',
            'address' => 'some place',
            'phone_number' => '012345678',
            'gender' => 'Male',
            'email' => 'john@john.com',
            'major_id' => getMajor()->id,
        ]);
        $response->assertStatus(302);
    }

    /** @test */
    public function teacher_screen_can_be_deleted()
    {
        $teacherId = getTeacher()->id;
        $response = $this->actingAs($this->admin)->delete('/teacher/' . $teacherId);
        $response->assertStatus(302);
    }

}
