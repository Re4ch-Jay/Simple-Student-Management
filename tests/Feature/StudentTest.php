<?php

use App\Models\Major;
use App\Models\User;
use App\Models\Student;

test('unauthenticated admin can not see the student screen', function () {

    $this
        ->get('/student')
        ->assertStatus(302);
});

test('student screen to be rendered ', function () {

    $user = User::factory()->create();

    $this
        ->actingAs($user)
        ->get('/student')
        ->assertStatus(200);
});

test('student screen can be search', function () {

    $user = User::factory()->create();
    $major = Major::factory()->create();
    $student = Student::factory()->create([
        'major_id' => $major->id,
    ]);

    $this
        ->actingAs($user)
        ->get('/student?search='.$student->name.'')
        ->assertStatus(200);
});

test('student create screen can be rendered', function () {

    $user = User::factory()->create();

    $this
        ->actingAs($user)
        ->get('/student/create')
        ->assertStatus(200);
});

test('student create screen can be stored', function () {

    $user = User::factory()->create();
    $major = Major::factory()->create();

    $this
        ->actingAs($user)
        ->post('/student', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'dob' => '2015-12-17',
            'pob' => 'Some place',
            'address' => 'some place',
            'phone_number' => '012345678',
            'gender' => 'Male',
            'email' => 'john@john.com',
            'major_id' => $major->id,
        ])
        ->assertStatus(302);
});

test('student edit screen can be rendered', function () {

    $user = User::factory()->create();
    $major = Major::factory()->create();
    $student = Student::factory()->create([
        'major_id' => $major->id,
    ]);

    $this
        ->actingAs($user)
        ->get('/student/'. $student->id . '/edit')
        ->assertStatus(200);
});

test('student edit screen can be updated', function () {

    $user = User::factory()->create();
    $major = Major::factory()->create();
    $student = Student::factory()->create([
        'major_id' => $major->id,
    ]);

    $this
        ->actingAs($user)
        ->put('/student/'. $student->id , [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'dob' => '2015-12-17',
            'pob' => 'Some place',
            'address' => 'some place',
            'phone_number' => '012345678',
            'gender' => 'Male',
            'email' => 'john@john.com',
            'major_id' => $major->id,
        ])
        ->assertStatus(302);
});

test('student screen can be deleted', function () {

    $user = User::factory()->create();
    $major = Major::factory()->create();
    $student = Student::factory()->create([
        'major_id' => $major->id,
    ]);

    $this
        ->actingAs($user)
        ->delete('/student/'. $student->id)
        ->assertStatus(302);
});
