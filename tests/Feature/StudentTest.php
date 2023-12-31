<?php

use App\Models\Student;

function getStudent() {
    return Student::factory()->create([
        'major_id' => getMajor()->id,
    ]);
}

test('unauthenticated admin can not see the student screen', function () {
    $this->get('/student')
        ->assertRedirect(route('login'))
        ->assertStatus(302);
});

test('student screen to be rendered', function () {
    asAdmin()
        ->get('/student')
        ->assertStatus(200);
});

test('student screen can be search', function () {
    asAdmin()
        ->get('/student?search='.getStudent()->name.'')
        ->assertStatus(200);
});

test('student create screen can be rendered', function () {
    asAdmin()
        ->get('/student/create')
        ->assertStatus(200);
});

test('student create screen can be stored', function () {
    asAdmin()
        ->post('/student', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'dob' => '2015-12-17',
            'pob' => 'Some place',
            'address' => 'some place',
            'phone_number' => '012345678',
            'gender' => 'Male',
            'email' => 'john@john.com',
            'major_id' => getMajor()->id,
        ])
        ->assertRedirect(route('student.index'))
        ->assertStatus(302);
});

test('student edit screen can be rendered', function () {
    asAdmin()
        ->get('/student/'. getStudent()->id . '/edit')
        ->assertStatus(200);
});

test('student edit screen can be updated', function () {
    asAdmin()
        ->put('/student/'. getStudent()->id , [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'dob' => '2015-12-17',
            'pob' => 'Some place',
            'address' => 'some place',
            'phone_number' => '012345678',
            'gender' => 'Male',
            'email' => 'john@john.com',
            'major_id' => getMajor()->id,
        ])
        ->assertRedirect(route('student.index'))
        ->assertStatus(302);
});

test('student screen can be deleted', function () {
    asAdmin()
        ->delete('/student/'. getStudent()->id)
        ->assertStatus(302);
});
