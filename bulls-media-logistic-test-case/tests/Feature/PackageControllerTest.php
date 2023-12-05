<?php

use App\Models\User;
use App\Models\Package;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

it('lists all package', function () {
    $user = User::factory()->create();
    Package::factory()->create(['user_id' => $user->id]);
    $response = $this->actingAs($user)->getJson('/api/package');
    $response->assertStatus(200);
});

it('displays a specific package', function () {
    $user = User::factory()->create();
    $package = Package::factory()->create(['user_id' => $user->id]);
    $response = $this->actingAs($user)->getJson("/api/package/{$package->id}");
    $response->assertStatus(200);
});

it('successfully creates a package', function () {
    $user = User::factory()->create();
    $package = Package::factory()->make();
    $data = [
        'test' => 'lalal',
        'width' => $package->width,
        'height' => $package->height,
        'length' => $package->length,
        'weight' => $package->weight,
        'type' => $package->type,
        'description' => $package->description,
        'width_unit' => $package->width_unit,
        'height_unit' => $package->height_unit,
        'length_unit' => $package->length_unit,
        'weight_unit' => $package->weight_unit,
    ];

    $response = $this->actingAs($user)->postJson('/api/package', $data);

    $response->assertStatus(201);
});

it('updates an package successfully', function () {
    $user = User::factory()->create();
    $package = Package::factory()->create(['user_id' => $user]);
    $updatedData = [
        'width' => 9.9,
        'type' => 'box'
    ];

    $response = $this->actingAs($user)->putJson("/api/package/{$package->id}", $updatedData);
    $response->assertStatus(200);
    $this->assertDatabaseHas('packages', [...$updatedData, 'id' => $package->id]);
});

it('deletes an package successfully', function () {
    $user = User::factory()->create();
    $package = Package::factory()->create(['user_id' => $user]);

    $response = $this->actingAs($user)->deleteJson("/api/package/{$package->id}");
    $response->assertStatus(204);
    $this->assertDatabaseMissing('packages', ['id' => $package->id]);
});
