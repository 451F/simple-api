<?php

namespace App\Http\Controllers;

use App\Client;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Client::all()->toArray());
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

        return response()->json($client->toArray(), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Client  $client
     * @return JsonResponse
     */
    public function show(Client $client): JsonResponse
    {
        return response()->json($client->toArray());
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

        return response()->json($client->toArray(), 201);
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
