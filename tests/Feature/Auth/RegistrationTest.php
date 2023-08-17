<?php

use App\Providers\RouteServiceProvider;

test('registration screen can not be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(404);
});
