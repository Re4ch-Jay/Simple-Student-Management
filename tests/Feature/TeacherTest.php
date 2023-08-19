<?php


use App\Models\Teacher;

function getTeacher() {
    return Teacher::factory()->create([
        'major_id' => getMajor()->id,
    ]);
}

test('unauthenticated admin can not see the teacher screen', function () {
    $this->get('/teacher')
        ->assertRedirect(route('login'))
        ->assertStatus(302);
});

test('teacher screen to be rendered', function () {
    asAdmin()
        ->get('/teacher')
        ->assertStatus(200);
});

test('teacher screen can be search', function () {
    asAdmin()
        ->get('/teacher?search='.getTeacher()->name.'')
        ->assertStatus(200);
});

test('teacher create screen can be rendered', function () {
    asAdmin()
        ->get('/teacher/create')
        ->assertStatus(200);
});

test('teacher create screen can be stored', function () {
    asAdmin()
        ->post('/teacher', [
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
        ->assertStatus(302);
});

test('teacher edit screen can be rendered', function () {
    asAdmin()
        ->get('/teacher/'. getTeacher()->id . '/edit')
        ->assertStatus(200);
});

test('teacher edit screen can be updated', function () {
    asAdmin()
        ->put('/teacher/'. getTeacher()->id , [
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
        ->assertStatus(302);
});

test('teacher screen can be deleted', function () {
    asAdmin()
        ->delete('/teacher/'. getTeacher()->id)
        ->assertStatus(302);
});
