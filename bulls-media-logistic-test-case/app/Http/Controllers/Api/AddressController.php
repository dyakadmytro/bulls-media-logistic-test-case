<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Models\Address;
use Illuminate\Support\Facades\Log;

class AddressController extends Controller
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
            $user->addresses
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAddressRequest $request)
    {
        $address = new Address($request->only('country', 'state', 'city', 'street', 'house', 'postal_code'));
        $address->user()->associate(auth()->user());
        try {
            $address->saveOrFail();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response('Bad request', 400);
        }
        return response('The address created successful', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        return response($address);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        try {
            $address->updateOrFail($request->only('country', 'state', 'city', 'street', 'house', 'postal_code'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response('Bad request', 400);
        }
        return response('The address updated successful', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        try {
            $address->delete();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response('Bad request', 400);
        }
        return response('Address deleted successful', 204);
    }
}
