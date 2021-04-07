<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProjectSubComponentAPIRequest;
use App\Http\Requests\API\UpdateProjectSubComponentAPIRequest;
use App\Models\ProjectSubComponent;
use App\Repositories\ProjectSubComponentRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class ProjectSubComponentController
 * @package App\Http\Controllers\API
 */

class ProjectSubComponentAPIController extends AppBaseController
{
    /** @var  ProjectSubComponentRepository */
    private $projectSubComponentRepository;

    public function __construct(ProjectSubComponentRepository $projectSubComponentRepo)
    {
        $this->projectSubComponentRepository = $projectSubComponentRepo;
    }

    /**
     * @param Request $request
     *
     * @SWG\Get(
     *      path="/project_sub_components",
     *      summary="Get a listing of the ProjectSubComponents.",
     *      tags={"ProjectSubComponent"},
     *     security={{"Bearer":{}}},
     *      description="Get all ProjectSubComponents",
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
     *                  @SWG\Items(ref="#/definitions/ProjectSubComponent")
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
        $projectSubComponents = $this->projectSubComponentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($projectSubComponents->toArray(), 'Project SubComponents retrieved successfully');
    }

    /**
     * @param CreateProjectSubComponentAPIRequest $request
     *
     * @SWG\Post(
     *      path="/project_sub_components",
     *      summary="Store a newly created ProjectSubComponent in storage",
     *      tags={"ProjectSubComponent"},
     *     security={{"Bearer":{}}},
     *      description="Store ProjectSubComponent",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProjectSubComponent that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProjectSubComponent")
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
     *                  ref="#/definitions/ProjectSubComponent"
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
    public function store(CreateProjectSubComponentAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $projectSubComponent = $this->projectSubComponentRepository->create($input);

        return $this->sendResponse($projectSubComponent->toArray(), 'Project SubComponent saved successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Get(
     *      path="/project_sub_components/{id}",
     *      summary="Display the specified ProjectSubComponent",
     *      tags={"ProjectSubComponent"},
     *     security={{"Bearer":{}}},
     *      description="Get ProjectSubComponent",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjectSubComponent",
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
     *                  ref="#/definitions/ProjectSubComponent"
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
        /** @var ProjectSubComponent $projectSubComponent */
        $projectSubComponent = $this->projectSubComponentRepository->find($id);

        if ($projectSubComponent === null) {
            return $this->sendError('Project SubComponent not found');
        }

        return $this->sendResponse($projectSubComponent->toArray(), 'Project SubComponent retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateProjectSubComponentAPIRequest $request
     *
     * @SWG\Put(
     *      path="/project_sub_components/{id}",
     *      summary="Update the specified ProjectSubComponent in storage",
     *      tags={"ProjectSubComponent"},
     *     security={{"Bearer":{}}},
     *      description="Update ProjectSubComponent",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjectSubComponent",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProjectSubComponent that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProjectSubComponent")
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
     *                  ref="#/definitions/ProjectSubComponent"
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
    public function update(int $id, UpdateProjectSubComponentAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var ProjectSubComponent $projectSubComponent */
        $projectSubComponent = $this->projectSubComponentRepository->find($id);

        if ($projectSubComponent === null) {
            return $this->sendError('Project SubComponent not found');
        }

        $projectSubComponent = $this->projectSubComponentRepository->update($input, $id);

        return $this->sendResponse($projectSubComponent->toArray(), 'ProjectSubComponent updated successfully');
    }

    /**
     * @param int $id
     *
     * @SWG\Delete(
     *      path="/project_sub_components/{id}",
     *      summary="Remove the specified ProjectSubComponent from storage",
     *      tags={"ProjectSubComponent"},
     *     security={{"Bearer":{}}},
     *      description="Delete ProjectSubComponent",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjectSubComponent",
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
        /** @var ProjectSubComponent $projectSubComponent */
        $projectSubComponent = $this->projectSubComponentRepository->find($id);

        if ($projectSubComponent === null) {
            return $this->sendError('Project SubComponent not found');
        }

        $projectSubComponent->delete();

        return $this->sendSuccess('Project SubComponent deleted successfully');
    }
}
