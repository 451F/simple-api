<?php

namespace App\Http\Controllers;

use App\Project;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Project::all()->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $project = new Project($request->all());
        $project->save();

        return response()->json($project->toArray(), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Project  $project
     * @return JsonResponse
     */
    public function show(Project $project): JsonResponse
    {
        return response()->json($project->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Project  $project
     * @return JsonResponse
     */
    public function update(Request $request, Project $project): JsonResponse
    {
        $project->update($request->all());

        return response()->json($project->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project  $project
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Project $project): JsonResponse
    {
        return response()->json(['status' => $project->delete()]);
    }
}
