<?php

namespace App\Services;

use App\Contracts\DeliveryServiceContract;
use App\DTO\BaseDTO;
use App\DTO\DeliveryServiceResponse;
use GuzzleHttp\Client;

abstract class AbstractDeliveryService implements DeliveryServiceContract
{
    protected Client $client;
    protected array $config;

    public function __construct(Client $client, array $config)
    {
        $this->client = $client;
        $this->config = $config;
    }

    function createDelivery(BaseDTO $deliveryData): DeliveryServiceResponse
    {
        throw new \Exception('overwrite this method!');
    }
}
