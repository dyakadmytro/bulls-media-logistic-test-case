<?php

use App\Models\User;
use App\Models\Address;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;


it('lists all addresses', function () {
    $user = User::factory()->create();
    Address::factory(5)->state(['user_id' => $user->id])->create();
    $response = $this->actingAs($user)->getJson('/api/address');
    $response->assertStatus(200);
});

it('displays a specific address', function () {
    $user = User::factory()->create();
    $address = Address::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->getJson("/api/address/{$address->id}");
    $response->assertStatus(200)
        ->assertJson([
            'user_id' => $user->id,
            'country' => $address->country,
            'state' => $address->state,
            'city' => $address->city,
            'street' => $address->street,
            'house' => $address->house,
            'postal_code' => $address->postal_code,
        ]);
});

it('successfully creates a address', function () {
    $user = User::factory()->create();
    $address = Address::factory()->make();
    $data = [
        'country' => $address->country,
        'state' => $address->state,
        'city' => $address->city,
        'street' => $address->street,
        'house' => $address->house,
        'postal_code' => $address->postal_code,
    ];

    $response = $this->actingAs($user)->postJson('/api/address', $data);

    $response->assertStatus(201);
});

it('updates an address successfully', function () {
    $user = User::factory()->create();
    $address = Address::factory()->create(['user_id' => $user->id]);
    $updatedData = [
        'country' => 'New Country',
    ];

    $response = $this->actingAs($user)->putJson("/api/address/{$address->id}", $updatedData);
    $response->assertStatus(200);
    $this->assertDatabaseHas('addresses', $updatedData);
});

it('deletes an address successfully', function () {
    $user = User::factory()->create();
    $address = Address::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->deleteJson("/api/address/{$address->id}");
    $response->assertStatus(204);
    $this->assertDatabaseMissing('addresses', ['id' => $address->id]);
});


