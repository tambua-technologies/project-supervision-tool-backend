<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProjectStatusAPIRequest;
use App\Http\Requests\API\UpdateProjectStatusAPIRequest;
use App\Models\ProjectStatus;
use App\Repositories\ProjectStatusRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProjectStatusController
 * @package App\Http\Controllers\API
 */

class ProjectStatusAPIController extends AppBaseController
{
    /** @var  ProjectStatusRepository */
    private $projectStatusRepository;

    public function __construct(ProjectStatusRepository $projectStatusRepo)
    {
        $this->projectStatusRepository = $projectStatusRepo;
    }

    /**
     * @param Request $request
     *
     * @SWG\Get(
     *      path="/project_status",
     *      summary="Get a listing of the ProjectStatuses.",
     *      tags={"ProjectStatus"},
     *     security={{"Bearer":{}}},
     *      description="Get all ProjectStatuses",
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
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/ProjectStatus")
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
        $projectStatuss = $this->projectStatusRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($projectStatuss->toArray(), 'Project Statuses retrieved successfully');
    }

    /**
     * @param CreateProjectStatusAPIRequest $request
     *
     * @SWG\Post(
     *      path="/project_status",
     *      summary="Store a newly created ProjectStatus in storage",
     *      tags={"ProjectStatus"},
     *     security={{"Bearer":{}}},
     *      description="Store ProjectStatus",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProjectStatus that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProjectStatus")
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
     *                  ref="#/definitions/ProjectStatus"
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
    public function store(CreateProjectStatusAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $projectStatus = $this->projectStatusRepository->create($input);

        return $this->sendResponse($projectStatus->toArray(), 'Project Status saved successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Get(
     *      path="/project_status/{id}",
     *      summary="Display the specified ProjectStatus",
     *      tags={"ProjectStatus"},
     *     security={{"Bearer":{}}},
     *      description="Get ProjectStatus",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjectStatus",
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
     *                  ref="#/definitions/ProjectStatus"
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
        /** @var ProjectStatus $projectStatus */
        $projectStatus = $this->projectStatusRepository->find($id);

        if ($projectStatus === null) {
            return $this->sendError('Project Status not found');
        }

        return $this->sendResponse($projectStatus->toArray(), 'Project Status retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateProjectStatusAPIRequest $request
     *
     * @SWG\Put(
     *      path="/project_status/{id}",
     *      summary="Update the specified ProjectStatus in storage",
     *      tags={"ProjectStatus"},
     *     security={{"Bearer":{}}},
     *      description="Update ProjectStatus",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjectStatus",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProjectStatus that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProjectStatus")
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
     *                  ref="#/definitions/ProjectStatus"
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
    public function update(int $id, UpdateProjectStatusAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var ProjectStatus $projectStatus */
        $projectStatus = $this->projectStatusRepository->find($id);

        if ($projectStatus === null) {
            return $this->sendError('Project Status not found');
        }

        $projectStatus = $this->projectStatusRepository->update($input, $id);

        return $this->sendResponse($projectStatus->toArray(), 'ProjectStatus updated successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Delete(
     *      path="/project_status/{id}",
     *      summary="Remove the specified ProjectStatus from storage",
     *      tags={"ProjectStatus"},
     *     security={{"Bearer":{}}},
     *      description="Delete ProjectStatus",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjectStatus",
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
        /** @var ProjectStatus $projectStatus */
        $projectStatus = $this->projectStatusRepository->find($id);

        if ($projectStatus === null) {
            return $this->sendError('Project Status not found');
        }

        $projectStatus->delete();

        return $this->sendSuccess('Project Status deleted successfully');
    }
}
