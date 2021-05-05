<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProjectAPIRequest;
use App\Http\Requests\API\UpdateProjectAPIRequest;
use App\Http\Resources\Projects\ProjectCollection;
use App\Http\Resources\Projects\ProjectResource;
use App\Models\Project;
use App\Repositories\ProjectRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class ProjectController
 * @package App\Http\Controllers\API
 */

class ProjectAPIController extends AppBaseController
{
    /** @var  ProjectRepository */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepo)
    {
        $this->projectRepository = $projectRepo;
    }

    /**
     *
     * @SWG\Get(
     *      path="/projects",
     *      summary="Get a listing of the Projects.",
     *      tags={"Project"},
     *     security={{"Bearer":{}}},
     *      description="Get all Projects",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="filter[name]",
     *          description="search by project name",
     *          type="string",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[id]",
     *          description="project id filter",
     *          type="integer",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[project_status_id]",
     *          description="project status  filter",
     *          type="string",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[regions.id]",
     *          description="project region  filter",
     *          type="string",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Project")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {

        $projects = QueryBuilder::for(Project::class)
            ->allowedFilters([
                'name',
                AllowedFilter::exact('project_status_id'),
                AllowedFilter::exact('id'),
                AllowedFilter::exact('regions.id'),
            ])
            ->with('components.sub_components.procuring_entities.packages.sub_projects')
            ->paginate($request->get('per_page', 15));

        return $this->sendResponse(new ProjectCollection($projects), 'Projects retrieved successfully');
    }

    /**
     * @param CreateProjectAPIRequest $request
     *
     * @SWG\Post(
     *      path="/projects",
     *      summary="Store a newly created Project in storage",
     *      tags={"Project"},
     *     security={{"Bearer":{}}},
     *      description="Store Project",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Project that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProjectPayload")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Project"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     * @return JsonResponse
     */
    public function store(CreateProjectAPIRequest $request): JsonResponse
    {
        $input = $request->all();
        $project = $this->projectRepository->create($input);
        if ($request->leaders) $project->attachLeaders($request->leaders);
        if ($request->locations) $project->attachLocations($request->locations);
        $project->refresh();
        return $this->sendResponse(new ProjectResource($project), 'Project saved successfully');
    }

    /**
     * @param string $id
     *
     * @SWG\Get(
     *      path="/projects/{id}",
     *      summary="Display the specified Project",
     *      tags={"Project"},
     *     security={{"Bearer":{}}},
     *      description="Get Project",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Project",
     *          type="string",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Project"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        /** @var Project $project */
        $project = $this->projectRepository->find($id);

        if ($project === null) {
            return $this->sendError('Project not found');
        }

        return $this->sendResponse(new ProjectResource($project), 'Project retrieved successfully');
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/projects/statistics",
     *      summary="Get Project(s) statistics",
     *      tags={"Project"},
     *     security={{"Bearer":{}}},
     *      description="Get Project(s) statistics",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Project",
     *          type="string",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Project"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function statistics(Request $request): JsonResponse
    {
        $id = $request->query('id');
        if ($id) {
            /** @var Project $project */
            $project = $this->projectRepository->find($id);
            if (empty($project)) {
                return $this->sendError('Project not found');
            }

            return $this->sendResponse(Project::statistics($project->id), 'Project statistics retrieved');
        }

        return $this->sendResponse(Project::statistics(), 'Projects statistics retrieved');
    }

    /**
     * @param int $id
     * @param UpdateProjectAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/projects/{id}",
     *      summary="Update the specified Project in storage",
     *      tags={"Project"},
     *     security={{"Bearer":{}}},
     *      description="Update Project",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Project",
     *          type="string",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Project that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Project")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Project"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update(string $id, UpdateProjectAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Project $project */
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            return $this->sendError('Project not found');
        }

        $project = $this->projectRepository->update($input, $id);

        return $this->sendResponse(new ProjectResource($project), 'Project updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/projects/{id}",
     *      summary="Remove the specified Project from storage",
     *      tags={"Project"},
     *     security={{"Bearer":{}}},
     *      description="Delete Project",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Project",
     *          type="string",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy(string $id): JsonResponse
    {
        /** @var Project $project */
        $project = $this->projectRepository->find($id);

        if (empty($project)) {
            return $this->sendError('Project not found');
        }

        $project->delete();

        return $this->sendSuccess('Project deleted successfully');
    }
}
