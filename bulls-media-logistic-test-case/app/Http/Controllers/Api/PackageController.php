<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class PackageController extends Controller
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
            $user->packages
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePackageRequest $request)
    {
        $package = new Package($request->only( 'width', 'height', 'length', 'weight', 'type', 'description', 'height_unit', 'width_unit', 'length_unit', 'weight_unit'));
        $package->user()->associate(auth()->user());
        try {
            $package->saveOrFail();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response('Bad request', 400);
        }
        return response('The package created successful', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        return response($package);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePackageRequest $request, Package $package)
    {
        try {
            $package->updateOrFail($request->only('width', 'height', 'length', 'weight', 'type', 'description', 'height_unit', 'width_unit', 'length_unit', 'weight_unit'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response('Bad request', 400);
        }
        return response('The package updated successful', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        try {
            $package->delete();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response('Bad request', 400);
        }
        return response('Package deleted successful', 204);
    }
}
