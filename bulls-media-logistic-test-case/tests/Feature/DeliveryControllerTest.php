<?php

use \App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

it('successfully creates a delivery', function () {
    $user = User::factory()->create();
    $data = [
        'delivery_provider' => 'novaposhta',
        'package_id' => 1,
        'delivery_address' => 'delivery address here, apt. 17'
    ];

    $response = $this->actingAs($user)->postJson('/api/delivery', $data);

    $response->assertStatus(201);
});

it('returns 400 for bad request', function () {
    $user = User::factory()->create();
    $data = [
        'delivery_provider' => 'oldposhta',
        'delivery_address' => 'delivery address here, apt. 3'
    ];

    $response = $this->actingAs($user)->postJson('/api/delivery', $data);

    $response->assertStatus(400);
});

it('returns 401 for unauthorized access', function () {
    $data = [
        'delivery_provider' => 'novaposhta',
        'package_id' => 1,
        'delivery_address' => 'delivery address here, apt. 17'
    ];

    $response = $this->postJson('/api/delivery', $data);

    $response->assertStatus(401);
});

