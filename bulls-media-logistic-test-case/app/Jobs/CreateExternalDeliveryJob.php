<?php

namespace App\Jobs;

use App\Contracts\DeliveryServiceContract;
use App\DTO\DeliveryData;
use App\Models\Delivery;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateExternalDeliveryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     */
    public function handle(Delivery $delivery, DeliveryServiceContract $deliveryService): void
    {
        $deliveryData = new DeliveryData(
            $delivery->user->fullName,
            $delivery->user->phone,
            $delivery->user->email,
            $delivery->user->address->fullAddress,
            $delivery->address->fullAddress
        );

        $deliveryResponse = $deliveryService->createDelivery($deliveryData);

        //TODO process delivery response. Update delivery status, send email to user
    }
}
