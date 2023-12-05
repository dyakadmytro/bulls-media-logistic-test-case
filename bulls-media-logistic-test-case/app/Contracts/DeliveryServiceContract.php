<?php

namespace App\Contracts;

use App\DTO\DeliveryData;
use App\DTO\DeliveryServiceResponse;

interface DeliveryServiceContract
{
    function createDelivery(DeliveryData $deliveryData): DeliveryServiceResponse;

    /*
     * Cancel an existing delivery request.
     */
//    function cancelDelivery(string $trackingNumber): bool;

    /*
     *  Track the status of a delivery.
     */
//    function trackDelivery(string $trackingNumber): DeliveryStatus;

        /*
         * Estimate the delivery time for a package.
         */
//    function estimateDeliveryTime(array $deliveryData): DateTime;

    /*
     * Calculate the shipping cost based on package details.
     */
//    function calculateShippingCost(array $packageDetails): float;

    /*
     * Update the details of an existing delivery.
     */
//    function updateDeliveryDetails(string $trackingNumber, array $newDetails): bool;
}
