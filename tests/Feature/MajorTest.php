<?php


it('displays a listing of majors', function () {
    asAdmin()->get(route('major.index'))
        ->assertStatus(200);
});

it('creates a new major', function () {

    $data = [
        'name' => 'This is new major',
        'description' => 'This is new major description',
    ];


    asAdmin()->post(route('major.store'), $data)
        ->assertRedirect(route('major.index'));
});

it('updates an existing major', function () {

    $data = [
        'name' => 'This is new major',
        'description' => 'This is new major description',
    ];

    asAdmin()->put(route('major.update', getMajor()->id), $data)
        ->assertRedirect(route('major.index'));

    $this->assertSame("This is new major", $data['name']);
    $this->assertSame("This is new major description", $data['description']);
});

it('deletes a major', function () {
    $major = getMajor();

    asAdmin()->delete(route('major.destroy', $major->id))
        ->assertRedirect(route('major.index'));
    $this->assertNull($major->fresh());
});