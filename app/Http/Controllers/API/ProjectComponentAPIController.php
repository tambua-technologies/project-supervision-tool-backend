<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProjectComponentAPIRequest;
use App\Http\Requests\API\UpdateProjectComponentAPIRequest;
use App\Http\Resources\ProjectComponentResource;
use App\Models\ProjectComponent;
use App\Repositories\ProjectComponentRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class ProjectComponentController
 * @package App\Http\Controllers\API
 */

class ProjectComponentAPIController extends AppBaseController
{
    /** @var  ProjectComponentRepository */
    private $projectComponentRepository;

    public function __construct(ProjectComponentRepository $projectComponentRepo)
    {
        $this->projectComponentRepository = $projectComponentRepo;
    }

    /**
     * @param Request $request
     *
     * @SWG\Get(
     *      path="/project_components",
     *      summary="Get a listing of the ProjectComponents.",
     *      tags={"ProjectComponent"},
     *     security={{"Bearer":{}}},
     *      description="Get all ProjectComponents",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="filter[project_id]",
     *          description="search by project name",
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
     *                  @SWG\Items(ref="#/definitions/ProjectComponent")
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
    public function index(Request $request): JsonResponse
    {
        $projectComponents = QueryBuilder::for(ProjectComponent::class)
            ->allowedFilters([
                AllowedFilter::exact('project_id')
            ])
            ->with('sub_components')
            ->get();
        return $this->sendResponse(ProjectComponentResource::collection($projectComponents), 'Project Components retrieved successfully');
    }

    /**
     * @param CreateProjectComponentAPIRequest $request
     *
     * @SWG\Post(
     *      path="/project_components",
     *      summary="Store a newly created ProjectComponent in storage",
     *      tags={"ProjectComponent"},
     *     security={{"Bearer":{}}},
     *      description="Store ProjectComponent",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProjectComponent that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProjectComponent")
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
     *                  ref="#/definitions/ProjectComponent"
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
    public function store(CreateProjectComponentAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $projectComponent = $this->projectComponentRepository->create($input);

        return $this->sendResponse($projectComponent->toArray(), 'Project Component saved successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Get(
     *      path="/project_components/{id}",
     *      summary="Display the specified ProjectComponent",
     *      tags={"ProjectComponent"},
     *     security={{"Bearer":{}}},
     *      description="Get ProjectComponent",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjectComponent",
     *          type="integer",
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
     *                  ref="#/definitions/ProjectComponent"
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
    public function show(int $id): JsonResponse
    {
        /** @var ProjectComponent $projectComponent */
        $projectComponent = $this->projectComponentRepository->find($id);

        if ($projectComponent === null) {
            return $this->sendError('Project Component not found');
        }

        return $this->sendResponse($projectComponent->toArray(), 'Project Component retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateProjectComponentAPIRequest $request
     *
     * @SWG\Put(
     *      path="/project_components/{id}",
     *      summary="Update the specified ProjectComponent in storage",
     *      tags={"ProjectComponent"},
     *     security={{"Bearer":{}}},
     *      description="Update ProjectComponent",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjectComponent",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProjectComponent that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProjectComponent")
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
     *                  ref="#/definitions/ProjectComponent"
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
    public function update(int $id, UpdateProjectComponentAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var ProjectComponent $projectComponent */
        $projectComponent = $this->projectComponentRepository->find($id);

        if ($projectComponent === null) {
            return $this->sendError('Project Component not found');
        }

        $projectComponent = $this->projectComponentRepository->update($input, $id);

        return $this->sendResponse($projectComponent->toArray(), 'ProjectComponent updated successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Delete(
     *      path="/project_components/{id}",
     *      summary="Remove the specified ProjectComponent from storage",
     *      tags={"ProjectComponent"},
     *     security={{"Bearer":{}}},
     *      description="Delete ProjectComponent",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjectComponent",
     *          type="integer",
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
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        /** @var ProjectComponent $projectComponent */
        $projectComponent = $this->projectComponentRepository->find($id);

        if ($projectComponent === null) {
            return $this->sendError('Project Component not found');
        }

        $projectComponent->delete();

        return $this->sendSuccess('Project Component deleted successfully');
    }
}
