<?php

namespace Tests\Unit;

use App\DTO\DeliveryData;
use Tests\TestCase;
use App\DTO\DeliveryServiceResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class NovaposhtaDeliveryServiceTest extends TestCase
{

    /** @test */
    public function it_creates_delivery_and_returns_delivery_service_response()
    {
        $mockClient = \Mockery::mock(Client::class);
        $mockResponse = new Response(200, [], 'mocked response content');

        $mockClient->shouldReceive('post')
            ->once()
            ->andReturn($mockResponse);
        $this->app->instance(Client::class, $mockClient);

        $service = $this->app->make('delivery.novaposhta');

        $deliveryData = new DeliveryData('FIO', '+380950000000', 'some@email.com', 'address', 'address');
        $response = $service->createDelivery($deliveryData);

        $this->assertInstanceOf(DeliveryServiceResponse::class, $response);
        $this->assertEquals('mocked response content', $response->content);
    }
}
