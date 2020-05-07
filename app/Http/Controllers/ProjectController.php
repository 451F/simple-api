<?php

namespace App\Http\Controllers;

use App\Project;
use App\Http\Resources\Project as ProjectResource;
use App\Http\Resources\ProjectCollection;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ProjectCollection
     */
    public function index(): ProjectCollection
    {
        return new ProjectCollection(Project::all());
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

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Project  $project
     * @return ProjectResource
     */
    public function show(Project $project): ProjectResource
    {
        return new ProjectResource($project);
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

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(202);
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
