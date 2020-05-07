<?php

namespace App\Http\Controllers;

use App\Client as Client;
use App\Http\Resources\Client as ClientResource;
use App\Http\Resources\ClientCollection;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ClientCollection
     */
    public function index(): ClientCollection
    {
        return new ClientCollection(Client::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $client = new Client($request->all());
        $client->save();

        return (new ClientResource($client))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Client  $client
     * @return ClientResource
     */
    public function show(Client $client): ClientResource
    {
        return new ClientResource($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Client  $client
     * @return JsonResponse
     */
    public function update(Request $request, Client $client): JsonResponse
    {
        $client->update($request->all());

        return (new ClientResource($client))
            ->response()
            ->setStatusCode(202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client  $client
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Client $client): JsonResponse
    {
        return response()->json(['status' => $client->delete()]);
    }
}
