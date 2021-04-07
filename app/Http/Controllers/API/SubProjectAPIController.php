<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubProjectAPIRequest;
use App\Http\Requests\API\UpdateSubProjectAPIRequest;
use App\Http\Resources\SubProjects\SubProjectCollection;
use App\Http\Resources\SubProjects\SubProjectResource;
use App\Http\Resources\SubProjectWithDistrict;
use App\Models\Project;
use App\Models\SubProject;
use App\Repositories\SubProjectRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


/**
 * Class SubProjectController
 * @package App\Http\Controllers\API
 */

class SubProjectAPIController extends AppBaseController
{
    /** @var  SubProjectRepository */
    private $subProjectRepository;

    public function __construct(SubProjectRepository $subProjectRepo)
    {
        $this->subProjectRepository = $subProjectRepo;
    }

    /**
     * @param Request $request
     *
     * @SWG\Get(
     *      path="/sub_projects",
     *      summary="Get a listing of the SubProject",
     *      tags={"SubProject"},
     *     security={{"Bearer":{}}},
     *      description="Get all SubProjects",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="filter[sub_project_type_id]",
     *          description="sub project type filter",
     *          type="string",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[sub_project_status_id]",
     *          description="sub project status  filter",
     *          type="string",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[procuring_entity_package_id]",
     *          description="sub project procuring entity package  filter",
     *          type="string",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[districts.id]",
     *          description="sub project districts filter",
     *          type="string",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[districts.region_id]",
     *          description="sub project regions filter",
     *          type="string",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[procuringEntityPackage.procuring_entity_id]",
     *          description="sub project procuring entity filter",
     *          type="string",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[procuringEntityPackage.procuringEntity.project_sub_component_id]",
     *          description="sub project procuring entity sub component filter",
     *          type="string",
     *          required=false,
     *          in="query"
     *      ),
     *      @SWG\Parameter(
     *          name="filter[procuringEntityPackage.procuringEntity.projectSubComponent.project_component_id]",
     *          description="sub project procuring entity component filter",
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
     *                  @SWG\Items(ref="#/definitions/SubProject")
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
        $subProjects = QueryBuilder::for(SubProject::class)
            ->allowedFilters([
                AllowedFilter::exact('sub_project_status_id'),
                AllowedFilter::exact('sub_project_type_id'),
                AllowedFilter::exact('procuring_entity_package_id'),
                AllowedFilter::exact('districts.id'),
                AllowedFilter::exact('districts.region_id'),
                AllowedFilter::exact('procuringEntityPackage.procuring_entity_id'),
                AllowedFilter::exact('procuringEntityPackage.procuringEntity.project_sub_component_id'),
                AllowedFilter::exact('procuringEntityPackage.procuringEntity.projectSubComponent.project_component_id'),
            ])
            ->paginate($request->get('per_page', 15));


        return $this->sendResponse(new SubProjectCollection($subProjects), 'Sub Projects retrieved successfully');
    }

    /**
     * @param CreateSubProjectAPIRequest $request
     *
     * @SWG\Post(
     *      path="/sub_projects",
     *      summary="Store a newly created SubProject in storage",
     *      tags={"SubProject"},
     *     security={{"Bearer":{}}},
     *      description="Store SubProject",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProject that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectPayload")
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
     *                  ref="#/definitions/SubProject"
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
    public function store(CreateSubProjectAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $subProject = $this->subProjectRepository->create($input);
        $subProject->attachLocations($request->locations);

        return $this->sendResponse(new SubProjectResource($subProject), 'Sub Project saved successfully');
    }

    /**
     * @param string $id
     *
     * @SWG\Get(
     *      path="/sub_projects/{id}",
     *      summary="Display the specified SubProject",
     *      tags={"SubProject"},
     *     security={{"Bearer":{}}},
     *      description="Get SubProject",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProject",
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
     *                  ref="#/definitions/SubProject"
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
        /** @var SubProject $subProject */
        $subProject = $this->subProjectRepository->find($id);

        if ($subProject === null) {
            return $this->sendError('Sub Project not found');
        }

        return $this->sendResponse(new SubProjectWithDistrict($subProject), 'Sub Project retrieved successfully');
    }



    /**
     *
     * @SWG\Get(
     *      path="/sub_projects/statistics",
     *      summary="Get SubProject(s) statistics",
     *      tags={"SubProject"},
     *     security={{"Bearer":{}}},
     *      description="Get SubProject(s) statistics",
     *      produces={"application/json"},
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
     *                  ref="#/definitions/SubProject"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function statistics(): JsonResponse
    {

        return $this->sendResponse(SubProject::statistics(), 'SubProjects statistics retrieved');
    }


    /**
     * @param int $id
     * @param UpdateSubProjectAPIRequest $request
     *
     * @return JsonResponse
     * @SWG\Put(
     *      path="/sub_projects/{id}",
     *      summary="Update the specified SubProject in storage",
     *      tags={"SubProject"},
     *     security={{"Bearer":{}}},
     *      description="Update SubProject",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProject",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="SubProject that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/SubProjectPayload")
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
     *                  ref="#/definitions/SubProject"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update(int $id, UpdateSubProjectAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var SubProject $subProject */
        $subProject = $this->subProjectRepository->find($id);

        if ($subProject === null) {
            return $this->sendError('Sub Project not found');
        }

        $subProject = $this->subProjectRepository->update($input, $id);

        return $this->sendResponse(new SubProjectResource($subProject), 'SubProject updated successfully');
    }

    /**
     * @param int $id
     *
     * @return JsonResponse
     * @SWG\Delete(
     *      path="/sub_projects/{id}",
     *      summary="Remove the specified SubProject from storage",
     *      tags={"SubProject"},
     *     security={{"Bearer":{}}},
     *      description="Delete SubProject",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of SubProject",
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
     */
    public function destroy(int $id): JsonResponse
    {
        /** @var SubProject $subProject */
        $subProject = $this->subProjectRepository->find($id);

        if ($subProject === null) {
            return $this->sendError('Sub Project not found');
        }

        $subProject->delete();

        return $this->sendSuccess('Sub Project deleted successfully');
    }
}
