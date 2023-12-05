<?php

namespace App\Services;

use App\DTO\BaseDTO;
use App\DTO\DeliveryServiceResponse;

class NovaposhtaDeliveryService extends AbstractDeliveryService
{

    function createDelivery(BaseDTO $deliveryData): DeliveryServiceResponse
    {
        $url = $this->config['url'].$this->config['api']['create'];
        $response = $this->client->post($url, $deliveryData->toArray());
        $content = $response->getBody()->getContents();
        return new DeliveryServiceResponse($content);
    }

}
