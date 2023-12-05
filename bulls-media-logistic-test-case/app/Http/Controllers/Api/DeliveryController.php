<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeliveryRequest;
use App\Http\Requests\UpdateDeliveryRequest;
use App\Models\Delivery;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
         * @var User
         */
        $user = auth()->user();
        return response(
            $user->deliveries
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeliveryRequest $request)
    {
        $delivery = new Delivery($request->only( 'package_id', 'address_id', 'delivery_provider'));
        $delivery->user()->associate(auth()->user());
        try {
            $delivery->saveOrFail();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response('Bad request', 400);
        }
        return response('The delivery created successful', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery)
    {
        return response($delivery);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeliveryRequest $request, Delivery $delivery)
    {
        try {
            $delivery->updateOrFail($request->only('package_id', 'address_id', 'delivery_provider'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response('Bad request', 400);
        }
        return response('The delivery updated successful', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        try {
            $delivery->delete();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response('Bad request', 400);
        }
        return response('Delivery deleted successful', 204);
    }
}
