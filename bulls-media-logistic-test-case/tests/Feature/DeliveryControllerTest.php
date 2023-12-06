<?php

use App\Models\User;
use App\Models\Package;
use App\Models\Address;
use App\Models\Delivery;
use \Illuminate\Support\Facades\Bus;
use App\Jobs\CreateExternalDeliveryJob;

it('lists all deliveries', function () {
    $user = User::factory()->create();
    Delivery::factory(2)->state(['user_id' => $user->id])->forEachSequence([
        'package_id' => Package::factory()->create(['user_id' => $user])->id,
        'address_id' => Address::factory()->create(['user_id' => $user])->id,
    ])->create();
    $response = $this->actingAs($user)->getJson('/api/delivery');
    $response->assertStatus(200);
});

it('displays a specific delivery', function () {
    $user = User::factory()->create();
    $package = Package::factory()->create(['user_id' => $user]);
    $address = Address::factory()->create(['user_id' => $user]);
    $delivery = Delivery::factory()->create([
        'user_id' => $user->id,
        'package_id' => $package->id,
        'address_id' => $address->id,
    ]);

    $response = $this->actingAs($user)->getJson("/api/delivery/{$delivery->id}");
    $response->assertStatus(200);
});

it('successfully creates a delivery', function () {
    Bus::fake([
        CreateExternalDeliveryJob::class
    ]);
    $user = User::factory()->create();
    $package = Package::factory()->create(['user_id' => $user]);
    $address = Address::factory()->create(['user_id' => $user]);
    $data = [
        'delivery_provider' => 'novaposhta',
        'package_id' => $package->id,
        'address_id' => $address->id,
    ];

    $response = $this->actingAs($user)->postJson('/api/delivery', $data);
    Bus::assertDispatched(CreateExternalDeliveryJob::class);
    $response->assertStatus(201);
});

it('updates an delivery successfully', function () {
    $user = User::factory()->create();
    $package = Package::factory()->create(['user_id' => $user]);
    $address = Address::factory()->create(['user_id' => $user]);
    $delivery = Delivery::factory()->create([
        'user_id' => $user->id,
        'package_id' => $package->id,
        'address_id' => $address->id,
    ]);
    $updatedData = [
        'delivery_provider' => 'oldposhta',
    ];

    $response = $this->actingAs($user)->putJson("/api/delivery/{$delivery->id}", $updatedData);
    $response->assertStatus(200);
    $this->assertDatabaseHas('deliveries', $updatedData);
});

it('deletes an delivery successfully', function () {
    $user = User::factory()->create();
    $package = Package::factory()->create(['user_id' => $user]);
    $address = Address::factory()->create(['user_id' => $user]);
    $delivery = Delivery::factory()->create([
        'user_id' => $user->id,
        'package_id' => $package->id,
        'address_id' => $address->id,
    ]);

    $response = $this->actingAs($user)->deleteJson("/api/delivery/{$delivery->id}");
    $response->assertStatus(204);
    $this->assertDatabaseMissing('deliveries', ['id' => $delivery->id]);
});
